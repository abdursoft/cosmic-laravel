<!-- gif package section  -->
<section class="w-full bg-[#250c04] text-white py-20 px-4 lg:px-25 2xl:px-45 md:px-10 min-h-[76vh]" id="gifPacks">
    <div class="flex mt-5 w-full flex-col md:flex-row flex-wrap mb-8">

        @foreach ($gif_packs as $gif)
            <div class="w-full md:w-1/2 lg:w-1/3" data-aos="zoom-in">
                <div class="w-full relative overflow-hidden p-3">
                    <img src="{{ Storage::url($gif->thumbnail) }}" loading="lazy" alt=""
                        class="w-full h-70 md:h-85 lg:h-95 object-cover object-center rounded-[22px]">
                    <a href="{{route('user.purchase.gif',$gif->id)}}" class="absolute top-3 right-3 rounded-md bg-red-400 text-white p-2 shadow-md">Download</a>
                    <div class="p-4">
                        <div class="w-full items-center justify-between gap-2 flex">
                            <h2 class="text-lg md:text-xl 2xl:text-2xl mt-2 text-white">{{$gif->title}}</h2>
                            <h2 class="text-lg md:text-xl 2xl:text-2xl mt-2 text-white">${{$gif->price}}</h2>
                        </div>
                        <div class="text-sm text-white mt-2 md:text-lg lg:text-xl prose max-w-none">
                            {!! $gif->description !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <p class="text-base mt-1 md:text-xl">GIFs are more than extras. They’re rare pieces of your Vice collection—bundled, displayed, and owned by those who refuse to settle</p>
</section>
