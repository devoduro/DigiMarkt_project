@extends('layouts.app')

@section('title', 'Two-Factor Authentication')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Two-Factor Authentication
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Please enter the verification code from your authenticator app.
            </p>
        </div>

        <!-- Verification Code Form -->
        <div class="mt-8 bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{ route('two-factor.verify.post') }}" method="POST">
                @csrf
                <div>
                    <label for="code" class="block text-sm font-medium text-gray-700">
                        Verification Code
                    </label>
                    <div class="mt-1">
                        <input id="code" name="code" type="text" inputmode="numeric" pattern="[0-9]*" autocomplete="one-time-code" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" placeholder="Enter 6-digit code">
                    </div>
                    @error('code')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Verify
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">
                            Or use a recovery code
                        </span>
                    </div>
                </div>

                <form class="mt-6 space-y-6" action="{{ route('two-factor.verify.recovery') }}" method="POST">
                    @csrf
                    <div>
                        <label for="recovery_code" class="block text-sm font-medium text-gray-700">
                            Recovery Code
                        </label>
                        <div class="mt-1">
                            <input id="recovery_code" name="recovery_code" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" placeholder="Enter recovery code">
                        </div>
                        @error('recovery_code')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            Use Recovery Code
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
