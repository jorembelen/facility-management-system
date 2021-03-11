@component('mail::message')
# Welcome to your new home {{ $tenant->name }}.

Please click the button below to proceed to SADARA Housing login page. <br>
 Email: {{ $tenant->email }} <br>
 Default password: Sadara2021

@component('mail::button', [ 'url' => route('login')])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }} Admin
@endcomponent
