@extends('layouts.master')

@section('title', 'Create Appointment')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Job Order: {{ $id }}</h2>
                <p>Job Type:</p>
                <h3>{{ $appointment->job_type }}</h3>
                <p>Job Category:</p>
                <h3>{{ $appointment->job_category }}</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('appointments.store') }}" id="app-create">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="job_order_id" value="{{ $id }}">
                    <div class="form-group">
                        <label class="form-label">Technician</label>
                        <select name="employee_id" class="form-control select2">
                            <option value="">Select...</option>
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date</label>
                       <input type="date" class="form-control" name="date">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Time</label>
                       <input type="time" class="form-control" name="time">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Remarks</label>
                        <textarea name="remarks" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Color</label>
                       {{-- <input type="color" class="form-control" name="background_color"> --}}
                       <select name="background_color" class="form-control">
                           <option value="">Select Color</option>
                        <option style="background: #FF0000" value="#FF0000">Red</option>
                        <option style="background: #000000" value="#000000">Black</option>
                        <option style="background: #0000FF" value="#0000FF">Blue</option>
                        <option style="background: #FFFF00" value="#FFFF00">Yellow</option>
                        <option style="background: #008000" value="#008000">Green</option>
                      </select>
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