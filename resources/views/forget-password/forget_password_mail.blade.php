@component('mail::message')

Hello {{$user_name}}

The body of your message.

@component('mail::button', ['url' => route('getResetPassword', $token)])
Click to reset your password
@endcomponent
<p>Or copy $ paste the following link to your browser</p>
<p><a href="{{route('getResetPassword',$token)}}">
{{route('getResetPassword',$token)}}</a></p>

Thanks,<br>
{{ config('app.name') }}

@endcomponent
