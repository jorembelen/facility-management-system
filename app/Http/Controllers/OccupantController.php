<?php

namespace App\Http\Controllers;

use App\Http\Requests\OccupantStoreRequest;
use App\Imports\OccupantsImport;
use App\Models\Occupancy;
use App\Models\Occupant;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class OccupantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       

        $occupants = User::whererole('tenant')->get();
        $total = $occupants->count();
       
        return view('occupants.index', compact('occupants', 'total'));
    }

    public function search(Request $request)
    {
        $str = $request->input('search');
        
        $occupants = Occupant::where('badge', 'LIKE', '%'.$str.'%')
        ->orWhere('name', 'LIKE' , '%'.$str.'%')
        ->orWhere('cost_center', 'LIKE' , '%'.$str.'%')
        ->orWhere('email', 'LIKE' , '%'.$str.'%')
        ->orWhere('status_desc', 'LIKE' , '%'.$str.'%')->get();
        
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

        $total = count($occupants);

        return view('occupants.search', compact('occupants', 'total', 'occup'));
    }


    public function importIndex()
    {
        return view('occupants.import');
    }

    public function import(Request $request)
    {
        $validator = Excel::import(new OccupantsImport,request()->file('file'));
        
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
    public function store(OccupantStoreRequest $request)
    {
        $occupant = Occupant::create($request->all());
        Alert::toast('Occupant was successfully created!', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $occupant = Occupant::findOrFail($id);

        return view('occupants.view', compact('occupant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupant = Occupant::findOrFail($id);

        return view('occupants.edit', compact('occupant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function update(OccupantStoreRequest $request, $id)
    {
        
        $occupant = Occupant::findOrFail($id);
        $occupant->update($request->all());

        Alert::toast('Occupant was successfully updated!', 'success');

        return redirect('/occupants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occupant = Occupant::findOrFail($id);
        if($occupant->occupancy->count() > 0)
        {
            Alert::error('Failed', 'Sorry, this data has an existing sales record!');
            
            return back();
        }
        $occupant->delete();

        Alert::success('Success', 'Occupant was successfully deleted!');

        return back();
    }
}
