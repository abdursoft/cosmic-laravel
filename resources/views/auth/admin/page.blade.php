@extends('layout.admin')

@section('title', 'Manage pages')


@section('content')
    @include('components.form.page')
    @include('components.tables.page')
@endsection
