@component('mail::message')
# Application received.

From this email and phone.

{{ $data['email'] }}
{{ $data['contact'] }}


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
