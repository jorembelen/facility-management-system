@extends('layouts.master')

@section('title', 'Cancelled Appointments List')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Clients Name</th>
                                <th>Work Category</th>
                                <th>Scheduled Date</th>
                                <th>Scheduled Time</th>
                                <th>Job Description</th>
                                <th>Reason</th>
                                <th>Status</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td> 
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="View Tenant Info" href="{{ route('appointments.show', $appointment->id) }}">{{ $appointment->id }}</a>
                                    </td>
                                    <td>{{ $appointment->client->name }}</td>
                                    <td>{{ $appointment->category->name }}</td>
                                    <td>{{ date('M-d-Y', strtotime($appointment->date)) }}</td>
                                    <td>{{ $appointment->schedule_time }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="View Appointment Details" href="{{ route('client-appointments.show', $appointment->id) }}">{{ Str::limit($appointment->job_description, 200) }}</a>
                                    </td>
                                    @if ($appointment->cancellation_reason == 'Others')
                                    <td>
                                        {{ $appointment->cancellation_reason }} - {{ Str::limit($appointment->cancellation_comments, 200) }}
                                    </td>
                                    @else
                                    <td>
                                        {{ $appointment->cancellation_reason }}
                                    </td>
                                    @endif
                                    <td>
                                        @if ($appointment->status == 0)
                                        <span class="badge badge-primary">Open</span>
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