<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    {{-- load meta tags  --}}
    @yield('meta')

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- add page flip js  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/turn.min.js') }}"></script>

    {{-- add howler js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.4/howler.min.js"></script>


</head>

<body class="bg-[#0B0C10] text-white flex items-center justify-center min-h-screen">

    {{-- load body components --}}

    {{-- load dynamic contents  --}}
    <div class="w-full p-3">
        @yield('content')
    </div>

    {{-- custom scripts --}}
    @yield('scripts')
</body>

</html>
