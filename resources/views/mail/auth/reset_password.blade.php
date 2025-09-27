<x-mail::message>
Hello {{ $client->name }}

You are receiving this email because we received a password reset request for your account.
Your password reset code is: <strong>{{ $client->verification_code }}</strong>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
