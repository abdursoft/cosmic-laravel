<!-- user service card section  -->
<div class="w-full flex justify-start flex-col gap-3 md:pt-5 md:pb-10 px-4">
    <div class="w-full rounded-md md:shadow-md flex items-end md:items-center justify-end md:justify-center flex-col h-[40px] md:h-[430px] md:bg-white md:p-3">
        <img src="@php echo !empty(site()->logo) ? Storage::url(site()->logo) : config('app.name') @endphp" class="w-full !h-[350px] rounded-md shadow-lg hidden md:flex" alt="">
        <a href="{{route('auth.logout')}}" class="md:mt-3 bg-red-600 text-white rounded-lg hover:bg-red-400 py-2 px-4">Sign Out</a>
    </div>
</div>

