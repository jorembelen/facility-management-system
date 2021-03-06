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
                    <h3 class="card-title mb-0">Occupancy Details:</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-0">Tenant Info:</h5><br>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Badge Number:</dt>
                        <h5>{{ $appointment->client->badge }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Name:</dt>
                        <h5>{{ $appointment->client->name }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Email:</dt>
                        <h5>{{ $appointment->client->email }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Mobile:</dt>
                        <h5>{{ $appointment->client->mobile }}</h5>
                    </dl>
                    
                    <hr>
                    <h5 class="card-title mb-0">Facilities Info:</h5><br>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Location:</dt>
                        <h5>
                            {{ $appointment->building->rc_no }} {{ $appointment->building->ifc_no }} {{ $appointment->building->flat_no }}
                            {{ $appointment->building->villa_no }} {{ $appointment->building->lot_no }} {{ $appointment->building->block_no }} 
                            {{ $appointment->building->street }} 
                        </h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Description:</dt>
                        <h5>{{ $appointment->building->description }}</h5>
                    </dl>
                    
    
                </div>
            </div>
    
        </div>
    <div class="col-xl-2"></div>
</div>

@endsection