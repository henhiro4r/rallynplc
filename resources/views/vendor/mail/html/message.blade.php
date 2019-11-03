@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => '#'])
            <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/7f98014e-7a83-4138-a97a-bbc112df6319/ddjm6lt-6f911d31-4dc4-4125-9f68-c6b0d9fcdf1e.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzdmOTgwMTRlLTdhODMtNDEzOC1hOTdhLWJiYzExMmRmNjMxOVwvZGRqbTZsdC02ZjkxMWQzMS00ZGM0LTQxMjUtOWY2OC1jNmIwZDlmY2RmMWUucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.k5u88i19ji9LAgMnpE744xcxvXhRkOEhzJ9n-ryPMJg" alt="7th NPLC" height="150">
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} 7th NPLC. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
