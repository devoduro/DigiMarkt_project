@extends('layouts.app')

@section('title', 'Contact Us - DigiMarkt')

@section('content')
<div class="bg-gradient-to-r from-green-500 to-indigo-600 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Contact Us</h1>
            <p class="text-xl text-white opacity-90">Get in touch with the DigiMarkt project team</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Contact Information -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Project Information</h2>
                
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Address</h3>
                    <p class="text-gray-600">
                        DigiMarkt Project Office<br>
                        AAMUSTED, Kumasi Campus<br>
                        Kumasi, Ghana
                    </p>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Email</h3>
                    <p class="text-gray-600">
                        <a href="mailto:info@digimarkt.aamusted.edu.gh" class="text-primary-dark hover:underline">
                            info@digimarkt.aamusted.edu.gh
                        </a>
                    </p>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Phone</h3>
                    <p class="text-gray-600">+233 302 123 456</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/DigiMarktProject" target="_blank" rel="noopener" class="text-gray-600 hover:text-primary-dark">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="https://twitter.com/DigiMarktGhana" target="_blank" rel="noopener" class="text-gray-600 hover:text-primary-dark">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/digimarkt_project/" target="_blank" rel="noopener" class="text-gray-600 hover:text-primary-dark">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Partner Institutions</h2>
                <ul class="space-y-4">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-primary-dark rounded-full mr-2"></div>
                        <span class="text-gray-700">Steinbeis (Germany)</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-primary-dark rounded-full mr-2"></div>
                        <span class="text-gray-700">Slovak University of Agriculture</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-primary-dark rounded-full mr-2"></div>
                        <span class="text-gray-700">AAMUSTED (Ghana)</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-primary-dark rounded-full mr-2"></div>
                        <span class="text-gray-700">Bolgatanga Technical University</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-primary-dark rounded-full mr-2"></div>
                        <span class="text-gray-700">Cape Coast Technical University</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-light @error('name') border-red-500 @enderror" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-light @error('email') border-red-500 @enderror" required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-light @error('subject') border-red-500 @enderror" required>
                        @error('subject')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea name="message" id="message" rows="6" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-light @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    @error('g-recaptcha-response')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    
                    <div>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-500 to-indigo-600 text-white font-medium rounded-lg hover:opacity-90 transition duration-300">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Map Section -->
    <div class="mt-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Find Us</h2>
        <div class="bg-gray-200 rounded-lg h-96 overflow-hidden">
            <div class="h-full w-full">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.6894053915485!2d-1.6127833!3d6.6871503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f1bafb3c5d%3A0xb6a73e5b8f7ccc76!2sAkenten%20Appiah-Menka%20University%20of%20Skills%20Training%20and%20Entrepreneurial%20Development!5e0!3m2!1sen!2sgh!4v1650000000000!5m2!1sen!2sgh" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
