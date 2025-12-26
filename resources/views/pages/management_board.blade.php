@extends('layouts.app')

@section('title', 'Management Board - DigiMarkt')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-700 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Management Board</h1>
                <p class="text-xl opacity-90">Meet the leadership team driving the DigiMarkt project forward</p>
            </div>
        </div>
    </div>

    <!-- Management Board Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <!-- Project Coordinator -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Project Coordinator</h2>
                <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <i class="fas fa-user text-4xl text-gray-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Jonathan Barth</h3>
                        <p class="text-blue-600 font-semibold mb-4">Project Coordinator</p>
                        <p class="text-gray-600 mb-4">Steinbeis Beratungszentren GmbH</p>
                        <div class="flex justify-center space-x-4">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Project Management</span>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Coordination</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Partner Institution Leaders -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Partner Institution Leaders</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- European Partners -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-2xl text-gray-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Jana Gálová</h3>
                            <p class="text-blue-600 font-semibold mb-2">Slovak University of Agriculture</p>
                            <p class="text-gray-600 text-sm mb-4">Slovakia</p>
                            <div class="flex justify-center">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">EU Partner</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-2xl text-gray-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Jonathan Barth</h3>
                            <p class="text-blue-600 font-semibold mb-2">Steinbeis Beratungszentren GmbH</p>
                            <p class="text-gray-600 text-sm mb-4">Germany</p>
                            <div class="flex justify-center">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">EU Partner</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-2xl text-gray-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Riyadh Qashi</h3>
                            <p class="text-blue-600 font-semibold mb-2">Innovative Technologies and Education</p>
                            <p class="text-gray-600 text-sm mb-4">Germany</p>
                            <div class="flex justify-center">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">EU Partner</span>
                            </div>
                        </div>
                    </div>

                    <!-- Ghanaian Partners -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-2xl text-gray-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Prof. Yarhands Dissou Arthur</h3>
                            <p class="text-green-600 font-semibold mb-2">Akenten Appiah-Menka University</p>
                            <p class="text-gray-600 text-sm mb-4">Ghana</p>
                            <div class="flex justify-center">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Ghana Partner</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-2xl text-gray-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Benjamin Asunka</h3>
                            <p class="text-green-600 font-semibold mb-2">Bolgatanga Technical University</p>
                            <p class="text-gray-600 text-sm mb-4">Ghana</p>
                            <div class="flex justify-center">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Ghana Partner</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-2xl text-gray-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Wisdom W.K. Pomegbe</h3>
                            <p class="text-green-600 font-semibold mb-2">Cape Coast Technical University</p>
                            <p class="text-gray-600 text-sm mb-4">Ghana</p>
                            <div class="flex justify-center">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Ghana Partner</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Governance Structure -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Governance Structure</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-users text-2xl text-blue-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Steering Committee</h3>
                        </div>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                Strategic decision making
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                Project oversight and governance
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                Quality assurance
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                Risk management
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-cogs text-2xl text-green-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Working Groups</h3>
                        </div>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                Technical implementation
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                Curriculum development
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                Training coordination
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                Dissemination activities
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Get in Touch</h2>
                    <p class="text-gray-600 mb-6">For inquiries about project governance or partnership opportunities</p>
                    <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
                        <a href="mailto:management@digimarkt-project.eu" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            Contact Management Board
                        </a>
                        <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg border border-blue-600 hover:bg-blue-50 transition duration-300 flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            General Contact
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
