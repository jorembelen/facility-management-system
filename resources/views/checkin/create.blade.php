@extends('layouts.master')

@section('title', 'Check In')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">{{ $facility->id }} - {{ $facility->description }}
                </h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('checkin.store') }}" id="checkin">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="building_id" value="{{ $facility->id }}">
                <div class="form-group">
                    <label class="form-label">Tenant Name</label>
                    <select name="tenant_id" class="form-control select2" id="reason_frm" >
                        <option value="">Select</option>
                     @foreach ($tenants as $item)
                         <option value="{{ $item->id }}">{{ $item->badge }} - {{ $item->name }}</option>
                     @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Check In Date</label>
                    <input type="text" class="form-control flatpickr flatpickr-input active" id="dateTimeFlatpickr" name="issued_date" placeholder="select date">
                </div>
                <div class="form-group">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control" cols="30" rows="6"></textarea>
                </div>
                <div class="modal-footer">
                    <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                    <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                    <a href="{{ url('tenants-checkin') }}" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
            </form>
            </div>
        </div>
    </div>
    <div class="col-xl-3"></div>
</div>

@include('scripts.client_appointment')
@endsection