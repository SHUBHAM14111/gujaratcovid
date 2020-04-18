<?php

namespace App\Http\Controllers;
use App\Patient;
use App\Location;

use DB;
use Illuminate\Http\Request;
use App\Http\Resources\PatientCollection as PatientCollection;

class PatientController extends Controller
{
    //
    public function index(){

        $patients = Patient::all();
        //$patients = DB::select('SELECT * FROM patients');
        return PatientCollection::collection($patients);
    }
    public function positions(){

        $locations = Location::all();

        return PatientCollection::collection($locations);
    }
    
}
