<section class="w-full bg-[#FBF2DA] text-white py-20 px-4 md:px-5 lg:px-25" id="serviceSection">
    <div class="flex mt-5 w-full md:min-h-[67vh] md:px-10 lg:px-30 flex-col md:flex-row flex-wrap">
        @foreach ($packages as $key => $package)
            <div class="w-full h-full md:w-1/2 lg:w-1/3 relative p-2 my-2" data-aos="zoom-in">
                <div class="text-gray-800 p-3 relative h-[450px] md:h-[550px] rounded-[22px] overflow-hidden">
                    <img src="{{ Storage::url($package->thumbnail) }}" loading="lazy" alt=""
                        class="w-full object-cover absolute top-0 left-0 h-full">
                    <div class="w-full h-full absolute top-0 left-0 z-9 p-3 bg-[rgba(0,0,0,0.7)] text-white">
                        <h2 class="text-2x md:text-3xl mt-4 mb-2">{{ $package->name }} -
                            {{ $package->price }}/{{ substr($package->type, 0, -2) }}</h2>
                        <div class="my-2 w-full description prose max-w-none min-h-[280px]">
                            {!! $package->description !!}
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <a href="{{ route('user.subscribe', $package->id) }}"
                        class="text-center p-3 bg-[gold] text-black rounded-md mt-5 w-full">{{ $package->cta_text }}</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<div class="w-full bg-white py-20 md:px-24">
    <div class="w-full flex flex-col items-center justify-center" data-aos="fade-up">
        <h2 class="text-2xl md:text-4xl font-bold mb-5 text-gray-500">What you claim</h2>
        <img src="{{ asset('images/features.webp') }}" loading="lazy" class="w-full rounded-[10px] max-w-4xl h-[86vh]"
            alt="">
    </div>
</div>
