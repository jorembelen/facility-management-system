@extends('layouts.master')

@section('title', 'Details')
@section('content') 

<div class="row">
    <div class="col-xl-2"></div>
    <div class="col-xl-8">.
<div class="card">
    <div class="card-header">
        <a href="javascript:history.back()" class="btn btn-primary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
        @if($occupancies->count() > 0)
        <p>Occupant Details:</p>
        <h5>Badge: {{ $badge }}</h5>
        <h5>Name: {{ $name }}</h5>
    </div>
    <div class="card-body">
        <table id="tables" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
            <thead>
                <tr>
                    <th>#</th>
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
                            <td>
                                <a href="{{ route('buildings.show', $occupant->building->id) }}" 
                                    data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to view building details!"
                                    >{{ $occupant->building->unit_no }}</a>
                            </td>
                            <td>{{ $occupant->building->status }}</td>
                            <td>{{ $occupant->owner_description }}</td>
                            <td>{{ $occupant->released_date ? $occupant->released_date->format('M-d-Y') : null }}</td>
                            <td>{{ $occupant->check_in_date ? $occupant->check_in_date->format('M-d-Y') : null }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm" href="{{ route('job-orders', $occupant->building->id) }}"> Job Order</a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @else
            <h3 class="text-center">No Occupants Found! . . .</h3>
        @endif
    </div>
</div>
    </div>
    <div class="col-xl-2"></div>
</div>

@endsection