@extends('layout.admin')

@section('title','Magazine management')

@section('content')

    @include('components.form.magazine')
    @include('components.tables.magazine')

@endsection
