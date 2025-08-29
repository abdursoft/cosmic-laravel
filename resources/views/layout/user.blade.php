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
    <!--<link rel="preload" as="style" href="{{config('app.url')}}/build/assets/app-DvcdaRmX.css" />-->
    <!-- <link rel="modulepreload" as="script" href="{{config('app.url')}}/build/assets/app-C0G0cght.js" />-->
    <!-- <link rel="stylesheet" href="{{config('app.url')}}/build/assets/app-DvcdaRmX.css" />-->
    <!-- <script type="module" src="{{config('app.url')}}/build/assets/app-C0G0cght.js"></script>-->

    {{-- custom style cdn  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" referrerpolicy="no-referrer" />

    {{-- custom style  --}}
    @yield('styles')

</head>

<body class="bg-[#ddd]">

    {{-- load flash message component --}}
    @include('components.message.flash-message')

    {{-- load header component --}}
    @include('components.headers.header')

    {{-- load body components --}}
    <div class="flex justify-center w-full min-h-[84vh]">
        <div class="w-full flex flex-col md:flex-row p-3 max-w-[1550px]">
            <div class="w-full md:w-1/4 lg:w-1/5">
                {{-- load user nav bar  --}}
                @include('components.headers.user')
                {{-- load overview card component  --}}
                @include('components.cards.user-service')
            </div>

            {{-- load body content  --}}
            <div class="w-full md:w-3/4 lg:w-4/5 rounded-md">

                {{-- load dynamic contents  --}}
                <div class="w-full p-3">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    {{-- load footer component --}}
    @include('components.footers.footer')


    {{-- aos script  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" referrerpolicy="no-referrer"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>

    {{-- custom scripts --}}
    @yield('scripts')
</body>

</html>
