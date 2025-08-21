<section class="w-full bg-[#BFC1B5] text-white min-h-[45vh] py-20 px-4 md:px-45">
    <div class="flex mt-5 w-full flex-col md:flex-row flex-wrap">
        @foreach($packages as $key=>$package)
            <div class="w-full h-[330px] my-5 @if($key < 3) md:w-1/3 md:h-[469px] @else md:w-1/2 md:h-[700px] @endif p-3">
                <div class="w-full h-full rounded-[22px] shadow-md h-md bg-white relative">
                    <img src="{{Storage::url($package->thumbnail)}}" alt="" class="w-full h-full rounded-[22px]">
                    <h2 class="text-2xl md:text-3xl mt-2">{{$package->name}}</h2>
                </div>
            </div>
        @endforeach
    </div>
</section>
