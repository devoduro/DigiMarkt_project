@extends('layouts.app')

@section('title', 'Two-Factor Authentication')

@section('content')
<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" x-data="twoFactorChallenge">
        <div class="mb-4 text-center">
            <h1 class="text-2xl font-bold text-gray-900">Two-Factor Authentication</h1>
            <p class="mt-2 text-sm text-gray-600">
                <template x-if="!usingRecoveryCode">
                    Please confirm access to your account by entering the authentication code provided by your authenticator application.
                </template>
                <template x-if="usingRecoveryCode">
                    Please confirm access to your account by entering one of your emergency recovery codes.
                </template>
            </p>
        </div>

        <div x-show="error" class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
            <p x-text="error"></p>
        </div>

        <!-- Authentication Code Form -->
        <div x-show="!usingRecoveryCode">
            <form @submit.prevent="verifyCode">
                <div>
                    <label for="code" class="block text-sm font-medium text-gray-700">Authentication Code</label>
                    <input 
                        id="code" 
                        type="text" 
                        x-model="code" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" 
                        inputmode="numeric" 
                        autocomplete="one-time-code" 
                        autofocus 
                        required
                    >
                </div>

                <div class="flex items-center justify-between mt-4">
                    <button 
                        type="button" 
                        class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                        @click="toggleRecoveryCode"
                    >
                        Use a recovery code
                    </button>

                    <button 
                        type="submit" 
                        class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-dark active:bg-primary-dark focus:outline-none focus:border-primary-dark focus:ring focus:ring-primary focus:ring-opacity-50 transition"
                        :disabled="loading"
                    >
                        <span x-show="loading" class="mr-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        Verify
                    </button>
                </div>
            </form>
        </div>

        <!-- Recovery Code Form -->
        <div x-show="usingRecoveryCode">
            <form @submit.prevent="useRecoveryCode">
                <div>
                    <label for="recovery_code" class="block text-sm font-medium text-gray-700">Recovery Code</label>
                    <input 
                        id="recovery_code" 
                        type="text" 
                        x-model="recovery" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" 
                        autocomplete="one-time-code" 
                        autofocus 
                        required
                    >
                </div>

                <div class="flex items-center justify-between mt-4">
                    <button 
                        type="button" 
                        class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                        @click="toggleRecoveryCode"
                    >
                        Use an authentication code
                    </button>

                    <button 
                        type="submit" 
                        class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-dark active:bg-primary-dark focus:outline-none focus:border-primary-dark focus:ring focus:ring-primary focus:ring-opacity-50 transition"
                        :disabled="loading"
                    >
                        <span x-show="loading" class="mr-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        Verify
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/two-factor-auth.js') }}"></script>
@endsection
