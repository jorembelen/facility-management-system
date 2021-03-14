@extends('layouts.master')

@section('title', 'Maintenance')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
       @include('maintenance.schedules.search')
       {{-- <button class="btn btn-primary float-right" role="button" href="#" data-toggle="modal" data-target="#delete" {{ (!is_null('start_date') && !empty('start_date')) ? '' : 'disabled' }}><i class="fas fa-plus-circle"></i> Delete</button> --}}
       @if ($schedules->count() > 0 && !empty(request('start_date')))
       <button class="btn btn-primary float-right" role="button" href="#" data-toggle="modal" data-target="#delete"><i class="fas fa-plus-circle"></i> Delete</button>
       @else
       <button class="btn btn-primary float-right" role="button" href="#" data-toggle="modal" data-target="#delete" disabled><i class="fas fa-plus-circle"></i> Delete</button>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
   

<!-- Cancel Appointment -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleStandardModalLabel"><i class="align-middle mr-2 far fa-fw fa-frown" style="color:red"></i> Delete Selected Schedules?</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body m-3">
            <form action="{{ route('remove.schedule') }}" method="post">
                @csrf
                <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                <h5 class="mb-0 text-center">You are about to delete schedules from {{ date('M-d', strtotime(request('start_date'))) }} to {{ date('M-d-Y', strtotime(request('end_date'))) }}.</h5><br>
                <h4 class="mb-0 text-center">If you are sure, please click Yes to proceed.</h4>
                
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection