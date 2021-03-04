@extends('layouts.master')

@section('title', 'Schedules')
@section('content') 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
                <a class="btn btn-primary float-right" role="button" href="#" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i> Add</a>
               @endif
            </div>
            <div class="card-body">
                <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Work Category</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Slot</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $schedule->category->name }}</td>
                                <td>{{ date('M-d-Y', strtotime($schedule->date)) }}</td>
                                <td>{{ $schedule->time }}</td>
                                <td>{{ $schedule->slot }}</td>
                            {{-- <td class="text-center">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Click</button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <a class="dropdown-item" href="{{ route('schedules.show', $schedule->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                                            Details</a>
                                        <a class="dropdown-item" href="{{ route('schedules.edit', $schedule->id) }}"><i class="fas fa-fw fa-pencil-alt"></i> Update</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$schedule->id}}"><i class="fas fa-fw fa-trash"></i> Delete</a>
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
    </div>
</div>

{{-- @include('schedules.create') --}}
@endsection