@extends('layout.issue')

@section('title','Magazine list')

@section('content')

    <div class="container min-h-screen">
        <div class="p-0 md:px-5 w-full">
            <h2 class="text-xl text-white border-b-1 border-slate-700">Magazines in your subscription</h2>
        </div>
        <!-- active magazine -->
        <div class="mt-5 w-full flex flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine">
            @foreach($magazines as $key=>$magazine)
                <a href="{{route('user.magazine.view',$magazine->id)}}" class="flex flex-col p-5 w-full md:w-1/3">
                    <div class="w-full h-full rounded-lg overflow-hidden shadow-2xl flex flex-col">
                        <img src="{{Storage::url($magazine->thumbnail)}}" alt="{{$magazine->title}}">
                        <div class="p-2 flex items-center justify-between flex-1 bg-gray-700">
                            <h2 class="text-xl line-clamp-1">{{$magazine->title}}</h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

@endsection
