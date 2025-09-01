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

        {{-- load fixed css  --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        {{-- load overload css  --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!--<link rel="preload" as="style" href="{{config('app.url')}}/build/assets/app-DvcdaRmX.css" />-->
        <!-- <link rel="modulepreload" as="script" href="{{config('app.url')}}/build/assets/app-C0G0cght.js" />-->
        <!-- <link rel="stylesheet" href="{{config('app.url')}}/build/assets/app-DvcdaRmX.css" />-->
        <!-- <script type="module" src="{{config('app.url')}}/build/assets/app-C0G0cght.js"></script>-->

        {{-- custom style  --}}
        @yield('styles')

    </head>
    <body class="bg-[#262323]">
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
                duration: 1700,
            });
        </script>

        {{-- custom scripts --}}
        @yield('scripts')
    </body>
</html>
