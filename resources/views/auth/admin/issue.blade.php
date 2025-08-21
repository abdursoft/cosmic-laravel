@extends('layout.admin')

@section('title','Issue management')

@section('content')

    @include('components.form.issue')
    @include('components.tables.issue')

@endsection
