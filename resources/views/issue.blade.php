@extends('layout.magazine')

@section('title',$issue->title)

@section('content')
    <div class="flex items-center justify-center w-full flex-col">
        <div class="w-full relative max-w-[1000px] lg:p-3">
            @include('components.book.single')
        </div>
    </div>
@endsection
