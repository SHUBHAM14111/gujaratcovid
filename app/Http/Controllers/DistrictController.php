<?php

namespace App\Http\Controllers;
use App\District;

use Illuminate\Http\Request;
use App\Http\Resources\DistrictCollection as DistrictCollection;

class DistrictController extends Controller
{
    //
    public function index(){

        $districts = District::all();
        //$patients = DB::select('SELECT * FROM patients');
        return DistrictCollection::collection($districts);
    }
}
