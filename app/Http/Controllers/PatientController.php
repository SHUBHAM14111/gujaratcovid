<?php

namespace App\Http\Controllers;
use App\Patient;
use App\Location;

use DB;
use Illuminate\Http\Request;
use App\Http\Resources\PatientCollection as PatientCollection;
use Illuminate\Support\Facades\Cache;

class PatientController extends Controller
{
    //
    
    public function index(){

        
        $patients = Cache::remember('patients', 60, function(){
            
            return Patient::all();
        });
        //$patients = Patient::all();
       
        return PatientCollection::collection($patients);
    }
    public function adminindex(){

       
        $patients = Patient::all();

        //$patients = DB::select('SELECT * FROM patients');
        return PatientCollection::collection($patients);
    }
    public function store(Request $request)
    {
        $patients = $request->isMethod('put') ? Patient::findOrFail($request->patient_id) : new Patient;

        $patients->id = $request->input('patient_id');
        $patients->name = $request->input('name');
        $patients->address = $request->input('address');
        $patients->latitude = $request->input('lat');
        $patients->longitude = $request->input('lng');

        if($patients->save()) {
            return new PatientCollection($patients);
        }
        
    }

    
    public function show($id)
    {
        // Get patient
        $patients = Patient::findOrFail($id);

        // Return single patient as a resource
        return new PatientCollection($patients);
    }

    
    public function destroy($id)
    {
        // Get patient
        $patients = Patient::findOrFail($id);

        if($patients->delete()) {
            return new PatientCollection($patients);
        }    
    }
    
}
