<?php

namespace App\Http\Controllers;

use App\Events\Sms;
use App\Models\Site\Obyekt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function post(Request $request)
    {
        $obj = Obyekt::where('phone', $request->phone)->first();

        if ($request->body == $obj->status) {
            return "ok";
        }

        if( $request->body == 1 ){
            $obj->status = 1;
            $obj->on = time();
            $obj->save();
            event(new Sms());
            return "on"; 
        }else{
            $t1 = Carbon::parse((int)$obj->on);
            $t2 = Carbon::now();
            $diff = $t1->diffInSeconds($t2);
            $obj->work = $obj->work + $diff;
            $obj->status = $request->body;
            $obj->save();
            event(new Sms());
            return "off";
        }
    }
    public function get()
    {
        $post = Obyekt::orderBy('updated_at', 'DESC')->select('phone','status')->first();
        return response()->json($post);
    }
}
