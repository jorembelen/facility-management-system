@extends('layouts.master')

@section('title', 'Job Orders')
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
                                <th>Badge</th>
                                <th>Name</th>
                                <th>Unit Number</th>
                                <th>Job Type</th>
                                <th>Job Category</th>
                                <th>Notes</th>
                                <th>Status</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($jobOrders as $jobOrder)
                                <tr>
                                    <td>{{ $jobOrder->id }}</td>
                                    <td>{{ $jobOrder->occupant->badge }}</td>
                                    <td>{{ $jobOrder->occupant->name }}</td>
                                    <td>
                                        <a href="{{ route('job-orders', $jobOrder->building->id) }}">{{ $jobOrder->building->unit_no }}</a>
                                        </td>
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
                                <td class="text-center">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Click</button>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <a class="dropdown-item" href="{{ route('jobOrders.show', $jobOrder->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                                                Details</a>
                                            <a class="dropdown-item" href="{{ route('jobOrders.edit', $jobOrder->id) }}"><i class="fas fa-fw fa-pencil-alt"></i> Update</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$jobOrder->id}}"><i class="fas fa-fw fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $jobOrders->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection