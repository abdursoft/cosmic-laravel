@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-[86vh] bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Login</h2>
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700"> Email</label>
                <input type="email" id="email" name="email" required autofocus
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror text-slate-800"
                       value="{{ old('email') }}">
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700"> Password</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror text-slate-800">
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember"
                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>
                <div class="text-sm">
                    <a href="{{ route('password.forgot') }}" class="text-indigo-600 hover:text-indigo-900">
                        Forgot your password?
                    </a>
                </div>
            </div>
            <div>
                <button type="submit"
                        class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Login
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900">Register</a>
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
        const passwordInput = document.getElementById('password');
        passwordInput.addEventListener('input', function () {
            this.classList.remove('border-red-500');
        });

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

@section('meta')
<meta name="description" content="Login to your account to access exclusive content and features.">
<meta name="keywords" content="login, user account, authentication, cosmic laravel">
<meta name="author" content="Cosmic Laravel Team">
<meta property="og:title" content="Login - Cosmic Laravel">
<meta property="og:description" content="Login to your account to access exclusive content and features.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/hero11.png') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Login - Cosmic Laravel">
<meta name="twitter:description" content="Login to your account to access exclusive content and features    .">
<meta name="twitter:image" content="{{ asset('images/hero11.png') }}">
@endsection
