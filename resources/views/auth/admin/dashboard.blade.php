@extends('layout.admin')

@section('title','Admin Dashboard')

@section('content')
    @include('components.cards.admin-service')
    @include('components.tables.transaction')
@endsection

