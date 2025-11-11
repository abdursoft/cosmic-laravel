<!-- hero section  -->
<section class="w-full bg-[#1B0000] text-white min-h-[70%]" data-aos="fade-up" >
    <div class="w-full flex bg-[#1B0000] h-auto lg:h-screen lg:overflow-y-auto text-white flex-col lg:flex-row pb-7 px-3">
        <div class="w-full lg:w-1/2 flex items-center justify-center pl-0 md:pl-6 lg:pl-8">
            <div class="w-full max-w-[700px] md:py-3 px-2 lg:px-5">
                <p class="text-sm lg:text-lg mb-2 mt-10">Where Seduction Meets Intensity</p>
                <h1 class="text-2xl md:text-3xl lg:text-5xl font-[400] mb-6 md:mb-4">Untamed Obsession</h1>
                <p class="mb-6 text-xl lg:text-[24px]">Gilded Vice is more than an experience—it’s your awakening.</p>
                <p class="text-white text-xl lg:text-[24px]">From the whisper of silk against your skin to the
                    intoxicating pull of restraint, every detail draws you into a realm where control and surrender
                    entwine. </p>
                <p class="text-white mt-6 text-xl lg:text-[24px]">Here, your deepest cravings aren’t just
                    imagined—they’re ignited, indulged, and brought vividly to life.</p>
                <div class="mt-3 flex items-center justify-center md:items-start md:justify-start pb-8">
                    <a  href="{{route('service')}}"
                    class="px-6 py-4 mt-10 bg-white text-black rounded hover:bg-slate-200 cursor-pointer transition duration-300 text-[20px] w-full md:w-auto text-center">
                    Claim Your Indulgence
                </a>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 flex flex-col md:flex-row items-start h-auto relative">
            <img src="{{ asset('images/14.png') }}" loading="lazy" alt="Hero Image" class="w-full h-full md:max-h-[775px] lg:min-h-full object-cover object-center">
        </div>
    </div>

    <!-- Demo slider -->
    <h2 class="text-xl md:text-2xl text-center text-red-600 my-6 uppercase px-5">The Worlds Only BDSM Magazine That You Can Hear</h2>
    @include('components.partials.video')

    <!-- Features -->
    <div class="w-full max-w-5xl mx-auto px-2 md:px-6 lg:px-10 my-8">
        <div class="w-full grid gap-5 mx-auto md:grid-cols-2 lg:grid-cols-3 px-2">
            @foreach([
                'The worlds only audio-immersive BDSM magazine',
                'No app required',
                'Hand crafted audio, mixed to perfection',
                'Immersive soundscapes on every page',
                'Stories designed to arouse your senses',
                'Join a private circle of connoisseurs'
            ] as $item)
                <div class="flex items-start gap-2">
                    <svg class="!w-[34px] !h-[34px] text-[#F17916]" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48"><defs><mask id="SVGIQLGgV2F"><g fill="none" stroke-linejoin="round" stroke-width="4"><path fill="#fff" stroke="#fff" d="M24 44a19.94 19.94 0 0 0 14.142-5.858A19.94 19.94 0 0 0 44 24a19.94 19.94 0 0 0-5.858-14.142A19.94 19.94 0 0 0 24 4A19.94 19.94 0 0 0 9.858 9.858A19.94 19.94 0 0 0 4 24a19.94 19.94 0 0 0 5.858 14.142A19.94 19.94 0 0 0 24 44Z"/><path stroke="#000" stroke-linecap="round" d="m16 24l6 6l12-12"/></g></mask></defs><path fill="currentColor" d="M0 0h48v48H0z" mask="url(#SVGIQLGgV2F)"/></svg>
                    <span class="flex-1 text-wrap">{{$item}}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="w-full flex bg-[#1B0000] text-white min-h-screen flex-col lg:flex-row px-3 pt-8 pb-20">
        <div class="w-full lg:w-1/2 flex flex-col md:flex-row items-center justify-center lg:justify-end pr-0 lg:pr-18">
            <img src="{{ asset('images/8.png') }}" alt="Hero Image" class="w-full h-full max-w-[700px] rounded-[25px] shadow-lg " data-aos="fade-up">
        </div>
        <div class="w-full lg:w-1/2 flex items-center justify-center lg:justify-start p-2 md:p-8">
            <div class="w-full md:p-4 max-w-[700px]">
                <h1 class="text-3xl md:text-4xl lg:text-7xl font-md mb-14 text-white">
                    <em>
                        <strong>Step Closer… Until You Can Feel It</strong>
                    </em>
                </h1>
                <p class="text-lg text-white mt-8">The Guided Vice isn’t just something you read… it’s something you
                    inhale. <br>Every page pulls you closer to the intoxicating pulse of control, the exquisite beauty
                    of surrender, and the thrill of watching both collide. </p>
                <p class="text-lg text-white mt-8">Here, fantasies aren’t whispered in the dark—they’re displayed in
                    vivid motion, wrapped in sound, and crafted to make you feel every shiver.</p>
                <p class="text-lg text-white mt-8">This is your front-row seat to desire—unfiltered, undeniable,
                    unforgettable.</p>
            </div>
        </div>
    </div>
</section>
