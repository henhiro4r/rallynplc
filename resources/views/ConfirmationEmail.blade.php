@component('mail::message')
# Hi! {{ $name }}

{{ $mail['message']  }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks you,<br>
7th NPLC Team.
@endcomponent
