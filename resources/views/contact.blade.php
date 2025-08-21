@extends('layout.app')

@section('title', 'Contact Us')

@section('content')
    <div class="min-h-[83vh]">
        @include('components.sections.contact-section')
    </div>
@endsection



@section('meta')
<meta name="description" content="Contact us for any inquiries or support. We are here to help you with your needs.">
<meta name="keywords" content="contact, support, inquiries, help">
<meta name="author" content="Cosmic Laravel">
<meta property="og:title" content="Contact Us - Cosmic Laravel">
<meta property="og:description" content="Reach out to us for any questions or support. We are here to assist you.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/contact-banner.jpg') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Contact Us - Cosmic Laravel">
<meta name="twitter:description" content="Get in touch with us for any inquiries or support. We are here to help you.">
<meta name="twitter:image" content="{{ asset('images/contact-banner.jpg') }}">
@endsection
