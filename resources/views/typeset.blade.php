@extends('layout.app')

@section('title', 'Content Demonstration')

@section('content')
<!-- Hero Section -->
<section class="text-center py-16 px-6">
    <h2 class="text-4xl font-bold mb-2 text-white" data-aos="fade-in">Enter The Guilded Vice Experience</h2>
    <p class="text-lg text-gray-200 mb-6">Where desire meets design — and sound breathes life into story</p>
    <p class="max-w-2xl mx-auto text-gray-200 mb-10 text-lg">
        This is your private preview. Each page blends striking visuals, atmospheric audio, and carefully-built mood — designed to be experienced, not rushed. Move at your own pace. Let the sound settle. Let the scene unfold. Welcome to The Guilded Vice.
    </p>

    <div class="w-full max-w-5xl mx-auto px-2 md:px-4">
        <div class="h-[67vh] md:h-full md:aspect-[16/9] rounded-2xl overflow-hidden shadow-lg">
            <iframe
                src="{{ route('issue.demo') }}?time={{time()}}"
                class="w-full h-full border-0 rounded-2xl"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
                referrerpolicy="strict-origin-when-cross-origin"
            ></iframe>
        </div>
    </div>

</section>

<!-- Why You Can’t Crank Out Content -->
<section class="bg-gray-50 py-20 px-6">
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
        @foreach ([
            ['title' => 'You lack time', 'description' => "Hand selected audio"],
            ['title' => 'You lack design skills', 'description' => "Exclusive access"],
            ['title' => 'You overthink layouts', 'description' => "Private issue released"],
            ['title' => 'You don\'t have tools', 'description' => "Complete immersion"]
            ] as $reason)
            <div class="bg-gray-200 p-6 rounded-2xl shadow hover:shadow-lg transition delay-300" data-aos="fade-up">
                <h4 class="font-bold mb-2 text-lg text-pink-600 text-center hidden">{{ $reason['title'] }}</h4>
                <p class="text-gray-900 text-xl text-center">{{$reason['description']}}</p>
            </div>
        @endforeach
    </div>
</section>

<!-- Features -->
<section class="py-20 px-6">
    <h3 class="text-3xl font-bold text-center mb-12 text-white">Everything You Need in One Place</h3>

    <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
        @for ($i=0; $i < 4; $i++)
            <div class="rounded-2xl shadow hover:shadow-lg transition" data-aos="zoom-in">
                <img src="{{asset('static/images/snapshot'.($i + 1).'.png')}}" alt="guilded vide" class="w-full h-full rounded-2xl">
            </div>
        @endfor
</section>

@endsection

