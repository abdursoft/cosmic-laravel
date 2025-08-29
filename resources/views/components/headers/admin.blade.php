<nav class="p-4 space-y-2 flex items-center justify-center flex-wrap gap-1 lg:hidden">
    <a href="{{ route('auth.dashboard') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200 text-slate-800 {{ request()->routeIs('auth.dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
        Dashboard
    </a>
    <a href="{{ route('admin.package') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.package') ? 'bg-gray-200 font-semibold' : '' }}">
        Packages
    </a>
    <a href="{{ route('admin.issues') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.issues') ? 'bg-gray-200 font-semibold' : '' }}">
        Magazines
    </a>
    <a href="{{ route('admin.transactions') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.transactions') ? 'bg-gray-200 font-semibold' : '' }}">
        Subscriptions
    </a>
    <a href="{{ route('admin.gif-packs') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.gif-packs') ? 'bg-gray-200 font-semibold' : '' }}">
        Gif packages
    </a>
    <a href="{{ route('admin.site-setting') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.site-setting') ? 'bg-gray-200 font-semibold' : '' }}">
        Site settings
    </a>
    <a href="{{ route('admin.contacts') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.contacts') ? 'bg-gray-200 font-semibold' : '' }}">
        Contact message
    </a>
    <a href="{{ route('admin.users') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.users') ? 'bg-gray-200 font-semibold' : '' }}">
        Users management
    </a>
    <a href="{{ route('admin.pages.index') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.pages.index') ? 'bg-gray-200 font-semibold' : '' }}">
        Dynamic Packages
    </a>
    <a href="{{ route('auth.logout') }}"
        class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('settings') ? 'bg-gray-200 font-semibold' : '' }}">
        Sign out
    </a>
</nav>
