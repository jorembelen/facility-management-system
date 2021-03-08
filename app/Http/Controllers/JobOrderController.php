<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobOrderStoreRequest;
use App\Models\ClientAppointment;
use App\Models\Employee;
use App\Models\JobOrder;
use App\Models\Occupancy;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobOrders = JobOrder::latest()->get();

        return view('job-orders.index', compact('jobOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobOrderStoreRequest $request)
    {
        $jobOrder = new JobOrder();
        $jobOrder->user_id = $request->user_id;
        $jobOrder->client_appointment_id = $request->client_appointment_id;
        if($request->filled('new_date')){
            $jobOrder->date = $request->new_date;
        }else{
            $jobOrder->date = $request->date;
        }
        if($request->filled('new_time')){
            $jobOrder->time = $request->new_time;
        }else{
            $jobOrder->time = $request->time;
        }
        $jobOrder->notes = $request->notes;
        $jobOrder->technicians = implode(', ', $request->technicians);
        $jobOrder->save();

        Alert::toast('New Schedule was successfully created!', 'success');

        return back();
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobOrder  $jobOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobOrder = ClientAppointment::findOrFail($id);
        $employees = Employee::latest()->get();
        $schedules = jobOrder::whereclient_appointment_id($id)->get();

        return view('appointments.index', compact('jobOrder', 'employees', 'schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobOrder  $jobOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(JobOrder $jobOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobOrder  $jobOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobOrder $jobOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobOrder  $jobOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOrder $jobOrder)
    {
        //
    }
}
