<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        {{-- load meta tags  --}}
        @yield('meta')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- custom style cdn  --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" referrerpolicy="no-referrer" />

        {{-- load overload css  --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        {{-- custom style  --}}
        @yield('styles')

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#fdfdfc]">
        {{-- load header component --}}
        @include('components.headers.header')

        {{-- load flash message component --}}
        @include('components.message.flash-message')

        {{-- load body components --}}
        <div class="flex flex-col items-center justify-center w-full">
            <div class="w-full">
                @yield('content')
            </div>
        </div>

        {{-- load footer component --}}
        @include('components.footers.footer')

        {{-- aos script  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" referrerpolicy="no-referrer"></script>
        <script>
            AOS.init({
                duration: 1000,
            });
        </script>

        {{-- custom scripts --}}
        @yield('scripts')
    </body>
</html>
