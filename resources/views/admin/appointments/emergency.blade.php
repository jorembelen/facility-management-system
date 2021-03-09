@extends('layouts.master')

@section('title', 'Emergency Appointment')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Create Emergency Appointment</h2>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('emergency.store') }}"  id="client-app-create">
                    @csrf
                    <input type="hidden" name="scheduler_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="work_category_id" value="8">
                    <div class="form-group">
                        <label class="form-label">Select Tenant</label>
                        <select name="user_id" class="form-control select2">
                            <option value=""></option>
                            @foreach ($tenants as $tenant)
                            <option value="{{ $tenant->id }}">{{ $tenant->badge }} - {{ $tenant->name }} ({{ $tenant->building->id }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Emergency Type</label>
                        <select name="emergency_type" class="form-control select2">
                            <option value=""></option>
                            <option value="House Fire or complete failure of firefighting equipment in any apartment building">House Fire or complete failure of firefighting equipment in any apartment building</option>
                            <option value="Failure of Firefighting Equipment">Failure of Firefighting Equipment</option>
                            <option value="Complete Electrical Failure">Complete Electrical Failure</option>
                            <option value="Water Leak from main line inside the house">Water Leak from main line inside the house</option>
                            <option value="Sewer line blockage">Sewer line blockage</option>
                            <option value="Lockout of Garage Door">Lockout of Garage Door</option>
                            <option value="Houses/Facilities Lockout">Houses/Facilities Lockout</option>
                            <option value="Complete Failure of Refrigerator">Complete Failure of Refrigerator</option>
                            <option value="Elevator Failure">Elevator Failure</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Appointment Date</label>
                        <input type="text" class="form-control flatpickr flatpickr-input active" id="dateTimeFlatpickr" name="date" placeholder="select date">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Time</label>
                        <input type="text" class="form-control" name="schedule_time" placeholder="schedule time">
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