@extends('layouts.master')

@section('title', 'Occupancies List')
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
                                <th>Badge No.</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Building Type</th>
                                <th>CheckIn Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($occupancies as $occupant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $occupant->tenant->badge }}</td>
                                    <td>
                                        <a href="#">{{ $occupant->tenant->name }}</a>
                                        {{-- <a href="{{ route('users.show', $occupant->occupant->id) }}">{{ $occupant->occupant->name }}</a> --}}
                                    </td>
                                    <td>{{ $occupant->building->rc_no }} {{ $occupant->building->ifc_no }} {{ $occupant->building->flat_no }}
                                        {{ $occupant->building->villa_no }} {{ $occupant->building->lot_no }} {{ $occupant->building->block_no }} 
                                        {{ $occupant->building->street }}</td>
                                    <td>{{ $occupant->building->description }}</td>
                                    <td>{{ $occupant->issued_date->format('M-d-Y')}}</td>
                                <td class="text-center">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Click</button>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <a class="dropdown-item" href="{{ route('occupants.edit', $occupant->id) }}"><i class="fas fa-fw fa-pencil-alt"></i> Update</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$occupant->id}}"><i class="fas fa-fw fa-trash"></i> Delete</a>
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