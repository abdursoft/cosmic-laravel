<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme='dark'>

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


    {{-- load jquery script  --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    {{-- load fixed css  --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- custom style cdn  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
        referrerpolicy="no-referrer" />

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    {{-- datatable css  --}}
    <link rel="stylesheet" href="{{ asset('css/data-table.css') }}">

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    {{-- custom style  --}}
    @yield('styles')

</head>

<body class="bg-[#333] flex flex-col md:flex-row">

    {{-- load flash message component --}}
    @include('components.message.flash-message')

    {{-- load body components --}}
    {{-- load sidebar component  --}}
    @include('components.sidebar.admin')

    <div class="flex flex-col md:flex-row w-full max-h-screen overflow-y-auto">

        {{-- load body content  --}}
        <div class="flex-1 flex flex-col w-full">
            {{-- load header component --}}
            @include('components.headers.header')

            {{-- sub header component  --}}
            @include('components.headers.admin')

            {{-- load dynamic contents  --}}
            <div class="w-full p-3 h-auto">
                @yield('content')
            </div>
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
    @stack('scripts')
</body>

</html>
