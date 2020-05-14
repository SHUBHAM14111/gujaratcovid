<?php

namespace App\Http\Controllers;
use App\Patient;
use App\Location;

use DB;
use Illuminate\Http\Request;
use App\Http\Resources\PatientCollection as PatientCollection;
use App\Http\Resources\PatientResource as PatientResource;

use Illuminate\Support\Facades\Cache;

class PatientController extends Controller
{
    //
    
    public function index(){

        
        $patients = Cache::remember('patients', 60*2, function(){
            
            return Patient::all();
        });
        //$patients = Patient::all();
       
        return PatientResource::collection($patients);
    }
    public function adminindex(){

       
        $patients = Patient::all();

        return response()->json(
            [
                'status' => 'success',
                'patients' => $patients->toArray()
            ], 200);    
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
            return response()->json(
                [
                    'status' => 'success',
                    'patients' => $patients->toArray()
                ], 200); 
        }
        
    }

    
    public function show($id)
    {
        // Get patient
        $patients = Patient::findOrFail($id);

        // Return single patient as a resource
        return response()->json(
            [
                'status' => 'success',
                'patients' => $patients->toArray()
            ], 200); 
    }

    
    public function destroy($id)
    {
        // Get patient
        $patients = Patient::findOrFail($id);

        if($patients->delete()) {
            return response()->json(
                [
                    'status' => 'success',
                    'patients' => $patients->toArray()
                ], 200); 
        }    
    }
    
}
