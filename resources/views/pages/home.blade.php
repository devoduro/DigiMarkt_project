@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Marquee Announcement -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-2 px-6 mb-6 mt-12 rounded-md shadow-md mx-4">
        <marquee behavior="scroll" direction="left" scrollamount="5">
            <div class="flex items-center space-x-12">
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="font-medium">DigiMarkt Project is co-funded by the European Union with a total funding of €394,185.00</span>
                </span>
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="font-medium">Empowering TVET providers to enhance digital readiness of graduates in Ghana</span>
                </span>
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="font-medium">Supporting teachers and trainers with new digital skills and competences</span>
                </span>
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="font-medium">Improving employability potential of TVET learners through innovative education programs</span>
                </span>
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="font-medium">DigiMarkt Project is co-funded by the European Union with a total funding of €394,185.00</span>
                </span>
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="font-medium">Empowering TVET providers to enhance digital readiness of graduates in Ghana</span>
                </span>
            </div>

        </marquee>
    </div>

    <!-- Carousel Section -->
    <section class="relative overflow-hidden">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="overlay-image" style="background-image: url('{{ asset('assets/images/carousel/slider1.png') }}');"></div>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h2>Digital Marketing in TVET</h2>
                            <p>Empowering training providers and learners with digital marketing skills in Ghana</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="overlay-image" style="background-image: url('{{ asset('assets/images/carousel/slider2.png') }}');"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h2>International Collaboration</h2>
                            <p>Working with partners across Europe and Africa to enhance digital marketing education</p>
                            <p><a class="btn btn-lg btn-success" href="#">View Partners</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="overlay-image" style="background-image: url('{{ asset('assets/images/carousel/slider3.png') }}');"></div>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h2>Building Digital Capacity</h2>
                            <p>Developing innovative training materials and resources for digital marketing</p>
                            <p><a class="btn btn-lg btn-info" href="#">Explore Resources</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Marquee Section -->
    <section class="bg-gradient-to-r from-blue-700 via-blue-600 to-blue-700 py-3 text-white overflow-hidden shadow-md">
        <div class="marquee-container">
            <div class="marquee-content">
                <div class="flex items-center space-x-12">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="font-semibold">DigiMarkt Project is co-funded by the European Union with a total funding of €394,185.00</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="font-semibold">Empowering TVET providers to enhance digital readiness of graduates in Ghana</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="font-semibold">Supporting teachers and trainers with new digital skills and competences</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="font-semibold">Improving employability potential of TVET learners through innovative education programs</span>
                    </div>
                    <!-- Duplicate items to ensure continuous scrolling -->
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="font-semibold">DigiMarkt Project is co-funded by the European Union with a total funding of €394,185.00</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="font-semibold">Empowering TVET providers to enhance digital readiness of graduates in Ghana</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements Section -->
    @if(isset($announcements) && $announcements->count() > 0)
    <section class="py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center mb-3 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                    <h3 class="text-lg font-bold">ANNOUNCEMENTS</h3>
                </div>
                
                <div class="w-full md:w-auto overflow-hidden">
                    <div class="announcement-slider">
                        @foreach($announcements as $announcement)
                            <div class="announcement-slide px-4 py-2">
                                <span class="font-semibold">{{ $announcement->title }}</span> - 
                                <span>{{ Str::limit($announcement->content, 100) }}</span>
                                <a href="#announcement-{{ $announcement->id }}" class="text-white underline ml-2" data-bs-toggle="modal" data-bs-target="#announcementModal-{{ $announcement->id }}">Read more</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    
    <!-- Announcement Modals -->
    @foreach($announcements as $announcement)
        <div class="modal fade" id="announcementModal-{{ $announcement->id }}" tabindex="-1" aria-labelledby="announcementModalLabel-{{ $announcement->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                        <h5 class="modal-title" id="announcementModalLabel-{{ $announcement->id }}">{{ $announcement->title }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-sm text-gray-500 mb-2">Published: {{ $announcement->publish_date->format('F d, Y') }}</p>
                        <div class="prose max-w-none">
                            {!! nl2br(e($announcement->content)) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-900 via-purple-800 to-indigo-700 py-24 md:py-32">
        <!-- Animated Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute top-[10%] left-[5%] w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-[20%] right-[10%] w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-[10%] left-[20%] w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <div class="flex items-center mb-6">
                           <img src="{{ asset('assets/images/logo/eulogoNew.png') }}" alt="EU Logo" class="h-16 bg-white p-2 rounded-lg shadow-lg">
                    </div>
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                        Digital <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-cyan-300">Marketing</span> in TVET
                    </h1>
                    <p class="text-xl text-white text-opacity-90 mb-6 max-w-xl">
                        Towards Digital Marketing in Technical and Vocational Education and Training (DigiMarkt) in Ghana Project, co-funded by the European Union, with a total funding of €394,185.00
                    </p>
                    <p class="text-lg text-white text-opacity-80 mb-10 max-w-xl">
                        Empowering training providers and learners to enhance their digital readiness for Technical and Vocational Education and Training (TVET).
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('milestones') }}" class="px-8 py-4 bg-gradient-to-r from-teal-400 to-cyan-500 text-white font-semibold rounded-xl hover:from-teal-500 hover:to-cyan-600 transition-all duration-300 inline-block text-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <span class="flex items-center justify-center">
                                <span>Project Milestones</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                        <a href="{{ route('deliverables') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-indigo-800 transition-all duration-300 inline-block text-center transform hover:-translate-y-1">
                            <span class="flex items-center justify-center">
                                <span>View Deliverables</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl blur-lg opacity-30 transform rotate-3"></div>
                    <div class="relative z-10 rounded-2xl shadow-2xl transform -rotate-2 hover:rotate-0 transition-transform duration-500 bg-white p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Project Partners</h3>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('assets/images/logo/int@E_logo.png') }}" alt="Steinbeis Logo" class="h-12 mb-2">
                                <span class="text-xs text-gray-700 text-center">Steinbeis (Germany)</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('assets/images/logo/sua_logo.jpg') }}" alt="Slovak University of Agriculture Logo" class="h-12 mb-2">
                                <span class="text-xs text-gray-700 text-center">SUA (Slovakia)</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('assets/images/logo/aamusted.jpg') }}" alt="AAMUSTED Logo" class="h-12 mb-2">
                                <span class="text-xs text-gray-700 text-center">AAMUSTED (Ghana)</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('assets/images/logo/Bolga_logo.png') }}" alt="Bolgatanga Technical University Logo" class="h-12 mb-2">
                                <span class="text-xs text-gray-700 text-center">BTU (Ghana)</span>
                            </div>
                            <div class="flex flex-col items-center col-span-2 mx-auto">
                                <img src="{{ asset('assets/images/logo/CCTU_logo.png') }}" alt="Cape Coast Technical University Logo" class="h-12 mb-2">
                                <span class="text-xs text-gray-700 text-center">CCTU (Ghana)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Summary Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 z-0">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-10">
                    <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium mb-4">PROJECT SUMMARY</span>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">About DigiMarkt</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mx-auto mb-6"></div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        The aim of Digital Technical and Vocational Education and Training (DigiMarkt) in Ghana is to empower training providers and learners 
                        to enhance their digital readiness for Technical and Vocational Education and Training (TVET). 
                        By defining future skills needed for TVET graduates in the digital era and aligning such skills to the unique local Ghanaian Context will 
                        help achieve the project aim.
                    </p>
                    
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        The project will involve participants in co-creating DigiMarkt, as well as improving the skills of teachers/trainers 
                        and mentors on innovative tools, online pedagogies and teaching techniques, cutting–edge technologies and trends in DigiMarkt. 
                        The course will give opportunity to the youth, by empowering them in the use of digital transformation tools and model in order to practicalize 
                        technical and vocational education.
                    </p>
                    
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Project Objectives</h3>
                        <ul class="list-disc pl-6 space-y-2 text-gray-700">
                            <li>To support teachers and trainers with new digital skills and competences</li>
                            <li>To improve the level of competences, skills and employability potential of TVET learners by developing new and innovative TVET education programmes, especially those delivering key competences in ICT skills</li>
                            <li>To set up digital marketing laboratory to enable students interact and enhance students competency in Digital TVET marketing</li>
                            <li>To empower TVET providers to enhance the resilience and digital readiness of TVET graduates in Ghana</li>
                        </ul>
                    </div>
                    
                    <div class="mt-8 text-center">
                        <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1">
                            <span>Learn More About DigiMarkt</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5 z-0">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Platform Impact</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Our growing community and expanding resources</p>
            </div>
            
            <!-- Visitor Statistics -->
            <div class="mb-16">
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-6 shadow-lg">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="md:w-1/3 mb-6 md:mb-0">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Visitor Statistics</h3>
                            <p class="text-gray-600">Track our growing audience and engagement metrics</p>
                        </div>
                        <div class="md:w-2/3 grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-white rounded-xl p-4 shadow hover:shadow-md transition-shadow duration-300">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-indigo-600 mb-1">{{ number_format($visitorStats['total']) }}</div>
                                    <div class="text-sm text-gray-500">Total Visitors</div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl p-4 shadow hover:shadow-md transition-shadow duration-300">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-purple-600 mb-1">{{ number_format($visitorStats['today']) }}</div>
                                    <div class="text-sm text-gray-500">Today</div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl p-4 shadow hover:shadow-md transition-shadow duration-300">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600 mb-1">{{ number_format($visitorStats['week']) }}</div>
                                    <div class="text-sm text-gray-500">This Week</div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl p-4 shadow hover:shadow-md transition-shadow duration-300">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-teal-600 mb-1">{{ number_format($visitorStats['month']) }}</div>
                                    <div class="text-sm text-gray-500">This Month</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-indigo-100 text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-purple-600 mb-2 text-center">{{ $stats['users'] }}</div>
                    <div class="text-gray-600 text-center font-medium">Active Users</div>
                </div>
                
                <div class="p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-teal-100 text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-teal-500 to-cyan-500 mb-2 text-center">{{ $stats['documents'] }}</div>
                    <div class="text-gray-600 text-center font-medium">Resources</div>
                </div>
                
                <div class="p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                    </div>
                    <div class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-purple-500 to-pink-500 mb-2 text-center">{{ $stats['downloads'] }}</div>
                    <div class="text-gray-600 text-center font-medium">Downloads</div>
                </div>
                
                <div class="p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <div class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-blue-500 to-indigo-500 mb-2 text-center">{{ $stats['categories'] }}</div>
                    <div class="text-gray-600 text-center font-medium">Categories</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-20">
              
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium mb-4">KEY FEATURES</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Enhancing Digital Marketing in TVET</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    DigiMarkt provides comprehensive resources and cutting-edge tools designed to enhance digital marketing education in TVET institutions.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:opacity-80 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl w-16 h-16 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-indigo-600 transition-colors duration-300">Comprehensive Resources</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Access a wide range of digital marketing resources, guides, templates, and best practices to enhance your marketing strategy and drive results.
                        </p>
                        <a href="#" class="text-indigo-600 font-medium inline-flex items-center group-hover:text-indigo-800 transition-colors duration-300">
                            Learn more
                            <svg class="w-4 h-4 ml-2 group-hover:ml-3 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-teal-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:opacity-80 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="bg-gradient-to-r from-teal-500 to-cyan-500 rounded-2xl w-16 h-16 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-teal-600 transition-colors duration-300">Secure Document Access</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Securely access and download important deliverables and milestones with our authenticated system featuring two-factor authentication protection.
                        </p>
                        <a href="#" class="text-teal-600 font-medium inline-flex items-center group-hover:text-teal-800 transition-colors duration-300">
                            Learn more
                            <svg class="w-4 h-4 ml-2 group-hover:ml-3 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:opacity-80 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl w-16 h-16 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-purple-600 transition-colors duration-300">Advanced Analytics</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Powerful admin tools to manage users, track content performance, and analyze platform usage with detailed interactive analytics dashboards.
                        </p>
                        <a href="#" class="text-purple-600 font-medium inline-flex items-center group-hover:text-purple-800 transition-colors duration-300">
                            Learn more
                            <svg class="w-4 h-4 ml-2 group-hover:ml-3 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Project Activities Section -->
    <section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-purple-100 rounded-full opacity-30 z-0"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-indigo-100 rounded-full opacity-30 z-0"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-medium mb-4">PROJECT UPDATES</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Project Activities</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Stay updated with the latest activities and events from the DigiMarkt project
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($featuredActivities as $activity)
                    <div class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                        <!-- Activity Image -->
                        <div class="relative h-56 overflow-hidden">
                            @if($activity->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $activity->images->first()->image_path) }}" 
                                    alt="{{ $activity->title }}" 
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-purple-400 to-indigo-600 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm rounded-lg px-3 py-1 text-sm font-semibold {{ $activity->status === 'Completed' ? 'text-green-600' : ($activity->status === 'In Progress' ? 'text-blue-600' : 'text-orange-600') }}">
                                {{ $activity->status }}
                            </div>
                        </div>
                        
                        <!-- Activity Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors duration-300">{{ $activity->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4">{{ $activity->date }}</p>
                            <p class="text-gray-600 mb-6 line-clamp-3">{{ $activity->description }}</p>
                            <a href="{{ route('project.activities') }}" class="text-purple-600 font-medium inline-flex items-center group-hover:text-purple-800 transition-colors duration-300">
                                Read more
                                <svg class="w-4 h-4 ml-2 group-hover:ml-3 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-xl text-gray-500">No project activities available yet.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('project.activities') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold rounded-xl hover:from-purple-600 hover:to-indigo-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                    <span class="flex items-center justify-center">
                        <span>View All Project Activities</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Latest Resources Section -->
    <section class="py-24 bg-gray-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-100 rounded-full opacity-30 z-0"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-teal-100 rounded-full opacity-30 z-0"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-medium mb-4">FRESH CONTENT</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest Digital Marketing Resources</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore our most recent digital marketing resources, guides, and deliverables to stay ahead of the curve.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestDocuments as $document)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow transform hover:-translate-y-1 duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-primary-light bg-opacity-20 text-primary-dark rounded-full text-sm">
                                {{ $document->category ?? 'Uncategorized' }}
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ $document->created_at ? $document->created_at->format('M d, Y') : 'Date unavailable' }}
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $document->title }}</h3>
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($document->description ?? 'No description available', 100) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <a href="{{ route('deliverables') }}#document-{{ $document->id }}" class="text-primary-dark hover:text-primary font-medium inline-flex items-center">
                                View Details
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <div class="text-sm text-gray-500">
                                {{ $document->downloads ? $document->downloads->count() : '0' }} {{ Str::plural('download', $document->downloads ? $document->downloads->count() : 0) }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if(count($latestDocuments) === 0)
                <div class="col-span-3 text-center py-8">
                    <p class="text-gray-600">No documents available at the moment.</p>
                </div>
            @endif

            <div class="text-center mt-12">
                <a href="{{ route('deliverables') }}" class="px-6 py-3 bg-primary-dark text-white font-semibold rounded-md hover:bg-primary transition-colors inline-block">
                    View All Resources
                </a>
            </div>
        </div>
    </section>

    <!-- Project Milestones Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-green-100 rounded-full opacity-30 z-0"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-emerald-100 rounded-full opacity-30 z-0"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium mb-4">PROJECT PROGRESS</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Upcoming Project Milestones</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Track our progress and upcoming deliverables in the DigiMarkt project
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($upcomingMilestones as $milestone)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group border border-gray-100">
                        <div class="p-1 bg-gradient-to-r from-green-500 to-emerald-500"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $milestone->status === 'completed' ? 'bg-green-100 text-green-800' : ($milestone->status === 'in-progress' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800') }}">
                                    {{ ucfirst($milestone->status) }}
                                </span>
                                <span class="text-gray-500 text-sm">{{ $milestone->date }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-600 transition-colors duration-300">{{ $milestone->title }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $milestone->description }}</p>
                            
                            <div class="mb-6">
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Completion</span>
                                    <span>{{ $milestone->completion_percentage }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="h-2.5 rounded-full {{ $milestone->status === 'completed' ? 'bg-green-600' : 'bg-gradient-to-r from-green-500 to-emerald-500' }}" style="width: {{ $milestone->completion_percentage }}%"></div>
                                </div>
                            </div>
                            
                            @if($milestone->deliverables->isNotEmpty())
                                <div class="mb-4">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Deliverables:</h4>
                                    <ul class="space-y-1">
                                        @foreach($milestone->deliverables->take(2) as $deliverable)
                                            <li class="text-sm text-gray-600 flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $deliverable->title }}
                                            </li>
                                        @endforeach
                                        @if($milestone->deliverables->count() > 2)
                                            <li class="text-sm text-gray-500 italic">+ {{ $milestone->deliverables->count() - 2 }} more</li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                            
                            <a href="{{ route('milestones') }}" class="text-green-600 font-medium inline-flex items-center group-hover:text-green-800 transition-colors duration-300">
                                View details
                                <svg class="w-4 h-4 ml-2 group-hover:ml-3 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-xl text-gray-500">No upcoming milestones available yet.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('milestones') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-semibold rounded-xl hover:from-green-600 hover:to-emerald-600 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                    <span class="flex items-center justify-center">
                        <span>View All Project Milestones</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

 
    <!-- Testimonials Section -->
    <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-b from-indigo-50 to-transparent opacity-70 z-0"></div>
        <div class="absolute -top-10 left-1/4 w-32 h-32 bg-purple-100 rounded-full opacity-50 z-0 blur-xl"></div>
        <div class="absolute top-40 right-1/4 w-40 h-40 bg-teal-100 rounded-full opacity-50 z-0 blur-xl"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 bg-teal-100 text-teal-800 rounded-full text-sm font-medium mb-4">TESTIMONIALS</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">What Our Users Say</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-teal-500 to-cyan-500 mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Hear from digital marketing professionals who have transformed their strategies using our platform.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($testimonials as $testimonial)
                    <div class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                        <!-- Quote Icon -->
                        <div class="absolute -top-2 -right-2 text-gray-100 opacity-30 z-0">
                            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>
                        
                        <div class="relative z-10">
                            <p class="text-gray-700 italic mb-8 leading-relaxed text-lg">
                                "{{ $testimonial['content'] }}"
                            </p>
                            
                            <div class="flex items-center">
                                <div class="relative">
                                    <div class="absolute inset-0 rounded-full bg-gradient-to-r from-teal-500 to-cyan-500 blur-sm opacity-70 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="w-16 h-16 rounded-full border-2 border-white relative z-10 object-cover">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-gray-900 group-hover:text-teal-600 transition-colors duration-300">{{ $testimonial['name'] }}</h4>
                                    <p class="text-gray-600">{{ $testimonial['position'] }}, {{ $testimonial['company'] }}</p>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

   
    <!-- Two-Factor Authentication Promotion -->
    <section class="py-24 bg-gradient-to-r from-indigo-900 via-purple-800 to-indigo-700 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute -top-10 -right-10 w-72 h-72 bg-white opacity-5 rounded-full"></div>
            <div class="absolute bottom-10 left-10 w-40 h-40 bg-white opacity-5 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white opacity-5 rounded-full"></div>
        </div>
        
         

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-6xl mx-auto">
                <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-indigo-700 rounded-3xl p-2 shadow-2xl transform hover:scale-[1.01] transition-all duration-300">
                    <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-indigo-700 rounded-2xl overflow-hidden">
                        <div class="relative p-12 md:p-16 overflow-hidden">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 opacity-10">
                                <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <pattern id="cta-grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                                        </pattern>
                                    </defs>
                                    <rect width="100" height="100" fill="url(#cta-grid)" />
                                </svg>
                            </div>
                            
                            <!-- Floating Elements -->
                            <div class="absolute top-10 right-10 w-32 h-32 bg-white opacity-5 rounded-full blur-md"></div>
                            <div class="absolute bottom-10 left-10 w-24 h-24 bg-white opacity-5 rounded-full blur-md"></div>
                            
                            <div class="flex flex-col lg:flex-row items-center justify-between relative z-10">
                                <div class="lg:w-3/5 mb-10 lg:mb-0 lg:pr-16">
                                    <!-- <div class="flex items-center mb-6">
                                        <img src="{{ asset('assets/images/logo/digiMark_logo.jpg') }}" alt="DigiMarkt Logo" class="h-16 mr-4 rounded-lg">
                                        <img src="{{ asset('assets/images/logo/eulogoNew.png') }}" alt="EU Logo" class="h-12 bg-white p-2 rounded-lg">
                                    </div>-->
                                         <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">Ready to Transform Your Digital Marketing Strategy?</h2>
                                    <div class="w-24 h-1 bg-white opacity-50 mb-8"></div>
                                    <p class="text-xl text-white opacity-90 mb-10 leading-relaxed">
                                        Join thousands of marketers who have already elevated their skills and strategies with our premium resources, tools, and expert guidance.
                                    </p>
                                    
                                    <div class="flex flex-wrap gap-4 mb-8">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <span class="text-white">Premium Resources</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <span class="text-white">Expert Guidance</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <span class="text-white">Community Access</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="lg:w-2/5">
                                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8 border border-white border-opacity-20 shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                                        <h3 class="text-2xl font-bold text-white mb-6 text-center">Get Started Now</h3>
                                        <div class="space-y-4 mb-6">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center mr-3">
                                                    <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <span class="text-white">Instant access to all resources</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center mr-3">
                                                    <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <span class="text-white">Regular strategy updates</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center mr-3">
                                                    <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <span class="text-white">Priority support</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('register') }}" class="block w-full px-8 py-4 bg-white text-indigo-700 font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 text-center">
                                            Create Free Account
                                        </a>
                                        <p class="text-white text-opacity-80 text-sm text-center mt-4">No credit card required</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </section>

    <!-- Gallery Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute -top-24 -right-36 w-96 h-96 bg-pink-100 rounded-full opacity-30 z-0"></div>
        <div class="absolute -bottom-24 -left-36 w-96 h-96 bg-blue-100 rounded-full opacity-30 z-0"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 bg-pink-100 text-pink-800 rounded-full text-sm font-medium mb-4">VISUAL GALLERY</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Marketing Excellence Showcase</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-pink-500 to-blue-500 mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore visual examples of successful digital marketing campaigns and creative concepts.
                </p>
            </div>

            <!-- Gallery Grid with Dynamic Content -->
           

<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        @if($galleries->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($galleries as $gallery)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <a href="{{ route('gallery.show', $gallery->id) }}" class="block relative pb-[60%] overflow-hidden">
                            <img src="{{ asset('storage/' . $gallery->thumbnail_path) }}" alt="{{ $gallery->title }}" class="absolute inset-0 w-full h-full object-cover">
                        </a>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">
                                <a href="{{ route('gallery.show', $gallery->id) }}" class="hover:text-primary-dark">{{ $gallery->title }}</a>
                            </h3>
                            @if($gallery->description)
                                <p class="text-gray-600 mb-4 line-clamp-2">{{ $gallery->description }}</p>
                            @endif
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">{{ $gallery->images->count() }} photos</span>
                                <a href="{{ route('gallery.show', $gallery->id) }}" class="text-primary-dark hover:text-primary font-medium flex items-center">
                                    View Gallery
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8">
                {{ $galleries->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-4 text-xl font-medium text-gray-900">No galleries available</h3>
                <p class="mt-2 text-gray-500">Check back later for new photo galleries.</p>
            </div>
        @endif
    </div>
</div>
            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('gallery') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-pink-500 to-blue-500 text-white font-semibold rounded-xl hover:from-pink-600 hover:to-blue-600 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                    <span class="flex items-center justify-center">
                        <span>View Complete Gallery</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
   
@endsection
