@extends('layouts.master')

@section('title', 'Job Orders')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="javascript:history.back()" class="btn btn-secondary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                    {{-- <h2 class="text-center">Job Order: {{ $id }}</h2> --}}
                    <p>Unit Info:</p>
                    <h3>{{ $building->unit_no }}  ({{ $building->house_desc }})</h3>
                    <p>Occupant Details:</p>
                    <h3>{{ $buildingUser->name }} ({{ $buildingUser->badge }})</h3>
                    <a class="btn btn-primary" role="button" href="{{ route('job-orders.show', $building->id) }}"><i class="fas fa-plus-circle"></i> Add</a>
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Order ID</th>
                                <th>Job Type</th>
                                <th>Job Category</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($jobOrders as $jobOrder)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jobOrder->id }}</td>
                                    <td>{{ $jobOrder->job_type }}</td>
                                    <td>{{ $jobOrder->job_category }}</td>
                                    <td>{{ $jobOrder->notes }}</td>
                                    <td>
                                        @if ($jobOrder->status == 0)
                                        <a href="{{ route('appointments.show', $jobOrder->id) }}"><span class="badge badge-primary">Open</span></a>
                                    @elseif($jobOrder->status == 1)
                                        <a href="{{ route('appointment.view', $jobOrder->id) }}"><span class="badge badge-warning">With Appointment</span></a>
                                    @elseif($jobOrder->status == 2)
                                        <a href="{{ route('appointment.view', $jobOrder->id) }}"><span class="badge badge-danger">Closed</span></a>
                                    @endif
                                    </td>
                                    <td>{{ date('M-d-Y h:i a', strtotime($jobOrder->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection