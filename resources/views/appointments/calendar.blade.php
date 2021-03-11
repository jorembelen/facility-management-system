
@extends('layouts.master')

@section('title', 'Calendar')
@section('content') 

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div id="fullcalendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap"></div>
            </div>
        </div>
    </div>
</div>


@include('scripts.calendar')
@endsection