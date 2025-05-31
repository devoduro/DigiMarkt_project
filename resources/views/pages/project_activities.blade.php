@extends('layouts.app')

@section('title', 'Project Activities')

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
                <span class="inline-block px-4 py-1 bg-white bg-opacity-20 backdrop-blur-sm text-white rounded-full text-sm font-medium mb-6">DigiMarkt</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-6">
                    Project Activities
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-teal-400 to-cyan-400 mx-auto mb-8"></div>
                <p class="text-xl text-white text-opacity-90 mb-8 max-w-3xl mx-auto">
                    Explore the key activities and events of the DigiMarkt project, from training sessions to international collaborations.
                </p>
            </div>
        </div>
    </section>

    <!-- Project Overview Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="mb-12">
                    <p class="text-xl text-gray-700 mb-6">
                        The project deems it as very important to study the experiences of each EU partner because all of them have similarities and uniqueness in their experiences and expertise. 
                        The first cohort of training will take place in Slovak University of Agriculture (SUA) in Nitra with first 20 Ghanaian staff from Akenten Appiah-Menka University of Skills Training and Entrepreneurial Development (AAMUSTED), 
                        Cape-Coast Technical University (CCTU) and Bolgatanga Technical University (BTU).
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Announcements</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mb-8"></div>
                    
                    <div class="space-y-8">
                        @foreach($announcements as $announcement)
                            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $announcement['title'] }}</h3>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $announcement['date'] }}
                                        </span>
                                    </div>
                                    <p class="text-gray-700 mb-4">{{ $announcement['content'] }}</p>
                                    
                                    <div class="flex justify-between items-center">
                                        @if(isset($announcement['document']))
                                            <a href="#" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
                                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                                                </svg>
                                                Terms of Reference
                                            </a>
                                        @else
                                            <div></div>
                                        @endif
                                        
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-red-500 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="text-gray-600">{{ $announcement['likes'] }}</span>
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

    <!-- Activities Timeline Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Project Activities Timeline</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600">Key events and milestones in the DigiMarkt project</p>
                </div>
                
                <div class="relative">
                    <!-- Timeline Line -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-indigo-500 to-purple-600 rounded-full"></div>
                    
                    <div class="space-y-24">
                        @foreach($activities as $index => $activity)
                            <div class="relative z-10">
                                <!-- Timeline Dot -->
                                <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-8 h-8 bg-white rounded-full border-4 {{ $activity['status'] == 'Completed' ? 'border-green-500' : ($activity['status'] == 'In Progress' ? 'border-yellow-500' : 'border-indigo-500') }} shadow-md"></div>
                                
                                <!-- Content Card -->
                                <div class="{{ $index % 2 == 0 ? 'ml-auto pl-12 pr-0' : 'mr-auto pr-12 pl-0' }} w-full md:w-5/12">
                                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                        <!-- Status Badge -->
                                        <div class="p-1 {{ $activity['status'] == 'Completed' ? 'bg-green-500' : ($activity['status'] == 'In Progress' ? 'bg-yellow-500' : 'bg-indigo-500') }}"></div>
                                        
                                        <div class="p-6">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $activity['status'] == 'Completed' ? 'bg-green-100 text-green-800' : ($activity['status'] == 'In Progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-indigo-100 text-indigo-800') }} mb-4">
                                                {{ $activity['status'] }}
                                            </span>
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $activity['title'] }}</h3>
                                            <p class="text-gray-500 text-sm mb-4">{{ $activity['date'] }}</p>
                                            <p class="text-gray-700 mb-6">{{ $activity['description'] }}</p>
                                            
                                            @if(count($activity['images']) > 0)
                                                <div class="grid grid-cols-2 gap-2">
                                                    @foreach(array_slice($activity['images'], 0, 2) as $image)
                                                        <div class="rounded-lg overflow-hidden bg-gray-100 aspect-w-16 aspect-h-9">
                                                            <img src="{{ asset('assets/images/' . $image) }}" alt="{{ $activity['title'] }}" class="w-full h-full object-cover hover:opacity-90 transition-opacity duration-300">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
                                                @if(count($activity['images']) > 2)
                                                    <div class="mt-2 text-center">
                                                        <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                                            View all {{ count($activity['images']) }} photos
                                                        </a>
                                                    </div>
                                                @endif
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

    <!-- Work Packages Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Work Packages</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600">Key components of the DigiMarkt project</p>
                </div>
                
                <div class="grid grid-cols-1 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">WP1: Project administration and coordination</h3>
                        <p class="text-gray-700 mb-2">Management and coordination of all project activities and deliverables.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">WP2: Social Digital Entrepreneurship and Needs Analysis</h3>
                        <p class="text-gray-700 mb-2">Research and analysis of digital marketing needs in TVET education.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">WP3: Training Materials and Mentorship</h3>
                        <p class="text-gray-700 mb-2">Development of training materials and mentorship programs for digital marketing.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">WP4: Quality Evaluation and Assurance</h3>
                        <p class="text-gray-700 mb-2">Ensuring quality standards across all project deliverables and activities.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">WP5: Project Impact and Dissemination</h3>
                        <p class="text-gray-700 mb-2">Measuring project impact and disseminating results to stakeholders.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Project Gallery</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600">Visual highlights from our activities</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Gallery Items -->
                    <div class="group relative rounded-xl overflow-hidden bg-gray-200 aspect-w-16 aspect-h-9 shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('assets/images/slovak-training_main.svg') }}" alt="Digital Marketing Training in Slovakia" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-80 transition-opacity duration-300 flex items-end">
                            <div class="p-4">
                                <h3 class="text-white font-bold">Digital Marketing Training in Slovakia</h3>
                                <p class="text-gray-200 text-sm">April 28 - May 02, 2025</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative rounded-xl overflow-hidden bg-gray-200 aspect-w-16 aspect-h-9 shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('assets/images/gal1.svg') }}" alt="Kick-off Meeting in Germany" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-80 transition-opacity duration-300 flex items-end">
                            <div class="p-4">
                                <h3 class="text-white font-bold">Kick-off Meeting in Germany</h3>
                                <p class="text-gray-200 text-sm">February 9 - 12, 2025</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative rounded-xl overflow-hidden bg-gray-200 aspect-w-16 aspect-h-9 shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('assets/images/Lab_photo_1.svg') }}" alt="Digital Marketing Laboratory Equipment" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-80 transition-opacity duration-300 flex items-end">
                            <div class="p-4">
                                <h3 class="text-white font-bold">Digital Marketing Laboratory Equipment</h3>
                                <p class="text-gray-200 text-sm">March 15 - 30, 2025</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative rounded-xl overflow-hidden bg-gray-200 aspect-w-16 aspect-h-9 shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('assets/images/slovak-training_3.svg') }}" alt="Digital Marketing Training in Slovakia" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-80 transition-opacity duration-300 flex items-end">
                            <div class="p-4">
                                <h3 class="text-white font-bold">Digital Marketing Training in Slovakia</h3>
                                <p class="text-gray-200 text-sm">April 28 - May 02, 2025</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative rounded-xl overflow-hidden bg-gray-200 aspect-w-16 aspect-h-9 shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('assets/images/gal2.svg') }}" alt="Kick-off Meeting in Germany" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-80 transition-opacity duration-300 flex items-end">
                            <div class="p-4">
                                <h3 class="text-white font-bold">Kick-off Meeting in Germany</h3>
                                <p class="text-gray-200 text-sm">February 9 - 12, 2025</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative rounded-xl overflow-hidden bg-gray-200 aspect-w-16 aspect-h-9 shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('assets/images/Lab_photo_2.svg') }}" alt="Digital Marketing Laboratory Equipment" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-80 transition-opacity duration-300 flex items-end">
                            <div class="p-4">
                                <h3 class="text-white font-bold">Digital Marketing Laboratory Equipment</h3>
                                <p class="text-gray-200 text-sm">March 15 - 30, 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-10">
                    <a href="#" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-300">
                        <span>View Full Gallery</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-indigo-900 via-purple-800 to-indigo-700 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute top-[10%] left-[5%] w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-[20%] right-[10%] w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-[10%] left-[20%] w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">Interested in Learning More?</h2>
                <p class="text-xl text-white text-opacity-90 mb-10 max-w-3xl mx-auto">
                    Explore our project milestones and deliverables to see how DigiMarkt is transforming digital marketing education in Ghana.
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('milestones') }}" class="px-8 py-4 bg-white text-indigo-700 font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300 inline-block text-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        View Project Milestones
                    </a>
                    <a href="{{ route('deliverables') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-indigo-800 transition-all duration-300 inline-block text-center transform hover:-translate-y-1">
                        Explore Deliverables
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
