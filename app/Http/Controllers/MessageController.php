<?php

namespace App\Http\Controllers;

use App\Events\On;
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
            $obj->status = 1;
            $obj->on = time();
            $obj->save();
            return "on"; 
        }else{
            $t1 = Carbon::parse($obj->on);
            $t2 = Carbon::now();
            $diff = $t1->diffInSeconds($t2);
            $obj->work = $obj->work + $diff;
            $obj->status = $request->body;
            $obj->save();
            event(new On());
            return "off";
        }
    }
}
