@extends('layout.app')

@section('title', 'Register New Account')

@section('content')
<div class="flex items-center justify-center min-h-[86vh] bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Register</h2>
        <form method="POST" action="{{ route('auth.register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700"> Name</label>
                <input type="text" id="name" name="name" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror text-slate-800"
                       value="{{ old('name') }}">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700"> Email</label>
                <input type="email" id="email" name="email" required autofocus
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror text-slate-800"
                       value="{{ old('email') }}">
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700"> Password</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror text-slate-800">
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700"> Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-slate-800">
            </div>
            <div>
                <button type="submit"
                        class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Register
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-900">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const emailInput = document.getElementById('email');
        emailInput.addEventListener('input', function () {
            this.classList.remove('border-red-500');
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('name');
        nameInput.addEventListener('input', function () {
            this.classList.remove('border-red-500');
        });
        const passwordInput = document.getElementById('password');
        passwordInput.addEventListener('input', function () {
            this.classList.remove('border-red-500');
        });
        const passwordConfirmationInput = document.getElementById('password_confirmation');
        passwordConfirmationInput.addEventListener('input', function () {
            this.classList.remove('border-red-500');
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rememberCheckbox = document.getElementById('remember');
        rememberCheckbox.addEventListener('change', function () {
            if (this.checked) {
                this.classList.add('bg-indigo-600');
            } else {
                this.classList.remove('bg-indigo-600');
            }
        });
    });
</script>
@endsection
@section('styles')
<style>
    .bg-indigo-600:hover {
        background-color: #4c51bf; /* Darker shade for hover */
    }
</style>
@endsection
@section('meta')
<meta name="description" content="Register a new account to access exclusive content and features. Join us today!">
<meta name="keywords" content="register, create account, sign up, join, cosmic laravel">
<meta name="author" content="Cosmic Laravel Team">
<meta property="og:title" content="Register - Cosmic Laravel">
<meta property="og:description" content="Register a new account to access exclusive content and features. Join us today!">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/hero11.png') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Register - Cosmic Laravel">
<meta name="twitter:description" content="Register a new account to access exclusive content and features. Join us today!">
<meta name="twitter:image" content="{{ asset('images/hero11.png') }}">
@endsection
