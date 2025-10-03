@extends('layouts.app')

@section('title', 'About Us')

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
                <span class="inline-block px-4 py-1 bg-white bg-opacity-20 backdrop-blur-sm text-white rounded-full text-sm font-medium mb-6">About DigiMarkt</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-6">
                    Towards Digital Marketing in Technical and Vocational Education and Training in Ghana
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-teal-400 to-cyan-400 mx-auto mb-8"></div>
                <p class="text-xl text-white text-opacity-90 mb-8 max-w-3xl mx-auto">
                    DigiMarkt is a collaborative project co-funded by the European Union with a total funding of €394,185.00
                </p>
            </div>
        </div>
    </section>

    <!-- Project Overview Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Project Summary</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mb-8"></div>
                    <div class="prose prose-lg max-w-none">
                        <p>
                            The aim of Digital Technical and Vocational Education and Training (DigiMarkt) in Ghana is to empower training providers and learners 
                            to enhance their digital readiness for Technical and Vocational Education and Training (TVET). 
                            By defining future skills needed for TVET graduates in the digital era and aligning such skills to the unique local Ghanaian Context will 
                            help achieve the project aim.
                        </p>
                        <p>
                            The project will involve participants in co-creating DigiMarkt, as well as improving the skills of teachers/trainers 
                            and mentors on innovative tools, online pedagogies and teaching techniques, cutting–edge technologies and trends in DigiMarkt. 
                            The course will give opportunity to the youth, by empowering them in the use of digital transformation tools and model in order to practicalize 
                            technical and vocational education.
                        </p>
                        <p>
                            For the purposes of skills transfer for interested institutions and organizations that are willing to reinforce 
                            capacity and attractiveness of TVET, the DIGIMARKT approach will be available for the public to ensure sustainability. Further to the project 
                            sustainability plan, an online micro learning unit on DIGIMARKT will be available to all interested organizations and learners in English by the 
                            project partners.
                        </p>
                        <p>
                            The project will be a two-year duration, and will be implemented by Steinbeis Beratungszentrum (SBZ), Slovak University of Agriculture, 
                            Int@E Akenten Appiah-Menka University of Skills Training and Entrepreneurial Development (AAMUSTED), Bolgatanga Technical University (BTU), 
                            Cape- Coast Technical University (CCTU).
                        </p>
                    </div>
                </div>

                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Project Aim and Objectives</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mb-8"></div>
                    
                    <!-- Project Aim -->
                    <div class="bg-indigo-50 rounded-2xl p-8 shadow-lg mb-8 border border-indigo-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            Project Aim
                        </h3>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            The aim of the DigiMarkt Project in Ghana, is to empower training providers and learners to enhance their digital readiness for Technical and Vocational Education and Training (TVET).
                        </p>
                    </div>

                    <!-- Project Objectives -->
                    <div class="bg-gray-50 rounded-2xl p-8 shadow-lg">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Project Objectives</h3>
                        <ul class="space-y-6">
                            <li class="flex">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                    <span class="text-white font-bold text-xl">1</span>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Support Teachers and Trainers</h3>
                                    <p class="text-gray-700">To support teachers and trainers with new digital skills and competences</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                    <span class="text-white font-bold text-xl">2</span>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Improve Competences and Skills</h3>
                                    <p class="text-gray-700">To improve the level of competences, skills and employability potential of TVET learners by developing new and innovative TVET education programmes, especially those delivering key competences in ICT skills.</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                    <span class="text-white font-bold text-xl">3</span>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Digital Marketing Laboratory</h3>
                                    <p class="text-gray-700">To set up digital marketing laboratory to enable students interact and enhance students competency in Digital TVET marketing.</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                    <span class="text-white font-bold text-xl">4</span>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Empower TVET Providers</h3>
                                    <p class="text-gray-700">To empower TVET providers to enhance the resilience and digital readiness of TVET graduates in Ghana.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Project Partners</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600">Collaborating institutions making DigiMarkt possible</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">European Partners</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Steinbeis Beratungszentrum (SBZ)</h4>
                                    <p class="text-gray-600">Germany</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Slovak University of Agriculture</h4>
                                    <p class="text-gray-600">Slovakia</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Ghanaian Partners</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Akenten Appiah-Menka University of Skills Training and Entrepreneurial Development (AAMUSTED)</h4>
                                    <p class="text-gray-600">Ghana</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Bolgatanga Technical University (BTU)</h4>
                                    <p class="text-gray-600">Ghana</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Cape-Coast Technical University (CCTU)</h4>
                                    <p class="text-gray-600">Ghana</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EU Disclaimer Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-indigo-50 rounded-2xl p-8 border border-indigo-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Disclaimer</h3>
                    <p class="text-gray-700">
                        This project has been funded with support from the European Union. This publication reflects the views only of the author, 
                        and the EU cannot be held responsible for any use which may be made of the information contained therein.
                    </p>
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
