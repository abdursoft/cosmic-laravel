    <!-- header section  -->
    <div class="w-full flex text-white items-center justify-center bg-[#100f0f] ">
        <header class="flex items-center justify-between p-3 shadow-md w-full md:max-w-[85%]">
            <div class="flex items-center justify-start gap-5">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-900 dark:text-white">
                        <img class="w-[80px] h-[60px]"
                            src="@php echo !empty(site()->logo) ? Storage::url(site()->logo) : config('app.name') @endphp"
                            alt="">
                    </a>
                </div>
                <nav class="flex space-x-4">
                    <a href="{{ route('home') }}"
                        class="text-white hover:text-gray-600 dark:hover:text-white hidden md:block">The
                        Guilded Vice</a>
                    <a href="{{ route('service') }}"
                        class="text-white hover:text-gray-600 dark:hover:text-white">Pricing</a>
                </nav>
            </div>
            <nav class="flex space-x-4 items-center">
                @if (auth()->check())
                    <a href="{{ route('auth.dashboard') }}"
                        class="text-white hover:text-gray-600 dark:hover:text-white">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white hover:text-gray-600 dark:hover:text-white">Login</a>
                @endif
                <a href="{{ route('contact') }}"
                    class="text-gray-200 bg-gray-500 rounded-md hover:text-slate-800 hover:bg-gray-200 transition-all delay-100 py-2 px-3 hidden md:block">Contact
                    The Guild</a>
                <a href="{{ route('contact') }}"
                    class="text-gray-200 bg-gray-500 rounded-md hover:text-slate-800 hover:bg-gray-200 transition-all delay-100 py-2 px-3 md:hidden">Contact</a>
            </nav>
        </header>
    </div>
