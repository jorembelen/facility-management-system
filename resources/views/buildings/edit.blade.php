@extends('layouts.master')

@section('title', 'Update Building')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-fw fa-user-edit"></i> Update {{ $building->host_desc }}</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('buildings.update', $building->id) }}" id="build-create">
                    @csrf
                    @method('PUT')
                    {{-- <input type="hidden" name="status" value="{{ auth()->user()->id }}"> --}}
                  <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Unit Number</label>
                        <input type="text" class="form-control" name="unit_no" value="{{ $building->unit_no }}" placeholder="unit number">
                    </div>
                 </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Company Code</label>
                        <input type="text" class="form-control" name="company_code" value="{{ $building->company_code }}" placeholder="Company Code">
                    </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Unit Category</label>
                        <select name="category" class="form-control select2">
                            <option value="{{ $building->category }}">{{ $building->category }}</option>
                            <option value="BULD">BULD</option>
                            <option value="CHU">CHU</option>
                            <option value="EP">EP</option>
                            <option value="HL">HL</option>
                            <option value="HOP">HOP</option>
                            <option value="XHOP">XHOP</option>
                        </select>
                    </div>
                </div>
                   <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Unit Status Description</label>
                        <select name="status" class="form-control select2">
                            <option value="{{ $building->status }}">{{ $building->status }}</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Vacant">Vacant</option>
                            <option value="Returned">Returned</option>
                            <option value="Rented to others">Rented to others</option>
                            <option value="Transfer Ownership">Transfer Ownership</option>
                            <option value="Under Restoration">Under Restoration</option>
                            <option value="For Turn Over">For Turn Over</option>
                            <option value="Guest house">Guest house</option>
                            <option value="Waiting to be vacant">Waiting to be vacant</option>
                        </select>
                    </div>
                   </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <select name="company" class="form-control select2">
                            <option value="{{ $building->company }}">{{ $building->company }}</option>
                            <option value="SABIC">SABIC</option>
                            <option value="SADAF">SADAF</option>
                            <option value="SHARQ">SHARQ</option>
                            <option value="AR RAZI">AR RAZI</option>
                            <option value="KEMYA">KEMYA</option>
                            <option value="IBN SINA">IBN SINA</option>
                            <option value="AL BAYRONI">AL BAYRONI</option>
                            <option value="SAUDI KAYAN">SAUDI KAYAN</option>
                        </select>
                    </div>
                 </div>
                 <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city" value="{{ $building->city }}" placeholder="City">
                        </div>
                </div>
                 <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Sector</label>
                            <input type="text" class="form-control" name="sector" value="{{ $building->sector }}" placeholder="sector">
                        </div>
                </div>
                 <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Block</label>
                            <input type="text" class="form-control" name="block" value="{{ $building->block }}" placeholder="block">
                        </div>
                </div>
                 <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Plot</label>
                            <input type="text" class="form-control" name="plot" value="{{ $building->plot }}" placeholder="plot">
                        </div>
                </div>
                 <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">House Number</label>
                            <input type="text" class="form-control" name="house_no" value="{{ $building->house_no }}" placeholder="house number">
                        </div>
                </div>
                 <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Flat</label>
                            <input type="text" class="form-control" name="flat" value="{{ $building->flat }}" placeholder="Flat">
                        </div>
                </div>
                 <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Street Name</label>
                            <input type="text" class="form-control" name="street" value="{{ $building->street }}" placeholder="Street Name">
                        </div>
                </div>
                 <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Covering Eligibility</label>
                            <input type="text" class="form-control" name="covering_eligibility" value="{{ $building->covering_eligibility }}" placeholder="Covering Eligibility">
                        </div>
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