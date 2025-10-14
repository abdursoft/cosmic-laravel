@extends('layout.admin')

@section('title', 'Manage subscription tiers')


@section('content')
    @include('components.tables.admin-tiers')
@endsection
