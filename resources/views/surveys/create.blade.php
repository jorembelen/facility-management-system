@extends('layouts.master')

@section('title', 'Create Appointment')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Create Survey</h2>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button"  method="POST" action="{{ route('client-appointments.update', $id) }}" id="survey-create">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                       <h3>{{ date('M-d-Y', strtotime($appointment->date)) }}</h3>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Scheduled Time</label>
                       <h3>{{ $appointment->schedule_time }}</h3>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job Description</label>
                        <h3>{{ $appointment->job_description }}</h3>
                    </div><hr>
                    <div class="form-group row">
                        <label for="create-name" class="col-md-4 ml-3 col-form-label">Score</label>
                        <div class="col-md-11 ml-3">
                            <select name="survey_score" class="form-control select2">
                                <option value="5">5 - Excellent</option>
                                <option value="4">4 - Very Good</option>
                                <option value="3">3 - Satisfactory</option>
                                <option value="2">2 - Needs Improvement</option>
                                <option value="1">1 - Poor</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="create-name" class="col-md-4 ml-3 col-form-label">Comments</label>
                        <div class="col-md-11 ml-3">
                            <textarea name="survey_comments" class="form-control" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                        <a href="{{ \URL::previous() }}" type="button" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-3"></div>
</div>

@endsection