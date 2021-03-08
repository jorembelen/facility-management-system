@extends('layouts.master')

@section('title', 'All Appointments List')
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
                                <th>WO No.</th>
                                <th>Badge No.</th>
                                <th>Clients Name</th>
                                <th>Facilities Info</th>
                                <th>Work Category</th>
                                <th>Scheduled Date</th>
                                <th>Scheduled Time</th>
                                <th>Job Description</th>
                                <th>Status</th>
                                <th>Satisfaction Score</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="View Tenant Info" href="{{ route('appointments.show', $appointment->id) }}">{{ $appointment->id }}</a>
                                    </td>
                                    <td>
                                        {{ $appointment->client->badge }}
                                    </td>
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
                                        <span class="badge badge-primary">Open</span>
                                        @elseif ($appointment->status == 1)
                                        <span class="badge badge-success">Closed</span>
                                        @else
                                        <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($appointment->status == 1)
                                        @if ($appointment->survey_status == 0)
                                        <a  href="{{ route('surveys.show', $appointment->id) }}"><i class="fas fa-fw fa-star" style="color:green"></i> Give us your rating</a>
                                        @else
                                            @if ($appointment->survey_score == 1)
                                            <a href="{{ route('surveys.edit', $appointment->id) }}"> {{ $appointment->survey_score }} - Poor</a>
                                            @elseif($appointment->survey_score == 2)
                                            <a href="{{ route('surveys.edit', $appointment->id) }}"> {{ $appointment->survey_score }} - Needs Improvement</a>
                                            @elseif($appointment->survey_score == 3)
                                                <a href="{{ route('surveys.edit', $appointment->id) }}"> {{ $appointment->survey_score }} - Satisfactory</a>
                                            @elseif($appointment->survey_score == 4)
                                            <a href="{{ route('surveys.edit', $appointment->id) }}"> {{ $appointment->survey_score }} - Very Good</a>
                                            @elseif($appointment->survey_score == 5)
                                            <a href="{{ route('surveys.edit', $appointment->id) }}"> {{ $appointment->survey_score }} - Excellent</a>
                                            @else 
                                            @endif
                                        @endif
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