@extends('layouts.master')

@section('title', 'Facilities List')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <a class="btn btn-primary float-right" role="button" href="#" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i> Add</a> --}}
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
                                <th>Action</th>
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
                                        @if ($building->status == 1)
                                            {{-- <span class="badge badge-success">Occupied</span> --}}
                                            {{-- <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to Check Out" href="{{ route('checkout.view', $building->id) }}"><span class="badge badge-success">Check Out</span></a> --}}
                                            <span class="badge badge-primary">Occupied</span>
                                            @else
                                            <span class="badge badge-danger">Vacant</span>
                                        @endif
                                    </td>
                                <td class="text-center">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Click</button>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <a class="dropdown-item" href="{{ route('facilities.show', $building->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                                                Details</a>
                                            <a class="dropdown-item" href="{{ route('facilities.edit', $building->id) }}"><i class="fas fa-fw fa-pencil-alt"></i> Update</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$building->id}}"><i class="fas fa-fw fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection