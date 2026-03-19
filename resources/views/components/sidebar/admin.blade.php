{{-- admin sidebar component  --}}
<div class="hidden lg:flex h-screen bg-zinc-900 lg:w-[260px] !text-sm overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 shadow-lg fixed h-full relative overflow-y-auto">
        <div class="p-4 text-xl font-bold text-gray-100 border-b-[0.6px] border-gray-400">
            Cosmic
        </div>
        <nav class="py-4 space-y-2">
            <a href="{{ route('auth.dashboard') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800 text-gray-200 hover:text-gray-200 {{ request()->routeIs('auth.dashboard') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.package') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.package') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Packages
            </a>
            <a href="{{ route('admin.magazine') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.magazine') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Magazines
            </a>
            <a href="{{ route('admin.issues') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.issues') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Issues
            </a>
            <a href="{{ route('admin.transactions') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.transactions') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Subscriptions
            </a>
            <a href="{{ route('admin.subscribe.tiers') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.subscribe.tiers') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Tiers
            </a>
            <a href="{{ route('admin.gif-packs') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.gif-packs') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Gif packages
            </a>
            <a href="{{ route('admin.site-setting') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.site-setting') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Site settings
            </a>
            <a href="{{ route('admin.contacts') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.contacts') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Contact message
            </a>
            <a href="{{ route('admin.users') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.users') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Users management
            </a>
            <a href="{{ route('admin.pages.index') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800  text-gray-200 hover:text-gray-200 {{ request()->routeIs('admin.pages.index') ? 'bg-slate-600 text-gray-100 font-semibold border-l-4 border-green-500' : '' }}">
                Dynamic Pages
            </a>
        </nav>
        <div class="p-3 text-center w-full bottom-0 left-0 absolute border-t-2 border-gray-200">
            <a href="{{ route('auth.logout') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800 bg-slate-700 text-gray-200 hover:text-gray-200">
                Sign out
            </a>
            <p class="text-sm text-center text-gray-200 mt-2">Version 1.0</p>
        </div>
    </aside>
</div>
