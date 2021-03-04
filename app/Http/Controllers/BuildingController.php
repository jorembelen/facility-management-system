<?php

namespace App\Http\Controllers;

use App\Imports\BuildingsImport;
use App\Models\Building;
use App\Models\JobOrder;
use App\Models\Occupancy;
use App\Models\Occupant;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::latest()->get();
        $total = count(Building::all());

        return view('buildings.index', compact('buildings', 'total'));
    }

    public function importIndex()
    {
        return view('buildings.import');
    }

    public function import(Request $request)
    {
        $validator = Excel::import(new BuildingsImport,request()->file('file'));
        
        Alert::success('Success', 'Facilities Imported Successfully!');
           
        return back();
    }

    public function search(Request $request)
    {
        $str = $request->input('search');
        
        $buildings = Building::where('unit_no', 'LIKE', '%'.$str.'%')
        ->orWhere('plot', 'LIKE' , '%'.$str.'%')
        ->orWhere('house_no', 'LIKE' , '%'.$str.'%')->get();
        
        $total = count($buildings);
        
        if($buildings->count() >0)
        {
            foreach($buildings as $building)
            {
                $id = $building->id;
            }
            $occupant = Occupancy::wherebuilding_id($id)->get();
        }else{
            $occupant = '';
        }

        return view('buildings.search', compact('buildings', 'total', 'occupant'));
    }

    public function jobOrders($id)
    {
        $jobOrders = Building::findOrFail($id)->jobOrder;
        $building = Building::findOrFail($id);
        $buildingId = $building->id;
        $occupant = Occupancy::wherebuilding_id($buildingId)->get();
        foreach($occupant as $data)
        {
            $occupantId = $data->occupant_id;
        }
        $buildingUser = Occupant::findOrFail($occupantId);
        // return $buildingUser;
        


        return view('buildings.job-orders', compact('building', 'jobOrders', 'buildingUser'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building = Building::findOrFail($id);

        return view('buildings.details', compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $building = Building::findOrFail($id);

        return view('buildings.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
    }
}
