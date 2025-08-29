<section class="w-full bg-[#1D0501] text-white min-h-[77vh] py-20 px-4 md:px-5 lg:px-25">
    <div class="mx-auto w-full  flex flex-col gap-4">
        <h1 class="text-2xl md:text-4xl font-bold mb-4">The First Taste Is Always the Most Dangerouse</h1>
        <p class="text-lg font-lg">This is the threshold. One look, one sound, and the door to your most intoxicating desires swings open. Beyond this point, there’s no turning back.</p>
    </div>
    <div class="flex mt-5 w-full flex-col md:flex-row flex-wrap">
        @foreach($issues as $key=>$issue)
            <div class="w-full h-[330px] @if($key < 3) md:w-1/3 md:h-[469px] @else md:w-1/2 md:h-[700px] @endif p-3" data-aos="zoom-in">
                <div class="w-full h-full rounded-[22px] shadow-md h-md bg-white relative">
                    <img src="{{Storage::url($issue->thumbnail)}}" alt="" class="w-full h-full rounded-[22px]">
                    <div class="w-full h-full absolute rounded-md top-0 left-0 items-center flex justify-center flex-col group hover:bg-[rgba(105,192,140,0.5)] transform transition duration-30">
                        <a href="{{route('issue.read',$issue->id)}}" class="bg-red-400 md:bg-gray-600 md:hidden text-white rounded-lg cursor-pointer mb-4 px-3 py-2 group-hover:flex absolute top-3 right-2 md:relative md:top-0 md:right-0">Read Issue</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
