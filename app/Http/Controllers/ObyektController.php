<?php

namespace App\Http\Controllers;

use App\Events\On;
use App\Models\Site\Obyekt;
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
        //
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
        if($obyekt->status == false){
            $obyekt->status = 1;
            $obyekt->save();
            return back();
        }elseif($obyekt->status == 1){
            $obyekt->status = 0;
            $obyekt->save();
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
        $post = Obyekt::orderBy('updeted_at', 'DESC')->first()->select('phone','status');

        return response()->json($post);
    }

}
