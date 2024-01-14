@component('mail::message')
# Password Reset OTP

Your OTP for password reset is: {{ $otp }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
