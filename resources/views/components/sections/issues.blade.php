<!-- user magazine section  -->
<section class="w-full text-white px-5 min-h-screen h-auto">
    <div class="flex flex-col md:flex-row mt-5 w-full mb-8 h-auto gap-2 justify-center md:justify-start">

        @foreach($magazines->issues as $issue)
            <div
        class="text-gray-800 rounded-[22px] flex flex-col relative h-70 md:h-85 lg:h-95 w-full md:w-1/2 lg:1/3 shadow-md overflow-hidden">
                <img src="{{ Storage::url($issue->thumbnail) }}" loading="lazy" alt=""
                    class="absolute w-full h-full">

                <div class="w-full text-white bg-[rgba(0,0,0,0.7)] absolute z-2 top-0 text-center">
                    <h2 class="text-xl md:text-2xl mt-4 mb-2 line-clamp-1">
                        {{ $issue->title }}
                    </h2>
                </div>

                <div class="w-full text-black absolute z-2 bottom-5 text-center">
                    <a href="{{ route('user.magazine.read', $issue->id) }}"
                        class="text-center px-3 py-2 bg-[gold] text-black rounded-md w-[120px]">
                        Read Issue
                    </a>
                </div>
            </div>
        @endforeach

    </div>
</section>
