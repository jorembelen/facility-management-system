@extends('layouts.master')

@section('title', 'Occupants Info')
@section('content') 



<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-actions float-right">
                    <div class="dropdown show">
                        <a href="#" data-toggle="dropdown" data-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Occupant Information</h5>
            </div><br>
            <div class="card-body h-100">

                <div class="media">
                    <h4>Badge Number: {{ $occupant->badge }}</h4>
                </div><hr>
                <div class="media">
                    <h4>Name: {{ $occupant->name }}</h4>
                </div><hr>
                <div class="media">
                    <h4>Email: {{ $occupant->email }}</h4>
                </div><hr>
                <div class="media">
                    <h4>Mobile Number: {{ $occupant->mobile }}</h4>
                </div><hr>

                <a href="javascript:history.back()" type="button"class="btn btn-secondary mb-2 float-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                    Back
                </a> 
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

@endsection