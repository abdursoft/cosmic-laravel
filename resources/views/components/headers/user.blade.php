<nav class="p-4 space-y-2 flex items-center justify-center gap-2">
    <a href="{{ route('user.subscriptions') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('user.subscriptions') ? 'bg-gray-200 font-semibold' : '' }} bg-white mb-0">
        Subscriptions
    </a>
    <a href="{{ route('user.gif-packs') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('user.gif-packs') ? 'bg-gray-200 font-semibold' : '' }} bg-white mb-0">
        Gif Packages
    </a>
</nav>
