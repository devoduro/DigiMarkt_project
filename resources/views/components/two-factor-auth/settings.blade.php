<div x-data="twoFactorAuth" class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Two-Factor Authentication</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Add additional security to your account using two-factor authentication.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                <!-- Status Messages -->
                <div x-show="error" class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                    <p x-text="error"></p>
                </div>
                
                <div x-show="success" class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                    <p x-text="success"></p>
                </div>

                <!-- Two-Factor Authentication Status -->
                <div class="mb-4">
                    <h4 class="text-md font-medium text-gray-900">
                        <template x-if="!enabled">
                            You have not enabled two-factor authentication.
                        </template>
                        <template x-if="enabled">
                            You have enabled two-factor authentication.
                        </template>
                    </h4>
                    
                    <p class="mt-1 text-sm text-gray-600">
                        <template x-if="!enabled">
                            When two-factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.
                        </template>
                        <template x-if="enabled">
                            When two-factor authentication is enabled, you will be prompted for a secure, random token during authentication. Your account is now more secure.
                        </template>
                    </p>
                </div>

                <!-- Enable/Disable Two-Factor Authentication -->
                <div class="mt-5">
                    <template x-if="!enabled">
                        <button 
                            @click="enable" 
                            type="button" 
                            class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-dark focus:outline-none focus:border-primary-dark focus:ring focus:ring-primary focus:ring-opacity-50 transition"
                            :disabled="loading"
                        >
                            <span x-show="loading" class="mr-2">
                                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                            Enable Two-Factor Authentication
                        </button>
                    </template>
                    
                    <template x-if="enabled">
                        <button 
                            @click="disable" 
                            type="button" 
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-500 focus:ring-opacity-50 transition"
                            :disabled="loading"
                        >
                            <span x-show="loading" class="mr-2">
                                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                            Disable Two-Factor Authentication
                        </button>
                    </template>
                </div>

                <!-- QR Code Display -->
                <div x-show="showingQrCode" class="mt-6">
                    <div class="p-4 bg-gray-100 rounded-md">
                        <h4 class="text-md font-medium text-gray-900 mb-2">Setup your two-factor authentication by scanning the QR code below:</h4>
                        
                        <div class="mb-4 p-2 bg-white inline-block rounded">
                            <div id="qrcode"></div>
                        </div>
                        
                        <div class="mt-4">
                            <p class="text-sm text-gray-600 mb-2">
                                To finish enabling two-factor authentication, scan the QR code with your phone's authenticator application and enter the generated code below.
                            </p>
                            
                            <div class="flex items-center space-x-2">
                                <input 
                                    type="text" 
                                    x-model="confirmationCode" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" 
                                    placeholder="Enter authentication code"
                                >
                                <button 
                                    @click="confirmEnable" 
                                    type="button" 
                                    class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-dark focus:outline-none focus:border-primary-dark focus:ring focus:ring-primary focus:ring-opacity-50 transition"
                                    :disabled="loading"
                                >
                                    <span x-show="loading" class="mr-2">
                                        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                    Confirm
                                </button>
                            </div>
                            
                            <div class="mt-4">
                                <button 
                                    @click="showRecoveryCodes" 
                                    type="button" 
                                    class="text-sm text-primary hover:text-primary-dark underline"
                                >
                                    Show recovery codes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recovery Codes Display -->
                <div x-show="showingRecoveryCodes" class="mt-6">
                    <div class="p-4 bg-gray-100 rounded-md">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-md font-medium text-gray-900">Recovery Codes</h4>
                            <button 
                                @click="copyRecoveryCodes" 
                                type="button" 
                                class="text-sm text-primary hover:text-primary-dark flex items-center"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                </svg>
                                Copy
                            </button>
                        </div>
                        
                        <div class="bg-white p-3 rounded-md font-mono text-sm">
                            <template x-for="code in recoveryCodes" :key="code">
                                <div x-text="code" class="py-1"></div>
                            </template>
                        </div>
                        
                        <p class="mt-4 text-sm text-gray-600">
                            Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two-factor authentication device is lost.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
