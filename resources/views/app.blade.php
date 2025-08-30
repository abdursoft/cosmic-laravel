@extends('layout.app')

@section('title', 'The Guilded Vice')

@section('content')
    @include('components.sections.hero-section')
    @include('components.sections.issue-section')
    @include('components.sections.obbey-section')
    @include('components.sections.contact-section')
@endsection
