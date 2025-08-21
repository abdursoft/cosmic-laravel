@extends('layout.admin')

@section('title','Subscription Packages')

@section('content')
    @include('components.form.package')
    @include('components.tables.package')

@endsection
