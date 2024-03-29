<?php

namespace App\Http\Controllers;

use App\Events\On;
use App\Models\Site\Obyekt;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            event(new On());
            return back();
        }elseif($obyekt->status == 1){
            $t1 = Carbon::parse((int)$obyekt->on);
            $t2 = Carbon::now();
            $diff = $t1->diffInSeconds($t2);
            $obyekt->work = $obyekt->work + $diff;
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
    public function edit($id, Request $request)
    {
        $region = Obyekt::find($id);
        $region->update($request->all());
        return back();
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
        $obyekt->delete();
        return redirect('/');
    }


}
