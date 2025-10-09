<!-- user magazine section  -->
<section class="w-full text-white md:px-5 min-h-screen h-auto">
    <div class="flex mt-5 w-full flex-row flex-wrap mb-8 h-auto">
        @if ($subscription->userMagazine)
            @foreach ($subscription->userMagazine as $mag)
            @php $magazine = $mag->magazine; @endphp
                <div
                    class="flex flex-col relative h-70 md:h-85 lg:h-95 w-1/2 lg:1/3 xl:w-1/4 my-2 overflow-hidden p-1 md:p-3">
                    <div class="w-full h-full shadow-md text-gray-800 rounded-[22px] relative overflow-hidden">
                        <img src="{{ Storage::url($magazine->thumbnail) }}" loading="lazy" alt=""
                        class="absolute w-full h-full">

                        <div class="w-full text-white bg-[rgba(0,0,0,0.7)] absolute z-2 top-0 text-center">
                            <h2 class="text-xl md:text-2xl mt-4 mb-2 line-clamp-1">
                                {{ $magazine->title }}
                            </h2>
                        </div>

                        <div class="w-full text-black absolute z-2 bottom-5 text-center">
                            <a href="{{ route('user.magazine.view', $magazine->id) }}"
                                class="text-center px-3 py-2 bg-[gold] text-black rounded-md w-[120px]">
                                See Issues
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
