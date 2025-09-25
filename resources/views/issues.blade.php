@extends('layout.issue')

@section('title','Issue list')

@section('content')

    <div class="container">
        <div class="text-center text-3xl text-white">{{$magazine->title ?? ''}}</div>
        <div class="flex mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto">
            @foreach($magazine->issues as $key=>$issue)
                <a href="{{route((auth()->user()->role == 'admin' ? 'admin.issues.read' : 'user.issue.read'),$issue->id)}}" class="flex flex-col p-5 w-full md:w-1/3">
                    <div class="w-full h-full rounded-lg overflow-hidden shadow-2xl flex flex-col gap-10">
                        <img src="{{Storage::url($issue->thumbnail)}}" alt="{{$issue->title}}">
                        <div class="p-2 flex items-center justify-between flex-1 bg-gray-700">
                            <h2 class="text-xl md:text-2xl">{{$issue->title}}</h2>
                            <h2 class="text-xl md:text-2xl">Issue {{$key < 9 ? '0'.$key+1 : $key+1}}</h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
