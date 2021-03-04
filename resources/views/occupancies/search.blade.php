@extends('layouts.master')

@section('title', 'Search Result')
@section('content') 

<div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-secondary float-right" role="button" href="#" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i> Add</a>
                    <p class="text-center">Results return for [<strong>{{ request('search') }}</strong>] = <strong>{{ number_format($total) }}</strong></p>
                </div>
                <div class="card-body">
                   
                    <table id="tables" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Badge</th>
                                <th>Name</th>
                                <th>Unit No</th>
                                <th>Status</th>
                                <th>Owner Description</th>
                                <th>Released Date</th>
                                <th>CheckIn Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($occupancies as $occupant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $occupant->occupant->badge }}</td>
                                    <td>{{ $occupant->occupant->name }}</td>
                                    <td>{{ $occupant->building->unit_no }}</td>
                                    <td>{{ $occupant->building->status }}</td>
                                    <td>{{ $occupant->owner_description }}</td>
                                    <td>{{ $occupant->released_date ? $occupant->released_date->format('M-d-Y') : null }}</td>
                                    <td>{{ $occupant->check_in_date ? $occupant->check_in_date->format('M-d-Y') : null }}</td>
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