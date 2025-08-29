@extends('layout.app')

@section('title', $page->title)

@section('content')
    <div class="min-h-[83vh] bg-white text-gray-800 p-3 md:p-10 prose max-w-none">
        {!! $page->description !!}
    </div>
@endsection

