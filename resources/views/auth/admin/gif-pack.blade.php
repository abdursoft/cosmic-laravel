@extends('layout.admin')

@section('title','Gif Packages')

@section('content')
    @include('components.form.gif-pack')
    @include('components.tables.gif-pack')

@endsection
