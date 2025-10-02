<!-- user header section  -->
<nav class="w-full p-4 space-y-2 flex items-start md:items-center justify-start md:justify-center gap-2">
    <a href="{{ route('user.subscriptions') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200 line-clamp-1  text-slate-800 {{ request()->routeIs('user.subscriptions') ? 'bg-gray-200 font-semibold' : '' }} bg-white mb-0">
        Subscriptions
    </a>
    <a href="{{ route('user.gif-packs') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200 line-clamp-1  text-slate-800 {{ request()->routeIs('user.gif-packs') ? 'bg-gray-200 font-semibold' : '' }} bg-white mb-0">
        Gif Packages
    </a>
    <a href="{{ route('user.magazine') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200 line-clamp-1  text-slate-800 {{ request()->routeIs('user.subscriptions') ? 'bg-gray-200 font-semibold' : '' }} bg-white mb-0">
        Magazines
    </a>
    <a href="{{route('auth.logout')}}" class="bg-red-600 text-white rounded-lg hover:bg-red-400 py-2 px-4">Sign Out</a>
</nav>
