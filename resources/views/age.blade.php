@extends('layout.magazine')

@section('title','Age Restriction')

@section('content')
    <div class="w-full max-w-3xl px-6 mx-auto">
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl shadow-2xl p-10 text-center">

            <!-- Logo -->
            <h1 class="text-5xl font-bold mb-6">
                <span class="text-white">Guilded</span>
                <span class="bg-orange-500 text-black px-2 rounded">vice</span>
            </h1>

            <!-- Title -->
            <h2 class="text-4xl font-bold mb-6">
                This is an adult website
            </h2>

            <!-- Notice Button -->
            <div class="mb-6">
                <button class="border border-orange-500 text-orange-500 px-6 py-2 rounded-lg hover:bg-orange-500 hover:text-black transition">
                    Notice to Users
                </button>
            </div>

            <!-- Description -->
            <p class="text-gray-400 leading-relaxed mb-4">
                This website contains age-restricted materials including nudity and explicit depictions
                of sexual activity. By entering, you affirm that you are at least 18 years of age
                or the age of majority in your jurisdiction and consent to viewing adult content.
            </p>

            <p class="text-orange-500 font-semibold mb-8">
                Notice to Law Enforcement
            </p>

            <!-- Buttons -->
            <div class="flex flex-col md:flex-row gap-6 justify-center">

                <a href="{{ route('age.verify') }}"
                    class="w-full md:w-auto border-2 border-orange-500 text-white py-4 px-8 rounded-xl text-lg font-semibold hover:bg-orange-500 hover:text-black transition text-center">
                    I am 18 or older - Enter
                </a>

                <a href="https://google.com"
                    class="w-full md:w-auto border-2 border-orange-500 text-white py-4 px-8 rounded-xl text-lg font-semibold hover:bg-orange-500 hover:text-black transition text-center">
                    I am under 18 - Exit
                </a>

            </div>

            <!-- Footer -->
            <div class="mt-10 text-gray-500 text-sm">
                <p>
                    Our <span class="text-orange-500">parental controls page</span> explains how you can
                    easily block access to this site.
                </p>
                <p class="mt-2 text-orange-500">Terms of Service</p>
                <p class="mt-4">© {{ date('Y') }} guildedvice.com</p>
            </div>

        </div>
    </div>
@endsection