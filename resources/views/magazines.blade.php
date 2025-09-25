@extends('layout.issue')

@section('title','Magazine list')

@section('content')

    <div class="container">
        <div class="flex mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto">
            @foreach($magazines as $key=>$magazine)
                <a href="{{route('issue.list',$magazine->id)}}" class="flex flex-col p-5 w-full md:w-1/3">
                    <div class="w-full h-full rounded-lg overflow-hidden shadow-2xl flex flex-col gap-10">
                        <img src="{{Storage::url($magazine->thumbnail)}}" alt="{{$magazine->title}}">
                        <div class="p-2 flex items-center justify-center flex-1 bg-gray-700">
                            <h2 class="text-xl md:text-2xl text-center">{{$magazine->title}}</h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
