@extends('layout.app')

@section('title', 'Cosmic Laravel')

@section('content')
    @include('components.sections.hero-section')
    @include('components.sections.issue-section')
    @include('components.sections.obbey-section')
    @include('components.sections.contact-section')
@endsection
