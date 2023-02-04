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

        



        // $finish = explode(' ', Carbon::now()->toDateTimeString());
        // $start = explode(' ', $obj->updated_at->toDateTimeString());
        // $f = explode(":",$finish[1]);
        // $s = explode(":",$start[1]);

        if( $request->body == 0 or $request->body == 2 ){
        //    $soat = (int)$f[0] - (int)$s[0] ;
        //    $min = (int)$f[1] - (int)$s[1] ;
        //    $sekund = (int)$f[2] - (int)$s[2] ;
        //    $time = implode(':', [$soat,$min,$sekund]);
            if ($obj->status == 1) {

                $time = time() - $obj->on;
                $obj->on = 0;
                $obj->work = $time;
                $obj->status = $request->body;
                $obj->save();
                return "true";
            }
            $obj->status = $request->body;
            $obj->on = 0;
            $obj->save();
            return "else"; 
        }else{
            if($obj->status == 1){
                $obj->status = $request->body;
                $obj->save();
            }
            $obj->status = $request->body;
            $obj->on = time();
            $obj->save();
            return "else"; 
        }
    }
}
