@extends('layouts.master')

@section('title', 'Create Job Order')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <p>Occupant Name:</p>
                <h3>{{ $jobOrder->occupant->name }}</h3>
                <p>Unit Number:</p>
                <h3>{{ $jobOrder->building->unit_no }}</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('job-orders.store') }}" id="job-create">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="occupant_id" value="{{ $jobOrder->occupant->id }}">
                    <input type="hidden" name="building_id" value="{{ $jobOrder->building->id }}">
                    <div class="form-group">
                        <label class="form-label">Job Type</label>
                        <select name="job_type" class="form-control select2">
                            <option value="">Select...</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Electrical">Electrical</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job Category</label>
                        <select name="job_category" class="form-control select2">
                            <option value="">Select...</option>
                            <option value="Leakage">Leakage</option>
                            <option value="Busted Light">Busted Light</option>
                            <option value="Busted Light">Flourescent Not Working</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Notes</label>
                       <textarea name="notes" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                        <a href="javascript:history.back()" type="button" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-3"></div>
</div>

@endsection