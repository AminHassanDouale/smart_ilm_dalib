<!-- resources/views/emails/verify-email.blade.php -->
<x-mail::message>
# Verify Your Email Address

Dear {{ $user->name }},

Welcome to Smart-Ilm-Dalib! We're excited to have you join our learning community.

Please verify your email address by clicking the button below:

<x-mail::button :url="$url" color="primary">
Verify Email Address
</x-mail::button>

<x-mail::panel>
This verification link will expire in {{ $expireHours }} hours.
</x-mail::panel>

<x-mail::table>
| Information | Details |
|-------------|---------|
| Email | {{ $user->email }} |
| Role | {{ ucfirst($user->role) }} |
| Registration Date | {{ $user->created_at->format('d-m-Y') }} |
</x-mail::table>

If you're having trouble clicking the button, copy and paste this URL into your browser:
{{ $url }}

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}

<x-mail::subcopy>
If you have any questions, feel free to contact our support team.
</x-mail::subcopy>
</x-mail::message>
