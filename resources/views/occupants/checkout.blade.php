@extends('layouts.master')

@section('title', 'Check Out History')
@section('content') 

<div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
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
                                <th>Check Out Date</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($checkout as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tenant->badge }}</td>
                                    <td>{{ $item->tenant->name }}</td>
                                    <td>{{ $item->tenant->email }}</td>
                                    <td>{{ $item->tenant->mobile }}</td>
                                    <td>
                                        {{ $item->building->id }} - {{ $item->building->description }}
                                    </td>
                                    <td>{{ date('M-d-Y', strtotime($item->checkin_date)) }}</td>
                                    <td>{{ date('M-d-Y', strtotime($item->released_date)) }}</td>
                         
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection