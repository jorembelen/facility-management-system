@extends('layouts.master')

@section('title', 'Appointment Manager')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary float-right" role="button" href="{{ route('client-appointments.create') }}"><i class="fas fa-plus-circle"></i> Create Appointment</a>
                    <h3>Appointments List</h3>
                   
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
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->category->name }}</td>
                                        <td>{{ date('M-d-Y', strtotime($appointment->date)) }}</td>
                                        <td>{{ $appointment->schedule_time }}</td>
                                        <td>
                                            <a href="{{ route('client-appointments.show', $appointment->id) }}">{{ $appointment->job_description }}</a>
                                        </td>
                                        <td>
                                            @if ($appointment->status == 0)
                                            <span class="badge badge-danger">Open</span>
                                            @else
                                            <span class="badge badge-success">Closed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($appointment->status == 1)
                                                @if ($appointment->survey_status == 0)
                                                <a  href="{{ route('surveys.show', $appointment->id) }}"><i class="fas fa-fw fa-star"></i> Give us your rating</a>
                                                @else
                                                    @if ($appointment->survey_score == 1)
                                                        {{ $appointment->survey_score }} - Poor
                                                    @elseif($appointment->survey_score == 2)
                                                        {{ $appointment->survey_score }} - Needs Improvement
                                                    @elseif($appointment->survey_score == 3)
                                                        {{ $appointment->survey_score }} - Satisfactory
                                                    @elseif($appointment->survey_score == 4)
                                                        {{ $appointment->survey_score }} - Very Good
                                                    @elseif($appointment->survey_score == 5)
                                                        {{ $appointment->survey_score }} - Excellent
                                                    @else 
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                </tr>
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection