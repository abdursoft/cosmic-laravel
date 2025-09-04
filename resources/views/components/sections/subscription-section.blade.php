<!-- subscription section  -->
<section class="w-full bg-[#250c04] text-white py-20 px-4 lg:px-20 2xl:px-45 md:px-10 min-h-screen h-auto" id="serviceSection">
    <div class="flex mt-5 w-full flex-col md:flex-row justify-center flex-wrap mb-8 h-auto">
        @foreach ($packages as $key => $package)
            <div class="text-gray-800 rounded-[22px] flex flex-col p-5 w-full md:w-1/3" data-aos="fade-up">
                <img src="{{ Storage::url($package->thumbnail) }}" loading="lazy" alt=""
                    class="w-full h-70 md:h-85 lg:h-95 object-cover object-center rounded-[22px]">
                <div class="w-full text-black flex-1">
                    <h2 class="text-xl md:text-2xl 2xl:text-3xl mt-4 mb-2 text-white">
                        {{ $package->name }} - {{ $package->price }}/{{ substr($package->type, 0, -2) }}
                    </h2>
                    <div class="my-2 w-full text-white description prose max-w-none">
                        {!! $package->description !!}
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <a href="{{ route('user.subscribe', $package->id) }}"
                        class="text-center p-3 bg-[gold] text-black rounded-md mt-5 w-full">
                        {{ $package->cta_text }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<div class="w-full bg-white py-20 md:px-24">
    <div class="w-full flex flex-col items-center justify-center" data-aos="fade-up">
        <h2 class="text-2xl md:text-4xl font-bold mb-5 text-gray-500">What you claim</h2>
        <img src="{{ asset('images/features.webp') }}" loading="lazy" class="w-full rounded-[10px] max-w-4xl"
            alt="">
    </div>
</div>
