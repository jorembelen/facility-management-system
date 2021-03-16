@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <h4>Welcome to Sadara Facility Operation & Maintenance System!</h4>
                   <p>Before getting started, please verify your email address by clicking the link below. If you didn't receive any email, we will gladly send you another.</p>,
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary align-baseline">{{ __('CLICK TO RECEIVE EMAIL') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
