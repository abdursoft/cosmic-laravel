{{-- admin sidebar component  --}}
<div class="hidden lg:flex h-screen bg-gray-100 lg:w-[260px] !text-sm overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg fixed h-full relative overflow-y-auto">
        <div class="p-4 text-xl font-bold text-gray-800 border-b-[0.6px] border-gray-400">
            Cosmic
        </div>
        <nav class="p-4 space-y-2">
            <a href="{{ route('auth.dashboard') }}"
                class="block px-4 py-2 rounded hover:bg-gray-200 text-slate-800 {{ request()->routeIs('auth.dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.package') }}"
                class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.package') ? 'bg-gray-200 font-semibold' : '' }}">
                Packages
            </a>
            <a href="{{ route('admin.magazine') }}"
                class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.magazine') ? 'bg-gray-200 font-semibold' : '' }}">
                Magazines
            </a>
            <a href="{{ route('admin.issues') }}"
                class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.issues') ? 'bg-gray-200 font-semibold' : '' }}">
                Issues
            </a>
            <a href="{{ route('admin.transactions') }}"
                class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.transactions') ? 'bg-gray-200 font-semibold' : '' }}">
                Subscriptions
            </a>
            <a href="{{ route('admin.subscribe.tiers') }}"
                class="block px-4 py-2 rounded hover:bg-gray-200  text-slate-800 {{ request()->routeIs('admin.subscribe.tiers') ? 'bg-gray-200 font-semibold' : '' }}">
                Tiers
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
                Dynamic Pages
            </a>
        </nav>
        <div class="p-3 text-center w-full bottom-0 left-0 absolute border-t-2 border-gray-200">
            <a href="{{ route('auth.logout') }}"
                class="block px-4 py-2 rounded hover:bg-gray-200 bg-gray-400  text-slate-800">
                Sign out
            </a>
        </div>
    </aside>
</div>
