    <!-- header section  -->
    <div class="w-full flex text-white items-start md:items-center justify-start md:justify-center bg-[#100f0f] ">
        <header class="flex items-center justify-between p-3 shadow-md w-full lg:max-w-[95%]">
            <div class="flex items-center justify-start gap-5">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-900 dark:text-white">
                        <img class="w-[80px] h-[60px]"
                            src="@php echo !empty(site()->logo) ? Storage::url(site()->logo) : config('app.name') @endphp"
                            alt="">
                    </a>
                </div>
                <nav class="hidden md:flex space-x-4">
                    <a href="{{ route('home') }}"
                        class="text-white hover:text-gray-600 dark:hover:text-white hidden md:block">The
                        Guilded Vice</a>
                    <a href="{{ route('service') }}"
                        class="text-white hover:text-gray-600 dark:hover:text-white">Pricing</a>
                    <a href="{{ route('demonstration') }}"
                        class="text-white hover:text-gray-600 dark:hover:text-white">Demonstration</a>
                </nav>
            </div>
            <nav class="hidden md:flex space-x-4 items-center">
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
            {{-- mobile menu  --}}
            <button class="md:hidden text-white bg-slate-800 rounded-md p-4 cursor-pointer hover:bg-slate-500 transition" id="menuBTN">
                <svg class="openMenu" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M5 5L12 12L19 5M12 12H12M5 19L12 12L19 19">
                        <animate fill="freeze" attributeName="d" dur="0.4s"
                            values="M5 5L12 12L19 5M12 12H12M5 19L12 12L19 19;M5 5L12 5L19 5M5 12H19M5 19L12 19L19 19" />
                    </path>
                </svg>
                <svg class="closeMenu hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M5 5L12 5L19 5M5 12H19M5 19L12 19L19 19">
                        <animate fill="freeze" attributeName="d" dur="0.4s"
                            values="M5 5L12 5L19 5M5 12H19M5 19L12 19L19 19;M5 5L12 12L19 5M12 12H12M5 19L12 12L19 19" />
                    </path>
                </svg>
            </button>
        </header>

        {{-- mobile nav  --}}
        <nav id="mobileNav"
            class="fixed top-0 left-0 w-[80vw] h-full flex flex-col items-start p-6 bg-slate-800 rounded-br-2xl shadow-lg transform -translate-x-full transition-transform duration-500 ease-in-out z-50">
            <a href="{{ route('home') }}" class="text-white hover:text-gray-400 py-2">The Guilded Vice</a>
            <a href="{{ route('service') }}" class="text-white hover:text-gray-400 py-2">Pricing</a>
            <a href="{{ route('demonstration') }}" class="text-white hover:text-gray-400 py-2">Demonstration</a>

            @if (auth()->check())
                <a href="{{ route('auth.dashboard') }}" class="text-white hover:text-gray-400 py-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-white hover:text-gray-400 py-2">Login</a>
            @endif

            <a href="{{ route('contact') }}"
                class="text-gray-200 bg-gray-500 rounded-md hover:text-slate-800 hover:bg-gray-200 transition-all delay-100 py-2 px-3 mt-4">Contact</a>
        </nav>

    </div>


<script>
    const openMenu = document.querySelector('.openMenu');
    const closeMenu = document.querySelector('.closeMenu');
    const mobileNav = document.querySelector('#mobileNav');
    const toggleBtn = document.querySelector('#menuBTN');

    toggleBtn.addEventListener('click', () => {
        const isOpen = !mobileNav.classList.contains('-translate-x-full');
        if (isOpen) {
            // Close menu
            mobileNav.classList.add('-translate-x-full');
            openMenu.classList.remove('hidden');
            closeMenu.classList.add('hidden');
        } else {
            // Open menu
            mobileNav.classList.remove('-translate-x-full');
            openMenu.classList.add('hidden');
            closeMenu.classList.remove('hidden');
        }
    });

    // Hide when clicking outside
    document.addEventListener('click', (e) => {
        const isClickInside = mobileNav.contains(e.target) || toggleBtn.contains(e.target);

        if (!isClickInside && !mobileNav.classList.contains('-translate-x-full')) {
            mobileNav.classList.add('-translate-x-full');
            openMenu.classList.remove('hidden');
            closeMenu.classList.add('hidden');
        }
    });
</script>
