@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', [ 'url' => route('login')])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
