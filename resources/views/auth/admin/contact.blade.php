@extends('layout.admin')

@section('title','Contact Messages')

@section('content')
    @include('components.form.admin-contact')
    @include('components.tables.contacts')

@endsection
