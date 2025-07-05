@extends('layouts.app')

@section('title', 'Our Partners')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-900 via-purple-800 to-indigo-700 py-20 md:py-28">
        <!-- Animated Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute top-[10%] left-[5%] w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-[20%] right-[10%] w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-[10%] left-[20%] w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-block px-4 py-1 bg-white bg-opacity-20 backdrop-blur-sm text-white rounded-full text-sm font-medium mb-6">DigiMarkt Partners</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-6">
                    Our Collaborative Partners
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-teal-400 to-cyan-400 mx-auto mb-8"></div>
                <p class="text-xl text-white text-opacity-90 mb-8 max-w-3xl mx-auto">
                    DigiMarkt is made possible through the collaboration of these esteemed European and Ghanaian institutions
                </p>
            </div>
        </div>
    </section>

    <!-- European Partners Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">European Partners</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mb-8"></div>
                    
                    <div class="grid grid-cols-1 gap-8">
                        @foreach($europeanPartners as $partner)
                            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                                <div class="flex flex-col md:flex-row md:items-start">
                                    <div class="md:w-1/4 flex flex-col items-center mb-6 md:mb-0 md:mr-8">
                                        <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mb-4 overflow-hidden">
                                            @php
                                                $logoPath = strpos($partner['logo'], '/') !== false ? $partner['logo'] : 'assets/images/logo/' . $partner['logo'];
                                            @endphp
                                            <img src="{{ asset($logoPath) }}" alt="{{ $partner['name'] }} Logo" class="max-w-full max-h-full object-contain">
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900 text-center">{{ $partner['name'] }}</h3>
                                        <p class="text-gray-600 text-center">{{ $partner['country'] }}</p>
                                        @if(isset($partner['website']))
                                            <span class="mt-2 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                                {{ $partner['website'] }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="md:w-3/4">
                                        <div class="prose max-w-none">
                                            <p class="text-gray-700">{{ $partner['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ghanaian Partners Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Ghanaian Partners</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mb-8"></div>
                    
                    <div class="grid grid-cols-1 gap-8">
                        @foreach($ghanaianPartners as $partner)
                            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                                <div class="flex flex-col md:flex-row md:items-start">
                                    <div class="md:w-1/4 flex flex-col items-center mb-6 md:mb-0 md:mr-8">
                                        <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mb-4 overflow-hidden">
                                            @php
                                                $logoPath = strpos($partner['logo'], '/') !== false ? $partner['logo'] : 'assets/images/logo/' . $partner['logo'];
                                            @endphp
                                            <img src="{{ asset($logoPath) }}" alt="{{ $partner['name'] }} Logo" class="max-w-full max-h-full object-contain">
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900 text-center">{{ $partner['name'] }}</h3>
                                        <p class="text-gray-600 text-center">{{ $partner['country'] }}</p>
                                    </div>
                                    <div class="md:w-3/4">
                                        <div class="prose max-w-none">
                                            <p class="text-gray-700 mb-6">{{ $partner['description'] }}</p>
                                            
                                            @if(isset($partner['mission']))
                                                <div class="mb-4">
                                                    <h4 class="text-lg font-semibold text-indigo-700 mb-2">Mission</h4>
                                                    <p class="text-gray-700">{{ $partner['mission'] }}</p>
                                                </div>
                                            @endif
                                            
                                            @if(isset($partner['vision']))
                                                <div class="mb-4">
                                                    <h4 class="text-lg font-semibold text-indigo-700 mb-2">Vision</h4>
                                                    <p class="text-gray-700">{{ $partner['vision'] }}</p>
                                                </div>
                                            @endif
                                            
                                            @if(isset($partner['values']) && count($partner['values']) > 0)
                                                <div class="mb-4">
                                                    <h4 class="text-lg font-semibold text-indigo-700 mb-2">Core Values</h4>
                                                    <ul class="list-disc pl-5 text-gray-700">
                                                        @foreach($partner['values'] as $value)
                                                            <li>{{ $value }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            
                                            @if(isset($partner['functions']) && count($partner['functions']) > 0)
                                                <div class="mb-4">
                                                    <h4 class="text-lg font-semibold text-indigo-700 mb-2">Key Functions</h4>
                                                    <ul class="list-disc pl-5 text-gray-700">
                                                        @foreach($partner['functions'] as $function)
                                                            <li>{{ $function }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            
                                            @if(isset($partner['niche']))
                                                <div class="mb-4">
                                                    <h4 class="text-lg font-semibold text-indigo-700 mb-2">Niche Area</h4>
                                                    <p class="text-gray-700">{{ $partner['niche'] }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Benefits Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Partnership Benefits</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600">How our collaborative approach strengthens the DigiMarkt project</p>
                    <p class="mt-4 text-gray-700">The DigiMarkt project brings together European and Ghanaian institutions to enhance digital marketing education in TVET institutions, fostering innovation and sustainable development.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-gray-50 rounded-xl p-8 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Knowledge Exchange</h3>
                        </div>
                        <p class="text-gray-700">Sharing expertise and best practices between European and Ghanaian institutions to enhance digital marketing education.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-8 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Collaborative Research</h3>
                        </div>
                        <p class="text-gray-700">Joint research initiatives to develop innovative approaches to digital marketing in TVET education.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-8 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Resource Development</h3>
                        </div>
                        <p class="text-gray-700">Creating educational resources and tools tailored to the Ghanaian context while incorporating global best practices.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-8 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Sustainable Impact</h3>
                        </div>
                        <p class="text-gray-700">Ensuring long-term benefits for TVET education in Ghana through capacity building and knowledge transfer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EU Disclaimer Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-indigo-50 rounded-2xl p-8 border border-indigo-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">About the Project</h3>
                    <p class="text-gray-700 mb-4">
                        DigiMarkt is a collaborative project between European and Ghanaian institutions aimed at enhancing digital marketing education in TVET institutions. The project focuses on developing innovative teaching methodologies, curriculum design, and capacity building for educators.
                    </p>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Disclaimer</h4>
                    <p class="text-gray-700">
                        This project has been funded with support from the European Union. This publication reflects the views only of the author, 
                        and the EU cannot be held responsible for any use which may be made of the information contained therein.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
