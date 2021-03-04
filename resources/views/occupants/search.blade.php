@extends('layouts.master')

@section('title', 'Search Result')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="javascript:history.back()" class="btn btn-secondary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                    <p class="text-center">Results return for [<strong>{{ request('search') }}</strong>] = <strong>{{ number_format($total) }}</strong></p>
                </div>
                <div class="card-body">
                    @if ($occupants->count() > 0)
                    <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Badge No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Cost Center</th>
                                <th>Status Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($occupants as $occupant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $occupant->badge }}</td>
                                    <td>
                                        @if ($occup->count() > 0)
                                            <a href="{{ route('occupancies.show', $occupant->id) }}">{{ $occupant->name }}</a>
                                        @else
                                        {{ $occupant->name }}
                                        @endif
                                    </td>
                                    <td>{{ $occupant->email }}</td>
                                    <td>{{ $occupant->mobile }}</td>
                                    <td>{{ $occupant->cost_center }}</td>
                                    <td>{{ $occupant->status_desc }}</td>
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
                    @else
                        <h3 class="text-center">No Data Found! . . .</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection