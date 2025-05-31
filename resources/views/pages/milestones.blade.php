@extends('layouts.app')

@section('title', 'Project Milestones')

@section('content')
<div class="bg-gradient-to-r from-indigo-600 to-primary-dark py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Project Milestones</h1>
            <p class="text-xl text-white opacity-90 max-w-3xl mx-auto">
                Towards Digital Marketing in Technical and Vocational Education and Training (DigiMarkt) in Ghana Project, co-funded by the European Union, with a total funding of €394,185.00
            </p>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <!-- Project Summary -->
        <div class="max-w-5xl mx-auto mb-16">
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                    <span class="inline-block w-12 h-12 bg-indigo-100 text-indigo-600 rounded-full mr-4 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    Project Summary
                </h2>
                <div class="prose prose-lg max-w-none">
                    <p>The aim of Digital Marketing in Technical and Vocational Education and Training (DigiMarkt) in Ghana is to empower training providers and learners to enhance their digital readiness for Technical and Vocational Education and Training (TVET).</p>
                    
                    <p>By defining future skills needed for TVET graduates in the digital era and aligning such skills to the unique local Ghanaian Context will help achieve the project aim. The project will involve participants in co-creating DigiMarkt, as well as improving the skills of teachers/trainers and mentors on innovative tools, online pedagogies and teaching techniques, cutting–edge technologies and trends in DigiMarkt.</p>
                    
                    <p>The course will give opportunity to the youth, by empowering them in the use of digital transformation tools and model in order to practicalize technical and vocational education. For the purposes of skills transfer for interested institutions and organizations that are willing to reinforce capacity and attractiveness of TVET, the DIGIMARKT approach will be available for the public to ensure sustainability.</p>
                    
                    <p>Further to the project sustainability plan, an online micro learning unit on DIGIMARKT will be available to all interested organizations and learners in English by the project partners. The project will be a two-year duration, and will be implemented by Steinbeis Beratungszentrum (SRZ), Slovak University of Agriculture, Int@E Akenten Appiah-Menka University of Skills Training and Entrepreneurial Development (AAMUSTED), Bolgatanga Technical University (BTU), Cape- Coast Technical University (CCTU).</p>
                </div>
            </div>
        </div>
        
        <!-- Work Packages -->
        <div class="max-w-5xl mx-auto mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Work Packages</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-primary-dark mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our project is organized into five key work packages, each with specific objectives and deliverables.
                </p>
            </div>
            
            <div class="space-y-6">
                @foreach($workPackages as $package)
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $package['title'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $package['description'] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            @if($package['status'] == 'Completed') bg-green-100 text-green-800
                            @elseif($package['status'] == 'In Progress') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $package['status'] }}
                        </span>
                        <span class="text-sm text-gray-500">Completion: {{ $package['completion'] }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-3">
                        <div class="h-2.5 rounded-full 
                            @if($package['status'] == 'Completed') bg-green-600
                            @elseif($package['status'] == 'In Progress') bg-blue-600
                            @else bg-yellow-600 @endif" 
                            style="width: {{ $package['completion'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Partners -->
        <div class="max-w-5xl mx-auto mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Project Partners</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-primary-dark mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our international consortium brings together expertise from Europe and Africa.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($partners as $partner)
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col items-center text-center">
                    <img src="{{ $partner['logo'] }}" alt="{{ $partner['name'] }}" class="h-20 object-contain mb-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $partner['name'] }}</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                        {{ $partner['country'] }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Gallery -->
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Project Gallery</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-primary-dark mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Visual highlights from our project activities and events.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($gallery as $item)
                <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <div class="p-4 w-full">
                                <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm text-white rounded-full text-xs font-medium mb-2">
                                    {{ $item['category'] }}
                                </span>
                                <h3 class="text-white font-bold">{{ $item['title'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('deliverables') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md transition-colors">
                    View Project Deliverables
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gradient-to-r from-indigo-600 to-primary-dark py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Join Our Digital Marketing Journey</h2>
            <p class="text-xl text-white opacity-90 mb-8 max-w-3xl mx-auto">
                Be part of our initiative to transform Technical and Vocational Education and Training through digital marketing skills and knowledge.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-indigo-600 font-semibold rounded-md hover:bg-gray-100 transition-colors">
                    Register Now
                </a>
                <a href="{{ route('contact') }}" class="px-8 py-3 bg-indigo-700 text-white font-semibold rounded-md hover:bg-indigo-800 transition-colors">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
