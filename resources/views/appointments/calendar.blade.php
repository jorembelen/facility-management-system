
@extends('layouts.master')

@section('title', 'Calendar')
@section('content') 

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-dark float-right" role="button" href="/job-orders"><i class="fas fa-list-alt"></i> Job Orders</a>
            </div>
            <div class="card-body">
                <div id="fullcalendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap"></div>
            </div>
        </div>
    </div>
</div>


@include('scripts.calendar')
@endsection


<div id="calendarModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"> </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>