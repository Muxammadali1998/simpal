<?php

namespace App\Http\Controllers;

use App\Models\Site\Obyekt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function changestatus(Request $request)
    {
        $obj = Obyekt::where('phone', $request->phone)->first();

        if ($request->body == $obj->statu) {
            return true;
        }

        if( $request->body == 1 ){
            $obj->status = $request->body;
            $obj->on = time();
            $obj->save();
            return "on"; 
        }else{
            $time = time() - $obj->on;
            $obj->on = 0;
            $obj->work = $obj->work + $time;
            $obj->status = $request->body;
            $obj->save();
            return "off";
        }
    }
}
