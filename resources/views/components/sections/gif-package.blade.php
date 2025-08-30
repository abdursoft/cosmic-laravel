<section class="w-full bg-[#BFC1B5] text-white py-20 px-4 md:px-10 lg:px-20 min-h-[76vh]" id="gifPacks">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach ($gif_packs as $gif)
            <div class="p-3" data-aos="zoom-in">
                <div class="w-full rounded-[22px] shadow-md bg-white relative overflow-hidden">
                    <img src="{{ Storage::url($gif->thumbnail) }}" loading="lazy" alt=""
                        class="w-full h-60 md:h-75 lg:h-80 object-cover rounded-[22px]">
                    <a href="{{route('user.purchase.gif',$gif->id)}}" class="absolute top-3 right-3 rounded-md bg-red-400 text-white p-2 shadow-md">Download</a>
                    <div class="p-4">
                        <div class="w-full flex items-center justify-between gap-2">
                            <h2 class="text-2xl md:text-3xl mt-2 text-black">{{$gif->title}}</h2>
                            <h2 class="text-2xl md:text-3xl mt-2 text-black">${{$gif->price}}</h2>
                        </div>
                        <div class="text-sm text-gray-800 mt-2 md:text-lg lg:text-xl prose max-w-none">
                            {!! $gif->description !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="h3 text-xl md:text-3xl mt-15">Beneath All Three Boxes</div>
    <p class="text-base mt-1 md:text-xl">“GIFs are more than extras. They’re rare pieces of your Vice collection—bundled, displayed, and owned by those who refuse to settle.”</p>
</section>
