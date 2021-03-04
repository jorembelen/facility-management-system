@extends('layouts.master')

@section('title', 'Update Employee')
@section('content') 

<div class="row">
    <div class="col-3"></div>
<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('employees.update', $employee->id) }}" id="emp-update">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group row">
                    <label for="name" class="col-md-3 mt-1 ml-1 col-form-label">Badge</label>
                    <div class="col-md-8 mt-1">
                        <input type="text" class="form-control" name="badge" value="{{ $employee->badge }}" placeholder="badge">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 mt-1 ml-1 col-form-label">Name</label>
                    <div class="col-md-8 mt-1">
                        <input type="text" class="form-control" name="name" value="{{ $employee->name }}" placeholder="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 mt-1 ml-1 col-form-label">Designation</label>
                    <div class="col-md-8 mt-1">
                        <input type="text" class="form-control" name="designation" value="{{ $employee->designation }}" placeholder="designation">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 mt-1 ml-1 col-form-label">Mobile</label>
                    <div class="col-md-8 mt-1">
                        <input type="text" class="form-control" name="mobile" value="{{ $employee->mobile }}" placeholder="mobile">
                    </div>
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
<div class="col-3"></div>
</div>
@endsection