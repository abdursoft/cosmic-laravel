@extends('layout.user')

@section('title','User Gif Packages')

@section('content')
    <div class="flex items-center justify-center w-full bg-[#ddd]">
        <div class="w-full max-w-[1550px] bg-[#eee] min-h-[65vh] p-4">
            @include('components.tables.user-gifs')
        </div>
    </div>
@endsection

