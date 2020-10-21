@component('mail::message')

## Welcome  {{$user->name}} to our team
### You are registerd using email : {{$user->email}} as {{$user->role}}<br>
and your password : {{$pw}}
## we hope you enjoy with us.
    @component('mail::button', ['url' => config('app.url').'/login'])
    login 
    @endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
