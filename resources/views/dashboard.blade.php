@extends('layouts.master')

@section('title', 'Dashboard')
@section('content') 

<div class="row">
    <div class="col-12 col-lg-12 col-xl-12 d-flex">
        <div class="card illustration flex-fill">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row no-gutters w-100">
                    <div class="col-6">
                        <div class="illustration-text p-3 m-1">
                            <h4 class="illustration-text">{{ $greetings }}<i class="far fa-fw fa-smile"></i> <br></h4>
                            <h3 class="illustration-text ml-3">{{ Auth::user()->name }}</h3>
                            @if (auth()->user()->role == 'user')
                            <hr><h5>Badge Number: {{ auth()->user()->badge }}</h5>
                            <h5>Facilities Info: {{ $houseInfo->building->rc_no }} {{ $houseInfo->building->ifc_no }} {{ $houseInfo->building->flat_no }}
                               {{ $houseInfo->building->villa_no }} {{ $houseInfo->building->lot_no }} {{ $houseInfo->building->block_no }} 
                               {{ $houseInfo->building->street }} ({{ $houseInfo->building->description }})</h5>
                                <h5>Check In Date: {{ date('M-d-Y', strtotime($houseInfo->issued_date)) }}</h5>
                            @endif
                        </div>
                    </div>
                      
                    <div class="col-6 align-self-end text-right">
                        <img src="/assets/img/illustrations/customer-support.png" alt="Customer Support" class="img-fluid illustration-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin' || auth()->user()->role == 'supervisor' || auth()->user()->role == 'scheduler')
<div class="row">
    <div class="col-12 col-sm-6 col-xxl d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-2">{{ $open }}</h3>
                        <p class="mb-2">Open Appointments</p>
                    </div>
                    <div class="d-inline-block ml-3">
                        <div class="stat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle align-middle mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xxl d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-2">{{ $closed }}</h3>
                        <p class="mb-2">Closed Appointments</p>
                    </div>
                    <div class="d-inline-block ml-3">
                     <div class="d-inline-block ml-3">
                        <div class="stat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle align-middle mr-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xxl d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-2">{{ $app_created }}</h3>
                        <p class="mb-2">Total Appointments Created</p>
                    </div>
                    <div class="d-inline-block ml-3">
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info align-middle mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xxl d-flex">
     
    </div>
</div>
@endif
@if (auth()->user()->role == 'user')
<div class="row">
    <div class="col-12 col-sm-6 col-xxl d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-2">{{ $open }}</h3>
                        <p class="mb-2">Open Appointments</p>
                    </div>
                    <div class="d-inline-block ml-3">
                        <div class="stat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle align-middle mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xxl d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-2">{{ $closed }}</h3>
                        <p class="mb-2">Closed Appointments</p>
                    </div>
                    <div class="d-inline-block ml-3">
                     <div class="d-inline-block ml-3">
                        <div class="stat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle align-middle mr-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xxl d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-2">{{ $app_created }}</h3>
                        <p class="mb-2">Total Appointments Created</p>
                    </div>
                    <div class="d-inline-block ml-3">
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info align-middle mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xxl d-flex">
     
    </div>
</div>
@endif

@endsection
