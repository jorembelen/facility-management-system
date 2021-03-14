<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ScheduleImport;
use App\Models\WorkCategory;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schedules = new Schedule();
        $categories = WorkCategory::all();


        if($request->work_category_id) {
            $category = WorkCategory::findOrFail($request->work_category_id);
            $categoriesName = $category->name;
            $schedules =  $schedules->wherework_category_id($request->work_category_id);
        }else{
            $categoriesName = '';
        }

        if($request->start_date) {
            $schedules = $schedules->where('date', '>=', $request->start_date);
        }

        if($request->end_date) {
            $schedules = $schedules->where('date', '<=', $request->end_date);
        }

        if($request->end_date < $request->start_date){
            Alert::error('Error', 'End date should be greater than Start date!'); 
        }


        $schedules = $schedules->orderBy('date', 'asc')->get();

        return view('schedules.index', compact('schedules', 'categories', 'categoriesName'));
    }

    public function importIndex()
    {
        return view('schedules.import');
    }

    public function import(Request $request)
    {
        $validator = Excel::import(new ScheduleImport,request()->file('file'));
        
        Alert::success('Success', 'Occupants Imported Successfully!');
           
        return back();
    }


    public function removeSchedulesIndex(Request $request)
    {
     
        $schedules = new Schedule();

        if($request->start_date) {
            $schedules = $schedules->where('date', '>=', $request->start_date);
        }

        if($request->end_date) {
            $schedules = $schedules->where('date', '<=', $request->end_date);
        }

        if($request->end_date < $request->start_date){
            Alert::error('Error', 'End date should be greater than Start date!'); 
        }

        $schedules = $schedules->orderBy('date', 'asc')->get();

        return view('maintenance.schedules.delete-schedules', compact('schedules'));
    }

    public function removeSchedules(Request $request)
    {
        
        $schedules = Schedule::where('date', '>=', $request->start_date)
        ->where('date', '<=', $request->end_date)
        ->delete();
        
        Alert::success('Success', 'Schedule from ' .date('M-d', strtotime($request->start_date)).' to ' .date('M-d-Y', strtotime($request->end_date)). ' was successfully deleted!');

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
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
