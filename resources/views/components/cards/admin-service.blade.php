{{-- users, earnings, issues, contacts card  --}}
<h1 class="text-xl md:text-4xl text-slate-800 line-clamp-1 font-bold">Overview</h1>
<div class="w-full flex items-center justify-start gap-3 pt-5 pb-10">
    <div class="w-full md:w-1/4 lg:w-1/6 rounded-md shadow-md flex items-center justify-center flex-col h-[130px] bg-white">
        <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $users ?? '0' }}</h3>
        <p class="text-base md:text-xl text-slate-800 line-clamp-1">Users</p>
    </div>
    <div class="w-full md:w-1/4 lg:w-1/6 rounded-md shadow-md flex items-center justify-center flex-col h-[130px] bg-white">
        <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $issues ?? '0' }}</h3>
        <p class="text-base md:text-xl text-slate-800 line-clamp-1">Issues</p>
    </div>
    <div class="w-full md:w-1/4 lg:w-1/6 rounded-md shadow-md flex items-center justify-center flex-col h-[130px] bg-white">
        <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $prices ?? '0' }}</h3>
        <p class="text-base md:text-xl text-slate-800 line-clamp-1">Earnings</p>
    </div>
    <div class="w-full md:w-1/4 lg:w-1/6 rounded-md shadow-md flex items-center justify-center flex-col h-[130px] bg-white">
        <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $contacts ?? '0' }}</h3>
        <p class="text-base md:text-xl text-slate-800 line-clamp-1">Contacts</p>
    </div>
    <div class="w-full md:w-1/4 lg:w-1/6 rounded-md shadow-md flex items-center justify-center flex-col h-[130px] bg-white">
        <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $packages ?? '0' }}</h3>
        <p class="test-sm md:text-base lg:text-xl text-slate-800 line-clamp-1">Packages</p>
    </div>
</div>
