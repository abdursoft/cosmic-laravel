{{-- subscriptions, packages, issues, contacts card  --}}
<div class="w-full flex justify-start flex-col gap-3 pt-5 pb-10">
    <div class="w-full rounded-md shadow-md flex items-center justify-center flex-col h-[430px] bg-white p-3">
        <img src="{{asset('images/5.png')}}" class="w-full !h-[350px] rounded-md shadow-lg" alt="">
        <a href="{{route('auth.logout')}}" class="mt-3 bg-red-600 text-white rounded-lg hover:bg-red-400 py-2 px-4">Sign Out</a>
    </div>
</div>

