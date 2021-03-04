<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentStoreRequest;
use App\Models\Appointment;
use App\Models\ClientAppointment;
use App\Models\Employee;
use App\Models\JobOrder;
use App\Models\Occupancy;
use App\Models\Occupant;
use App\Models\Survey;
use App\Models\WorkCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = ClientAppointment::latest()->get();
        // $appointments = ClientAppointment::latest()->get();
        // foreach($appointments as $d)
        // {
        //     return $d->occupancy;
        // }

        return view('admin.appointments.index', compact('appointments'));
    }

    public function closed()
    {
        $appointments = ClientAppointment::wherestatus(1)->get();
        return view('admin.appointments.closedIndex', compact('appointments'));
    }

    public function open()
    {
        $appointments = ClientAppointment::wherestatus(0)->get();
        return view('admin.appointments.openIndex', compact('appointments'));
    }

    public function allAppointments()
    {
        $appointments = Appointment::latest()->get();
        
        return view('appointments.index', compact('appointments'));
    }

    public function calendar()
    {
        $appointments = Appointment::wherehas('job_order')->get();
        $today = date("Y-m-d");
       
        
        return view('appointments.calendar', compact('appointments', 'today'));
    }
    public function showAppointment($id)
    {
        $appointments = Appointment::wherejob_order_id($id)->get();
        $jobOrder = JobOrder::findOrFail($id);
        $status = $jobOrder->status;

        return view('appointments.index', compact('appointments', 'jobOrder', 'id', 'status'));
    }

    public function closedAppointment(Request $request)
    {
        $id = $request->id;
        $updateStatus = JobOrder::whereid($id)->update(array('status' => 2));

        return redirect('/job-orders');
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
    public function store(AppointmentStoreRequest $request)
    {
        $id = $request->job_order_id;

        $appointment = Appointment::create($request->all());
        $updateStatus = JobOrder::whereid($id)->update(array('status' => 1));
        Alert::toast('New Appointment was successfully created!', 'success');

        return redirect('/job-orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($badge)
    {
    //  return   $appointment = Occupant::findOrFail($badge);
    //     $employees = Employee::all();

    //     return view('appointments.create', compact('appointment', 'id', 'employees'));
    }

    public function info($badge)
    {
        return   $appointment = Occupant::findOrFail($badge);
        $employees = Employee::all();

        return view('appointments.create', compact('appointment', 'id', 'employees'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
