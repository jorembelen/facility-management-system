<?php

namespace App\Http\Controllers;

use App\Imports\OccupancyImport;
use App\Models\Building;
use App\Models\Occupancy;
use App\Models\Occupant;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class OccupancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    //   return  $occupancies = User::find(2)->occupancy;
        $occupancies = Occupancy::wherestatus(1)->get();
        // foreach($occupancies as $data)
        // {
        //     return $data->building->street;
        // }
        $total = count(Occupancy::all());
       
        return view('occupancies.index', compact('occupancies', 'total'));
    }

    public function details($id)
    {
        $occupancies = Occupancy::wherebuilding_id($id)->get();
        
        if($occupancies->count() > 0)
        {
            foreach($occupancies as $data)
            {
                $name = $data->occupant->name;
                $badge = $data->occupant->badge;
            
            }
        }else{
            $name = '';
            $badge = '';
        }
        $total = count($occupancies);

        return view('occupancies.view', compact('occupancies', 'name', 'total', 'badge'));
    }

    public function search(Request $request)
    {
        $str = $request->input('search');
        $select = $request->input('select');

        $occupancy = new Occupant;
        $unit = new Building();

        if($select == 'occupants')
        {
            
            $occupants = $occupancy->where('badge', 'LIKE', '%'.$str.'%')->get();
            $total = count($occupants);
            if($occupants->count() > 0)
            {
                 foreach($occupants as $occ)
                 {
                     $id = $occ->id;
                 }
                 $occup = Occupancy::whereoccupant_id($id)->get();
            }else{
                $occup = '';
            }

            return view('occupants.search', compact('occupants', 'total', 'occup'));

        }elseif($select == 'building')
        {
            $buildings = $unit->where('unit_no', 'LIKE', '%'.$str.'%')->get();
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
            
            $total = count($buildings);
            
            return view('buildings.search', compact('buildings', 'total', 'occupant'));
        }

        Alert::error('Failed', 'Please select option!');

        return back();
    }

    public function importIndex()
    {
        return view('occupancies.import');
    }

    public function import(Request $request)
    {
        $validator = Excel::import(new OccupancyImport,request()->file('file'));
        
        Alert::success('Success', 'Occupants Imported Successfully!');
           
        return back();
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
     * @param  \App\Models\Occupancy  $occupancy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $occupancies = Occupancy::whereoccupant_id($id)->get();

        if($occupancies->count() > 0)
        {
            foreach($occupancies as $data)
            {
            $name = $data->occupant->name;
            $badge = $data->occupant->badge;
            }
        }else{
            $name = '';
            $badge = '';
        }

        $total = count($occupancies);

        return view('occupancies.view', compact('occupancies', 'name', 'total', 'badge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Occupancy  $occupancy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Occupancy  $occupancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occupancy $occupancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Occupancy  $occupancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupancy $occupancy)
    {
        //
    }
}
