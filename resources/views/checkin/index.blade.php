@extends('layouts.master')

@section('title', 'Check In')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-secondary float-right" role="button" href="#" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i> Add Tenant</a>
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Villa #</th>
                                <th>Lot Villa #</th>
                                <th>RC Bldg. #</th>
                                <th>IFC Bldg. #</th>
                                <th>Flat Unit #</th>
                                <th>Block #</th>
                                <th>Street</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($buildings as $building)
                                <tr>
                                    <td>{{ $building->id }}</td>
                                    <td>{{ $building->villa_no }}</td>
                                    <td>{{ $building->lot_no }}</td>
                                    <td>{{ $building->rc_no }}</td>
                                    <td>{{ $building->ifc_no }}</td>
                                    <td>{{ $building->flat_no }}</td>
                                    <td>{{ $building->block_no }}</td>
                                    <td>{{ $building->street }}</td>
                                    <td>{{ $building->description }}</td>
                                    <td>
                                            <span class="badge badge-danger">Vacant</span>
                                    </td>
                                    <td>
                                            <a href="{{ route('tenant.checkin', $building->id) }}"><span class="badge badge-success">Check In</span></a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@include('occupants.create')
@endsection