{{-- reset new password component --}}

@extends('layout.app')
@section('title', 'Reset Password')
@section('content')
<div class="flex items-center justify-center min-h-[86vh] bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Reset Password</h2>
        <form method="POST" action="{{ route('password.reset.submit') }}">
            @csrf
            <div class="mb-4">
                <label for="otp" class="block text-sm font-medium text-gray-700"> OTP</label>
                <input type="number" id="otp" name="otp" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror text-slate-800"
                       value="{{ old('otp') }}">
                @error('otp')
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
                    Reset Password
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Remembered your password? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-900">Login here</a></p>
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
        const passwordConfirmationInput = document.getElementById('password_confirmation');
        passwordConfirmationInput.addEventListener('input', function () {
            this.classList.remove('border-red-500');
        });
    });
</script>
@endsection
{{-- end reset new password component --}}
