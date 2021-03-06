@extends('layouts.master')

@section('title', 'Tenants List')
@section('content') 

<div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary float-right" role="button" href="#" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i> Add</a>
                </div>
                <div class="card-body">
                    
                    <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Badge No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Facilities Info</th>
                                <th>Check In Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($occupants as $occupant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $occupant->badge }}</td>
                                    <td>{{ $occupant->name }}</td>
                                    <td>{{ $occupant->email }}</td>
                                    <td>{{ $occupant->mobile }}</td>
                                    <td>
                                        {{ $occupant->building->id }} - {{ $occupant->building->description }}
                                    </td>
                                    <td>{{ date('M-d-Y', strtotime($occupant->occupancy->issued_date)) }}</td>
                                    <td>
                                        @if ($tenant->count() > 0)
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to Check Out" href="{{ route('checkout.view', $occupant->id) }}"><span class="badge badge-success">Check Out</span></a>
                                        @else
                                            <span class="badge badge-danger">Check In</span>
                                        @endif
                                    </td>
                         
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($occupants as $occupant) 

        <!-- Delete -->
        <div class="modal fade" id="delete{{ $occupant->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="exampleStandardModalLabel"><i class="align-middle mr-2 far fa-fw fa-frown"></i> Delete this record?</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body m-3">
                    <form class="form-horizontal" method="POST" action="{{ route('occupants.destroy', $occupant->id) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                    <h5 class="mb-0 text-center">If you delete the data it will be gone forever. Are you sure you want to proceed?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Delete</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
                </div>
              </div>
            </div>
          </div>
@endforeach

@include('occupants.create')
@endsection