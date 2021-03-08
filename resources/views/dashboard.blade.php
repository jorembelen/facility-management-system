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
                            <h4 class="illustration-text text-center">{{ $greetings }}<i class="far fa-fw fa-smile"></i> <br></h4>
                            <h3 class="illustration-text ml-3 text-center">{{ Auth::user()->name }}</h3>
                            @if (auth()->user()->role == 'tenant')
                            <hr>
                            <h5>Email: {{ auth()->user()->email }}</h5>
                            <h5>Mobile No: {{ auth()->user()->mobile }}</h5>
                            <h5>Badge Number: {{ auth()->user()->badge }}</h5>
                            <h5>Facilities Info: {{ $houseInfo->building->rc_no }} {{ $houseInfo->building->ifc_no }} {{ $houseInfo->building->flat_no }}
                               {{ $houseInfo->building->villa_no }} {{ $houseInfo->building->lot_no }} {{ $houseInfo->building->block_no }} 
                               {{ $houseInfo->building->street }} ({{ $houseInfo->building->description }})</h5>
                                <h5>Check In Date: {{ date('M-d-Y', strtotime($houseInfo->occupancy->issued_date)) }}</h5>
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
                        <a href="/open-appointments"><p class="mb-2">Open Work Orders</p></a>
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
                        <a href="/closed-appointments"><p class="mb-2">Closed Work Orders</p></a>
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
                        <h3 class="mb-2">{{ $cancelled }}</h3>
                        <a href="/cancelled-appointments"><p class="mb-2">Cancelled Work Orders</p></a>
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
                        <a href="/appointments"><p class="mb-2">Total Work Orders</p></a>
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
</div>
@endif
@if (auth()->user()->role == 'tenant')
<div class="row">
    <div class="col-12 col-sm-6 col-xxl d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-2">{{ $open }}</h3>
                        <a href="/client-appointments"><p class="mb-2">Open Work Orders</p></a>
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
                        <a href="/client-appointments"><p class="mb-2">Closed Work Orders</p></a>
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
                        <h3 class="mb-2">{{ $cancelled }}</h3>
                        <a href="/client-appointments"><p class="mb-2">Cancelled Work Orders</p></a>
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
                        <a href="/client-appointments"><p class="mb-2">Total Work Orders</p></a>
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
</div>

{{-- Score Survey Table --}}
@if ($surveyScores->count() > 0)
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Please Rate Us</h5>
            </div>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Job Category</th>
                        <th>Date</th>
                        <th>Scheduled Time</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                 
                        @foreach ($surveyScores as $surveyScore)
                        <tr>
                        <td>{{ $surveyScore->category->name }}</td>
                        <td>{{ date('M-d-Y', strtotime($surveyScore->date)) }}</td>
                        <td>{{ $surveyScore->schedule_time }}</td>
                        <td>  <span class="badge badge-success">Closed</span></td>
                        <td><a  href="{{ route('surveys.show', $surveyScore->id) }}"><i class="fas fa-fw fa-star" style="color:green"></i> Give us your rating</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endif

@endsection
