@extends('layouts.master')

@section('title', 'Appointment Manager')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab" aria-selected="true">Open</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-toggle="tab" role="tab" aria-selected="false">Closed</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab" aria-selected="false">Cancelled</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-1" role="tabpanel">
                        <h4 class="tab-title">Open Appointments</h4>
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary float-right" role="button" href="{{ route('client-appointments.create') }}"><i class="fas fa-plus-circle"></i> Create Appointment</a>
                              
                            </div>
                            <div class="card-body">
                                <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Work Category</th>
                                            <th>Scheduled Date</th>
                                            <th>Scheduled Time</th>
                                            <th>Job Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                        @if (auth()->user()->badge == $appointment->badge)         
                                        @if ($appointment->status == 0)         
                                                <tr>
                                                    <td>{{ $appointment->id }}</td>
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
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2" role="tabpanel">
                        <h4 class="tab-title">Closed Appointments</h4>
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary float-right" role="button" href="{{ route('client-appointments.create') }}"><i class="fas fa-plus-circle"></i> Create Appointment</a>
                              
                            </div>
                            <div class="card-body">
                                <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
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
                                        @if (auth()->user()->badge == $appointment->badge)         
                                        @if ($appointment->status == 1)         
                                                <tr>
                                                    <td>{{ $appointment->id }}</td>
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
                                            @endif
                                            @endif
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3" role="tabpanel">
                        <h4 class="tab-title">Cancelled Appointments</h4>
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary float-right" role="button" href="{{ route('client-appointments.create') }}"><i class="fas fa-plus-circle"></i> Create Appointment</a>
                              
                            </div>
                            <div class="card-body">
                                <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
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
                                        @if (auth()->user()->badge == $appointment->badge)         
                                        @if ($appointment->status == 2)         
                                                <tr>
                                                    <td>{{ $appointment->id }}</td>
                                                    <td>{{ $appointment->category->name }}</td>
                                                    <td>{{ date('M-d-Y', strtotime($appointment->date)) }}</td>
                                                    <td>{{ $appointment->schedule_time }}</td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="View Appointment Details" href="{{ route('client-appointments.show', $appointment->id) }}">{{ Str::limit($appointment->job_description, 200) }}</a>
                                                    </td>
                                                    <td>
                                                        {{ Str::limit($appointment->cancellation_reason, 200) }}
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
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
           
        
        </div>
    </div>


@endsection