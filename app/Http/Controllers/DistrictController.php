<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;

class DistrictController extends Controller
{
    public function showDistrictsInCity(Request $request){
        
        $districts = District::where('city_id', $request->city_id)->get();
        // print_r($districts);
        return response()->json($districts);
    }
}
