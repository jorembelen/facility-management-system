@extends('layouts.master')

@section('title', 'Appointments')
@section('content') 

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ \URL::previous() }}" class="btn btn-secondary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                    <h2 class="text-center">Job Order: {{ $id }}</h2>
                    <p>Job Type:</p>
                    <h3>{{ $jobOrder->job_type }}</h3>
                    <p>Job Category:</p>
                    <h3>{{ $jobOrder->job_category }}</h3>
                    @if ($status != 2)
                        <a class="btn btn-primary" role="button" href="{{ route('appointments.show', $id) }}"><i class="fas fa-plus-circle"></i> Add</a>
                    @else
                        <button class="btn btn-outline-danger">Job Order Closed</button>
                    @endif
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Technian</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->employee->badge }} - {{ $appointment->employee->name }} ({{ $appointment->employee->designation }})</td>
                                    <td>{{ date('M-d-Y', strtotime($appointment->date)) }}</td>
                                    <td>{{ date('h:i a', strtotime($appointment->time)) }}</td>
                                    <td>{{ $appointment->remarks }}</td>
                                {{-- <td class="text-center">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Click</button>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <a class="dropdown-item" href="{{ route('appointments.show', $appointment->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                                                Details</a>
                                            <a class="dropdown-item" href="{{ route('appointments.edit', $appointment->id) }}"><i class="fas fa-fw fa-pencil-alt"></i> Update</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$appointment->id}}"><i class="fas fa-fw fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $appointments->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
            @if ($status != 2)
                <a class="btn btn-secondary float-right" role="button" href="#" data-toggle="modal" data-target="#closed{{ $id }}"><i class="fas fa-times-circle"></i> Close Appointment</a>
            @endif
        </div>
    </div>

            <!-- Delete -->
            <div class="modal fade" id="closed{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleStandardModalLabel"><i class="align-middle mr-2 far fa-fw fa-frown"></i> Close Job Order {{ $id }}</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body m-3">
                        <form class="form-horizontal" method="POST" action="{{ route('appointment.closed', $id) }}">
                            @csrf
                            @method('PUT')
                        <h4 class="mb-0 text-center">Are you sure you want to close this record? If Yes please submit to proceed!</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>

@endsection