@extends('layouts.master')

@section('title', 'View Survey')
@section('content') 

<div class="row">
    <div class="col-xl-2"></div>
        <div class="col-lg-6 col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-action float-right">
                        <div class="dropdown show">
                            <a href="javascript:history.back()" class="btn btn-secondary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                        </div>
                    </div>
                    <h3 class="card-title mb-0">View Survey:</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Date:</dt>
                        <h5>{{ date('M-d-Y', strtotime($appointment->date)) }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Scheduled Time:</dt>
                        <h5>{{ $appointment->schedule_time }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Job Category:</dt>
                        <h5>{{ $appointment->category->name }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Job Description:</dt>
                        <h5 class="text-justify ml-3 mr-3 mt-2">{{ $appointment->job_description }}</h5>
                    </dl><hr>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Score:</dt>
                        <h5 class="text-justify ml-3 mr-3 mt-2">{{ $appointment->survey_score }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Comments:</dt>
                        <h5 class="text-justify ml-3 mr-3 mt-2">{{ $appointment->survey_comments }}</h5>
                    </dl>
                    
            </div>
        </div>
        
    <div class="col-xl-2"></div>
</div>

@endsection