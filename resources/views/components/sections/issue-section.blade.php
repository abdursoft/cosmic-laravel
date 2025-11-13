<!-- magazine section  -->
<section
    class="w-full flex flex-col items-center justify-center bg-[#1D0501] text-white min-h-[77vh] py-20 px-4 lg:px-20 md:px-10">
    <div class="w-full max-w-[1500px]">
        <div class="mx-auto w-full  flex flex-col gap-4 items-center justify-center">
            <div class="max-w-[700px] lg:min-w-full">
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-3">The First Taste Is Always the Most Dangerouse</h1>
            <p class="text-lg font-lg pb-10">This is the threshold. One look, one sound, and the door to your most
                intoxicating desires swings open. Beyond this point, there’s no turning back.</p>
                </div>
        </div>
        @include('components.sections.item-section')
        <div
            class="flex mt-5 w-full flex-col items-center justify-center lg:flex-row flex-wrap">
            @foreach (magazines() as $key => $magazine)
                <div class="w-full h-[50vh] lg:w-1/2 h-[60vh] md:h-[65vh] lg:h-[75vh] lg:p-3 max-w-[700px] my-2"
                    data-aos="zoom-in">
                    <div class="w-full h-full rounded-[22px] shadow-md h-md bg-white relative" style="background: url('{{Storage::url($magazine->thumbnail)}}') center;background-repeat:no-repeat;background-size:cover; ">
                        <img src="{{ Storage::url($magazine->thumbnail) }}" loading="lazy" alt=""
                            class="w-full h-full rounded-[22px] hidden">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
