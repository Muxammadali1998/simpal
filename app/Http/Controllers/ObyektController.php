<?php

namespace App\Http\Controllers;

use App\Events\Control;
use App\Events\On;
use App\Models\Site\Obyekt;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ObyektController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentTime = Carbon::now();

        $post = Obyekt::orderBy('updated_at', 'DESC')->select('start')->first();

        if ($currentTime->eq($post->start)) {
            
            event(new On());
           
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Obyekt::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site\Obyekt  $obyekt
     * @return \Illuminate\Http\Response
     */
    public function show(Obyekt $obyekt)
    {

        if($obyekt->status == 0){
            $obyekt->status = 1;
            $obyekt->on = time();
            $obyekt->save();
            return back();
        }elseif($obyekt->status == 1){
            $time = time() - $obyekt->on;
            $obyekt->on = 0;
            $obyekt->work = $obyekt->work + $time;
            $obyekt->status = 0;
            $obyekt->save();
            event(new On());
            return back();
        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site\Obyekt  $obyekt
     * @return \Illuminate\Http\Response
     */
    public function edit(Obyekt $obyekt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site\Obyekt  $obyekt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obyekt $obyekt)
    {
        if (isset($request->start)) {
            $obyekt->start = $request->start;
            $obyekt->finish = $request->finish;
            $obyekt->save();
            return back();
        }else{
            $obyekt->status = $request->status;
            $obyekt->save();
            event(new On());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site\Obyekt  $obyekt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obyekt $obyekt)
    {
        //
    }
    public function last()
    {

        //event(new On());
        On::dispatch();
        //event( new Control(12));
        $post = Obyekt::orderBy('updated_at', 'DESC')->select('phone','status')->first();
        
        return response()->json($post);
    }

}
