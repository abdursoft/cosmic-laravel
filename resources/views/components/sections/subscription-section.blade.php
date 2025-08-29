<section class="w-full bg-[#FBF2DA] text-white py-20 px-4 md:px-5 lg:px-25" id="serviceSection">
    <div class="flex mt-5 w-full md:min-h-[77vh] md:px-20 lg:px-30 flex-col md:flex-row flex-wrap">
        @foreach($packages as $key=>$package)
            <div class="w-full h-full @if($key < 3) md:w-1/3 h-[469px] @else md:w-1/2 h-[700px] @endif" data-aos="zoom-in">
                <div class="w-full h-full h-md relative text-gray-800 p-3">
                    <img src="{{Storage::url($package->thumbnail)}}" alt="" class="w-full bg-white h-[350px] md:h-[550px] rounded-[22px] object-cover">
                    <h2 class="text-2x md:text-3xl mt-4 mb-2">{{$package->name}} - {{$package->price}}/{{substr($package->type,0,-2)}}</h2>
                    <div class="my-2 w-full description prose max-w-none min-h-[280px]">
                        {!! $package->description !!}
                    </div>
                    <div class="flex items-center justify-center">
                        <a href="{{ route('user.subscribe',$package->id) }}" class="text-center p-3 bg-gray-300 rounded-md mt-5 w-full">Subscribe</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<div class="w-full bg-white py-20 md:px-24">
    <div class="w-full flex flex-col items-center justify-center" data-aos="fade-up">
        <h2 class="text-2xl md:text-4xl font-bold mb-5 text-gray-500">Payable Features</h2>
        <img src="{{asset('images/features.webp')}}" class="w-full rounded-[10px] max-w-4xl h-[86vh]" alt="">
    </div>
</div>
