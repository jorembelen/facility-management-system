@extends('layouts.master')

@section('title', 'Details')
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
                    <h3 class="card-title mb-0">Occupancy Information:</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-0">Tenant Info:</h5><br>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Badge Number:</dt>
                        <h5>{{ $tenant->badge }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Name:</dt>
                        <h5>{{ $tenant->name }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Email:</dt>
                        <h5>{{ $tenant->email }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Mobile:</dt>
                        <h5>{{ $tenant->mobile }}</h5>
                    </dl>
                    
                    <hr>
                    <h5 class="card-title mb-0">Facilities Info:</h5><br>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Location:</dt>
                        <h5>
                            {{ $tenant->building->rc_no }} {{ $tenant->building->ifc_no }} {{ $tenant->building->flat_no }}
                            {{ $tenant->building->villa_no }} {{ $tenant->building->lot_no }} {{ $tenant->building->block_no }} 
                            {{ $tenant->building->street }} 
                        </h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Description:</dt>
                        <h5>{{ $tenant->building->description }}</h5>
                    </dl>
                    
                    <a class="btn btn-primary float-right" href="#" data-toggle="modal" data-target="#checkout{{$tenant->id}}">Check Out Tenant</a>
    
                </div>
            </div>
    
        </div>
    <div class="col-xl-2"></div>
</div>


<!-- Checkout Tenant Modal -->
<div class="modal fade" id="checkout{{ $tenant->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleStandardModalLabel"><i class="align-middle mr-2 far fa-fw fa-frown" style="color:red"></i> Check Out Tenant?</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body m-3">
            <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('checkout.submit') }}" id="checkout">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="tenant_id" value="{{ $tenant->id }}">
                <input type="hidden" name="building_id" value="{{ $tenant->building->id }}">
                <h4 class="mb-0 text-center">If you are sure, please select date & click submit to proceed!</h4><br>
            <div class="form-group mt-2">
                <input type="text" class="form-control flatpickr flatpickr-input active" id="dateTimeFlatpickr" name="released_date" placeholder="checkout date">
            </div>
                <div class="form-group mt-2 frm-div" id="selectOthers" style="display:none">
                <textarea name="others" class="form-control" cols="30" rows="3" placeholder="Comments"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
            <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  @include('scripts.get_appointment')
@endsection