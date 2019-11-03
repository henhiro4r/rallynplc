@component('mail::message')
# Hi! {{ $name }}

{{ $mail['message']  }}

@component('mail::button', ['url' => 'https://fusionsvisual.com'])
Confirm
@endcomponent

Regards,<br>
7th NPLC Team.
@endcomponent
