<!-- admin service cards  -->
<h1 class="text-xl md:text-4xl text-slate-800 line-clamp-1 font-bold">Overview</h1>
<div class="w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 pt-5 pb-10">
    <div class="w-full p-2" data-aos="zoom-in">
        <div class="rounded-md shadow-md flex items-center justify-center flex-col bg-white  min-h-[130px]">
            <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $users ?? '0' }}</h3>
            <p class="text-base md:text-xl text-slate-800 line-clamp-1">Users</p>
        </div>
    </div>
    <div class="w-full  p-2" data-aos="zoom-in">
        <div class="rounded-md shadow-md flex items-center justify-center flex-col bg-white  min-h-[130px]">
            <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $packages ?? '0' }}</h3>
            <p class="test-sm md:text-base lg:text-xl text-slate-800 line-clamp-1">Packages</p>
        </div>
    </div>
    <div class="w-full  p-2" data-aos="zoom-in">
        <div class="rounded-md shadow-md flex items-center justify-center flex-col bg-white  min-h-[130px]">
            <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $magazines ?? '0' }}</h3>
            <p class="text-base md:text-xl text-slate-800 line-clamp-1">Magazines</p>
        </div>
    </div>
    <div class="w-full  p-2" data-aos="zoom-in">
        <div class="rounded-md shadow-md flex items-center justify-center flex-col bg-white  min-h-[130px]">
            <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $issues ?? '0' }}</h3>
            <p class="text-base md:text-xl text-slate-800 line-clamp-1">Issues</p>
        </div>
    </div>
    <div class="w-full  p-2" data-aos="zoom-in">
        <div class="rounded-md shadow-md flex items-center justify-center flex-col bg-white  min-h-[130px]">
            <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $gif_packages ?? '0' }}</h3>
            <p class="test-sm md:text-base lg:text-xl text-slate-800 line-clamp-1">Gif Packages</p>
        </div>
    </div>
    <div class="w-full  p-2" data-aos="zoom-in">
        <div class="rounded-md shadow-md flex items-center justify-center flex-col bg-white  min-h-[130px]">
            <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">${{ $prices ?? '0' }}</h3>
            <p class="text-base md:text-xl text-slate-800 line-clamp-1">Earnings</p>
        </div>
    </div>
    <div class="w-full  p-2" data-aos="zoom-in">
        <div class="rounded-md shadow-md flex items-center justify-center flex-col bg-white  min-h-[130px]">
            <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $packages ?? '0' }}</h3>
            <p class="test-sm md:text-base lg:text-xl text-slate-800 line-clamp-1">Tiers request</p>
        </div>
    </div>
    <div class="w-full  p-2" data-aos="zoom-in">
        <div class="rounded-md shadow-md flex items-center justify-center flex-col bg-white  min-h-[130px]">
            <h3 class="text-xl md:text-2xl md:font-bold text-slate-800 line-clamp-1">{{ $contacts ?? '0' }}</h3>
            <p class="text-base md:text-xl text-slate-800 line-clamp-1">Contacts</p>
        </div>
    </div>
</div>
