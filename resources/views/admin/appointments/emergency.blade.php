@extends('layouts.master')

@section('title', 'Emergency Appointment')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Create Appointment</h2>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('client-appointments.store') }}" enctype="multipart/form-data" id="client-app-create">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Select Tenant</label>
                        <select name="job_type[]" class="form-control select2">
                            <option value=""></option>
                            @foreach ($tenants as $tenant)
                            <option value="{{ $tenant->id }}">{{ $tenant->badge }} - {{ $tenant->name }} ({{ $tenant->building->id }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job Category</label>
                        <select name="job_type[]" class="form-control select2">
                            <option value=""></option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Appointment Date</label>
                        <input type="text" class="form-control flatpickr flatpickr-input active" id="dateTimeFlatpickr" name="date" placeholder="select date">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Time</label>
                        <input type="text" class="form-control name="time" placeholder="time">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job Description</label>
                        <textarea name="job_description" class="form-control" cols="30" rows="6"></textarea>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                        <a href="client-appointments" type="button" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-3"></div>
</div>

@include('scripts.client_appointment')
@endsection