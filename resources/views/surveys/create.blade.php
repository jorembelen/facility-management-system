@extends('layouts.master')

@section('title', 'Create Survey')
@section('content') 

<div class="row">
    <div class="col-xl-2"></div>
        <div class="col-lg-6 col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-action float-right">
                        <div class="dropdown show">
                        </div>
                    </div>
                    <h3 class="card-title mb-0">Create Survey:</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-disabled-button"  method="POST" action="{{ route('client-appointments.update', $id) }}" id="survey-create">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $id }}">
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Date:</dt>
                        <h5>{{ date('M-d-Y', strtotime($appointment->date)) }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Scheduled Time:</dt>
                        <h5>{{ $appointment->schedule_time }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Job Description:</dt>
                        <h5 class="text-justify ml-3 mr-3 mt-2">{{ $appointment->job_description }}</h5>
                    </dl><hr>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Score:</dt>
                        <select name="survey_score" class="form-control select2">
                            <option value=""></option>
                            <option value="5">5 - Excellent</option>
                            <option value="4">4 - Very Good</option>
                            <option value="3">3 - Satisfactory</option>
                            <option value="2">2 - Needs Improvement</option>
                            <option value="1">1 - Poor</option>
                       </select>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Comments:</dt>
                        <textarea name="survey_comments" class="form-control ml-3 mr-3" cols="30" rows="6"></textarea>
                    </dl>
                    <div class="modal-footer">
                        <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light disabled-button-prevent">Submit</button>
                        <a href="{{ \URL::previous() }}" type="button" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
                </form>
                </div>
                    
            </div>
        </div>
        
    <div class="col-xl-2"></div>
</div>

@endsection