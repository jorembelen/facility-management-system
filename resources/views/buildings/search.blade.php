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
                    @if ($buildings->count() > 0)
                    <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company Code</th>
                                <th>Category</th>
                                <th>Unit No.</th>
                                <th>Status</th>
                                <th>Company</th>
                                <th>City</th>
                                <th>Sector</th>
                                <th>Block</th>
                                <th>Plot</th>
                                <th>House No.</th>
                                <th>Flat</th>
                                <th>Street</th>
                                <th>Description</th>
                                <th>Covering Eligibility</th>
                                <th>Unit File No.</th>
                                <th>Land Area</th>
                                <th>House Cost</th>
                                <th>Total Cost</th>
                                <th>Market Value</th>
                                <th>Received Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($buildings as $building)
                                <tr>
                                    <td>{{ $building->id }}</td>
                                    <td>{{ $building->company_code }}</td>
                                    <td>{{ $building->category }}</td>
                                    <td>
                                        @if ($occupant->count() > 0)
                                        <a href="{{ route('job-orders', $building->id) }}">{{ $building->unit_no }}</a>
                                        @else
                                        {{ $building->unit_no }}
                                        @endif
                                    </td>
                                    <td>{{ $building->status }}</td>
                                    <td>{{ $building->company }}</td>
                                    <td>{{ $building->city }}</td>
                                    <td>{{ $building->sector }}</td>
                                    <td>{{ $building->block }}</td>
                                    <td>{{ $building->plot }}</td>
                                    <td>{{ $building->house_no }}</td>
                                    <td>{{ $building->flat }}</td>
                                    <td>{{ $building->street }}</td>
                                    <td>{{ $building->house_desc }}</td>
                                    <td>{{ $building->covering_eligibility }}</td>
                                    <td>{{ $building->unit_file_no }}</td>
                                    <td>{{ number_format($building->land_area, 2) }}</td>
                                    <td>{{ number_format($building->house_cost, 2) }}</td>
                                    <td>{{ number_format($building->total_cost, 2) }}</td>
                                    <td>{{ number_format($building->market_value, 2) }}</td>
                                    <td>{{ date('M-d-Y', strtotime($building->received_date)) }}</td>
                                <td class="text-center">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Click</button>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <a class="dropdown-item" href="{{ route('buildings.edit', $building->id) }}"><i class="fas fa-fw fa-pencil-alt"></i> Update</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$building->id}}"><i class="fas fa-fw fa-trash"></i> Delete</a>
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