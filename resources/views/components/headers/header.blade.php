<header class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 shadow-md">
    <div class="flex items-center">
        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-900 dark:text-white">
            <img class="w-[80px] h-[60px]" src="@php echo !empty(site()->logo) ? Storage::url(site()->logo) : config('app.name') @endphp" alt="">
        </a>
    </div>
    <nav class="flex space-x-4">
        <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Home</a>
        <a href="{{ route('service') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Services</a>
        @if(auth()->check())
            <a href="{{ route('auth.dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Login</a>
            <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Register</a>
        @endif
        <a href="{{ route('contact') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Contact</a>
    </nav>
</header>
