@extends('layout.user')

@section('title','User Subscriptions')

@section('content')
    <div class="flex items-center justify-center w-full bg-[#ddd]">
        <div class="w-full max-w-[1550px] bg-[#eee] min-h-[65vh] md:p-4">
            @include('components.sections.user-magazines')
        </div>
    </div>
@endsection

