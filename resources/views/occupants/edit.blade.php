@extends('layouts.master')

@section('title', 'Update Occupant')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><i class="fas fa-fw fa-user-edit"></i> Update {{ $occupant->name }}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('occupants.update', $occupant->id) }}" id="occ-create">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{ $occupant->status }}">
                    <div class="form-group">
                        <label class="form-label">Badge</label>
                        <input type="text" class="form-control" name="badge" value="{{ $occupant->badge }}" placeholder="badge">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $occupant->name }}" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $occupant->email }}" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" value="{{ $occupant->mobile }}" placeholder="mobile number">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Cost Center</label>
                        <input type="text" class="form-control" name="cost_center" value="{{ $occupant->cost_center }}" placeholder="Cost Center">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status Description</label>
                        <select name="status_desc" class="form-control">
                            <option value="{{ $occupant->status_desc }}">{{ $occupant->status_desc }}</option>
                            <option value="Single">Single</option>
                            <option value="Family">Family</option>
                        </select>
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