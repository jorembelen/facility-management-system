@extends('layouts.master')

@section('title', 'Details')
@section('content') 

<div class="row">
        <div class="col-lg-6 col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-action float-right">
                        <div class="dropdown show">
                            <a href="javascript:history.back()" class="btn btn-secondary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                        </div>
                    </div>
                    <h3 class="card-title mb-0">Occupancy Details:</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-0">Tenant Info:</h5><br>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Badge Number:</dt>
                        <h5>{{ $appointment->client->badge }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Name:</dt>
                        <h5>{{ $appointment->client->name }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Email:</dt>
                        <h5>{{ $appointment->client->email }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Mobile:</dt>
                        <h5>{{ $appointment->client->mobile }}</h5>
                    </dl>
                    
                    <hr>
                    <h5 class="card-title mb-0">Facilities Info:</h5><br>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Location:</dt>
                        <h5>
                            {{ $appointment->building->rc_no }} {{ $appointment->building->ifc_no }} {{ $appointment->building->flat_no }}
                            {{ $appointment->building->villa_no }} {{ $appointment->building->lot_no }} {{ $appointment->building->block_no }} 
                            {{ $appointment->building->street }} 
                        </h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Description:</dt>
                        <h5>{{ $appointment->building->description }}</h5>
                    </dl>
                    
    
                </div>
            </div>
    
        </div>
      {{-- For Chat --}}
      <div class="col-lg-5 col-xxl-5">
        <div class="card">
        <div class="card-header">
            <h3>Chat with us
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square align-middle mr-2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            </h3></div>
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-12 col-lg-12 col-xl-12">

                    <div class="position-relative">
                        <div class="chat-messages p-4">

                            @foreach ($chats as $chat)
                            <div class="chat-message-left pb-4">
                                <div>
                                    <img src="https://www.gravatar.com/avatar/'{{ $chat->user->email }}" class="rounded-circle mr-1" alt="{{ $chat->user->name }}" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">{{ date('M-d-Y', strtotime($chat->created_at)) }}</div>
                                    <div class="text-muted small text-nowrap">{{ $chat->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-5">
                                    <div class="font-weight-bold mb-1">{{ $chat->user->name }}</div>
                                    {{$chat->message}}
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="flex-grow-0 py-3 px-4 border-top">
                        <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('chats.store') }}" id="chat-create">
                            @csrf
                        <div class="input-group">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="client_appointment_id" value="{{ $appointment->id }}">
                            <input type="text" name="message" class="form-control" placeholder="Type your message" required>
                            <div class="input-group-append ml-1">
                                <button class="btn btn-primary">Send</button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
</div>
{{-- End Chat --}}
</div>

@endsection