@extends('layouts.master')

@section('title', 'Open Appointments List')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary float-right" role="button" href="{{ route('client-appointments.create') }}"><i class="fas fa-plus-circle"></i> Create Appointment</a>
                              
                     </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>Work Order No.</th>
                                <th>Badge No.</th>
                                <th>Clients Name</th>
                                <th>Facilities Info</th>
                                <th>Work Category</th>
                                <th>Scheduled Date</th>
                                <th>Scheduled Time</th>
                                <th>Job Description</th>
                                <th>Status</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="View Tenant Info" href="{{ route('appointments.show', $appointment->id) }}">{{ $appointment->id }}</a>
                                    </td>
                                    <td>{{ $appointment->client->badge }}</td>
                                    <td>{{ $appointment->client->name }}</td>
                                    <td>
                                        {{ $appointment->building->rc_no }} {{ $appointment->building->ifc_no }} {{ $appointment->building->flat_no }}
                                        {{ $appointment->building->villa_no }} {{ $appointment->building->lot_no }} {{ $appointment->building->block_no }} 
                                        {{ $appointment->building->street }} ({{ $appointment->building->description }})
                                    </td>
                                    <td>{{ $appointment->category->name }}</td>
                                    <td>{{ date('M-d-Y', strtotime($appointment->date)) }}</td>
                                    <td>{{ $appointment->schedule_time }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="View Appointment Details" href="{{ route('client-appointments.show', $appointment->id) }}">{{ Str::limit($appointment->job_description, 200) }}</a>
                                    </td>
                                    <td>
                                        @if ($appointment->status == 0)
                                            <a href="{{ route('job-orders.show', $appointment->id) }}">  <span class="badge badge-primary">Open</span></a>
                                        @elseif ($appointment->status == 1)
                                            <span class="badge badge-success">Closed</span>
                                        @else
                                            <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection