{{-- forgot password component  --}}
@extends('layout.app')
@section('title', 'Forgot Password')
@section('content')
<div class="flex items-center justify-center min-h-[86vh] bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-900">Forgot Password</h2>
        <form method="POST" action="{{ route('password.forgot.submit') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700"> Email</label>
                <input type="email" placeholder="jhon_doe@gmail.com" id="email" name="email" required
                       class="mt-1 block text-slate-800 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                       value="{{ old('email') }}">
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit"
                        class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Send Password Reset Link
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Remembered your password? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-900">Login   here</a></p>
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
@endsection
{{-- end forgot password component --}}
