@extends('layout.app')

@section('title','Select your magazine')

@section('content')

    <div class="container min-h-screen">
        <div class="flex flex-col md:flex-row justify-center md:justify-between gap-3 w-full mt-3">
            <div class="h3 text-2xl md:text-3xl text-white">
                You can select only {{$package->allowed_magazine}} magazines
            </div>
            <div class="flex items-center justify-center md:justify-end gap-2">
                <button class="cursor-pointer bg-green-600 text-white px-3 py-2 rounded-md btn btn-active" onclick="toggleMagazine('activeMagazine',this)">Active</button>
                <button class="cursor-pointer bg-gray-600 text-white px-3 py-2 rounded-md btn" onclick="toggleMagazine('inActiveMagazine',this)">Archive</button>
                <button class="cursor-pointer bg-teal-600 text-white px-3 py-2 rounded-md">Subscription</button>
            </div>
        </div>

        <!-- active magazine -->
        <div class="mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine" style="display: flex;" id="activeMagazine">
            @foreach(magazines() as $key=>$magazine)
                @if($magazine->is_archive != '0')
                    <div class="flex flex-col p-5 w-full md:w-1/3">
                        <div class="w-full h-full rounded-lg overflow-hidden shadow-2xl flex flex-col gap-10">
                            <img src="{{Storage::url($magazine->thumbnail)}}" alt="{{$magazine->title}}">
                            <div class="p-2 flex items-center justify-center flex-1 bg-gray-700">
                                <h2 class="text-xl md:text-2xl text-center text-white">{{$magazine->title}}</h2>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- archive magazine -->
        <div class="flex mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine" style="display: none" id="inActiveMagazine">
            @foreach(magazines() as $key=>$magazine)
                @if($magazine->is_archive == '0')
                    <div class="flex flex-col p-5 w-full md:w-1/3">
                        <div class="w-full h-full rounded-lg overflow-hidden shadow-2xl flex flex-col">
                            <img src="{{Storage::url($magazine->thumbnail)}}" alt="{{$magazine->title}}">
                            <div class="flex items-center justify-center flex-1 bg-gray-700 p-2 gap-3">
                                <div class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-md cursor-pointer w-full p-2">
                                    <input type="checkbox" name="magazine" value="{{$magazine->id}}">
                                    <p>Select</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

<style>
    .btn-active{
        background: rgb(230, 39, 39);
        transition: ease-in-out 0.5s;
    }
</style>


<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    function toggleMagazine(id,button){
        $(`.magazine`).css('display','none');
        $('.btn').removeClass('btn-active');
        $(button).addClass('btn-active');
        $(`#${id}`).css('display','flex');
    }
</script>

@endsection
