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

        {{-- load fixed css  --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        {{-- custom style cdn  --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" referrerpolicy="no-referrer" />

        {{-- custom style  --}}
        @yield('styles')

    </head>
    <body class="bg-[#FDFDFC] flex flex-col md:flex-row">

        {{-- load flash message component --}}
        @include('components.message.flash-message')

        {{-- load body components --}}
        {{-- load sidebar component  --}}
        @include('components.sidebar.admin')

        <div class="flex flex-col md:flex-row w-full max-h-screen overflow-y-auto">

            {{-- load body content  --}}
            <div class="flex-1 flex flex-col w-full bg-[#ddd]">
                {{-- load header component --}}
                @include('components.headers.header')

                {{-- sub header component  --}}
                @include('components.headers.admin')

                {{-- load dynamic contents  --}}
                <div class="w-full p-3">
                    @yield('content')
                </div>

                {{-- load footer component --}}
                @include('components.footers.footer')
            </div>
        </div>


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
