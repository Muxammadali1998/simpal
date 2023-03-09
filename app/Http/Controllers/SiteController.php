<?php

namespace App\Http\Controllers;

use App\Models\Site\City;
use App\Models\Site\Obyekt;
use App\Models\Site\Region;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class SiteController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        $cities = Obyekt::all();
        $working = $cities->where('status', '1');
        return view('index', compact('cities', 'working','regions'));
    }
    public function region($id)
    {
        $regions = Region::all();
        $cities = City::where('region_id',$id)->get();
        $working = $cities->where('status', '1');
        return view('region', compact('cities', 'working','regions'));
    }
    public function obyekt($id)
    {
    
        $objekt = Obyekt::find($id);

        $regions = Region::all();
        $cities = City::where('region_id', $objekt->city->region->id )->get();
        $working = $cities->where('status', '1');
        return view('obyekt', compact('cities', 'working',"regions", 'objekt'));
    }
    public function post(Request $request)
    {
        $obj = Obyekt::where('phone', $request->phone)->first();
        if($request->key == 1){
            $obj->status = 1;
        }elseif($request->key == 0){
            $obj->status = 1;
        }
    }
}
