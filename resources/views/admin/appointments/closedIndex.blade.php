@extends('layouts.master')

@section('title', 'Closed Appointments List')
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
                                <th>Status</th>
                                <th>Satisfaction Score</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $appointment->client->name }}</td>
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