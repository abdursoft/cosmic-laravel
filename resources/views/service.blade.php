@extends('layout.app')

@section('title', 'Pricing')

@section('content')
    @include('components.sections.service-hero')
    @include('components.sections.cta-section')
    @include('components.sections.subscription-section')
    @include('components.sections.gif-section')
    @include('components.sections.gif-package')
    @include('components.sections.contact-section')
@endsection
