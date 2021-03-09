@component('mail::message')
# Welcome to Sadara Facility Operation & Maintenance System

{{-- Please click the link below to proceed to login page. --}}
This is a test. = {{ $tenant->name }}

@component('mail::button', [ 'url' => env('APP_URL').'/login'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
