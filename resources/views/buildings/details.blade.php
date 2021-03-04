@extends('layouts.master')

@section('title', 'Building Info')
@section('content') 

<div class="row">
    <div class="col-xl-2"></div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <div class="">
                    <a href="javascript:history.back()" class="btn btn-primary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                </div>
                <h5 class="card-title mb-0">{{ $building->house_desc }}</h5>
            </div>
            <div class="card-body">

                <table class="table">
                    <tbody>
                        <tr>
                            <th width="30%">Unit Number</th>
                            <td>{{ $building->unit_no }}</td>
                        </tr>
                        <tr>
                            <th>Company Code</th>
                            <td>{{ $building->company_code }}</td>
                        </tr>
                        <tr>
                            <th>Unit Category</th>
                            <td>{{ $building->category }}</td>
                        </tr>
                        <tr>
                            <th>Unit status description</th>
                            <td>{{ $building->status }}</td>
                        </tr>
                        <tr>
                            <th>Company Name</th>
                            <td>{{ $building->company }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $building->city }}</td>
                        </tr>
                        <tr>
                            <th>Sector</th>
                            <td>{{ $building->sector }}</td>
                        </tr>
                        <tr>
                            <th>Block</th>
                            <td>{{ $building->block }}</td>
                        </tr>
                        <tr>
                            <th>Plot</th>
                            <td>{{ $building->plot }}</td>
                        </tr>
                        <tr>
                            <th>House Number</th>
                            <td>{{ $building->house_no }}</td>
                        </tr>
                        <tr>
                            <th>Flat</th>
                            <td>{{ $building->flat }}</td>
                        </tr>
                        <tr>
                            <th>Street Name</th>
                            <td>{{ $building->street }}</td>
                        </tr>
                        <tr>
                            <th>Covering Elegibility</th>
                            <td>{{ $building->covering_eligibility }}</td>
                        </tr>
                        <tr>
                            <th>Unit File Number</th>
                            <td>{{ $building->unit_file_no }}</td>
                        </tr>
                        <tr>
                            <th>Land Area</th>
                            <td>{{ number_format($building->land_area) }}</td>
                        </tr>
                        <tr>
                            <th>House Cost</th>
                            <td>{{ number_format($building->house_cost, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Total Cost</th>
                            <td>{{ number_format($building->total_cost, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Market Value</th>
                            <td>{{ number_format($building->market_value, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Received date</th>
                            <td>{{ date('M-d-Y', strtotime($building->received_date)) }}</td>
                        </tr>
                       
                    </tbody>
                </table>
               
                <hr>


            </div>
        </div>
    </div>
    <div class="col-xl-2"></div>
</div>

@endsection