<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\District;
use App\Http\Resources\DistrictCollection as DistrictCollection;
use Illuminate\Support\Facades\Cache;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        
        //$districts = District::all();

        $districts = Cache::remember('districtskey', 25, function(){
            return District::all();
        });
      

        return DistrictCollection::collection($districts);
    }
    public function adminindex(){

       
        $districts = District::all();

        //$patients = DB::select('SELECT * FROM patients');
        return response()->json(
            [
                'status' => 'success',
                'districts' => $districts->toArray()
            ], 200);    }
    public function store(Request $request)
    {
        $districts = $request->isMethod('put') ? District::findOrFail($request->district_id) : new District;

        $districts->id = $request->input('district_id');
        $districts->name = $request->input('name');
        $districts->cured = $request->input('cured');
        $districts->infected = $request->input('infected');
        $districts->died = $request->input('died');

        $districts->lat = $request->input('lat');
        $districts->lng = $request->input('lng');

        if($districts->save()) {
            return new DistrictCollection($districts);
        }
        
    }

    
    public function show($id)
    {
        // Get patient
        $districts = District::findOrFail($id);

        // Return single patient as a resource
        return new DistrictCollection($districts);
    }

    
    public function destroy($id)
    {
        // Get patient
        $districts = District::findOrFail($id);

        if($districts->delete()) {
            return new DistrictCollection($districts);
        }    
    }
}
