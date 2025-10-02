@extends('layout.app')

@section('title','Select your magazine')

@section('content')

<!-- Magazine selection form -->
<form action="{{route('user.subscribe')}}" method="post">
    <input type="hidden" name="package" value="{{$package->id}}">
    @csrf
    <div class="w-full flex items-center justify-center flex-col py-10">
        <div class="container min-h-screen">
            <div class="flex flex-col md:flex-row justify-center md:justify-between gap-3 w-full mt-3 px-0 md:px-5">
                <div class="h3 text-2xl md:text-3xl text-red-500">
                    You can select only {{$package->allowed_magazine}} magazine{{$package->allowed_magazine > 1 ? 's' : ''}}
                </div>
                <div class="flex items-center justify-center md:justify-end gap-2">
                    @if(auth()->check())
                        <button type="submit" class="cursor-pointer bg-teal-600 text-white px-3 py-2 rounded-md">Confirm & Unlock</button>
                    @else
                        <a href="{{route('login')}}" class="cursor-pointer bg-green-600 text-white px-3 py-2 rounded-md">Login to unlock</a>
                    @endif
                </div>
            </div>

                <!-- active magazine -->
                <div class="mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine" style="display: flex;" id="activeMagazine">
                    @foreach(magazines() as $key=>$magazine)
                        @if($magazine->publish())
                            <div class="flex flex-col p-5 w-full md:w-1/3">
                                <div class="w-full h-full rounded-lg overflow-hidden shadow-2xl flex flex-col">
                                    <img class="h-[460px]" src="{{Storage::url($magazine->thumbnail)}}" alt="{{$magazine->title}}" loading="lazy">
                                    <div class="flex items-center justify-center flex-1 bg-gray-700 p-2 gap-3">
                                        <label for="mag_{{$key}}" class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-md cursor-pointer w-full p-2">
                                            <input id="mag_{{$key}}" type="checkbox" name="magazine[]" value="{{$magazine->id}}">
                                            <p>Select</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
        </div>
    </div>
</form>
<!-- Magazine selection form -->

@endsection
