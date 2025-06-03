@extends('layouts.app')

@section('title', 'Management Board')

@section('content')
<div class="bg-white py-12">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">DigiMarkt Management Board</h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Meet the dedicated team of professionals leading the Digital Marketing and Entrepreneurship Training for improved TVET Outcomes in Ghana project.
            </p>
        </div>

        <!-- Project Coordinator Section -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Project Coordination</h2>
            <div class="flex flex-col items-center">
                <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden mb-8 transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="w-40 h-40 rounded-full overflow-hidden flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                                <img src="{{ asset('assets/images/management/placeholder.svg') }}" alt="Project Coordinator" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow text-center md:text-left">
                                <h3 class="text-xl font-bold text-gray-800">Jonathan Barth</h3>
                                <p class="text-primary-dark font-semibold mb-2">Project Coordinator</p>
                                <p class="text-gray-600 mb-4">Steinbeis Beratungszentren GmbH, Germany</p>
                                <div class="flex justify-center md:justify-start space-x-3">
                                    <a href="mailto:jonathan.barth@steinbeis-mediation.com" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <a href="tel:+4934122513118" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Board Members -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Board Members</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Board Member 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                <img src="{{ asset('assets/images/management/placeholder.svg') }}" alt="Riyadh Qashi" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800">Riyadh Qashi</h3>
                                <p class="text-primary-dark font-semibold mb-2">Board Member</p>
                                <p class="text-gray-600 mb-4">Int@E UG, Germany</p>
                                <div class="flex justify-center space-x-3">
                                    <a href="mailto:riyadh.qashi@intate.de" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Board Member 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                <img src="{{ asset('assets/images/management/placeholder.svg') }}" alt="Benjamin Asunka" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800">Benjamin Asunka</h3>
                                <p class="text-primary-dark font-semibold mb-2">Board Member</p>
                                <p class="text-gray-600 mb-4">BTU, Ghana</p>
                                <div class="flex justify-center space-x-3">
                                    <a href="mailto:benjamin.asunka@btu.edu.gh" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Board Member 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                <img src="{{ asset('assets/images/management/placeholder.svg') }}" alt="Wisdom W. K. Pomegbe" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800">Wisdom W. K. Pomegbe</h3>
                                <p class="text-primary-dark font-semibold mb-2">Board Member</p>
                                <p class="text-gray-600 mb-4">CCTU, Ghana</p>
                                <div class="flex justify-center space-x-3">
                                    <a href="mailto:wisdom.pomegbe@cctu.edu.gh" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Board Member 4 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                <img src="{{ asset('assets/images/management/placeholder.svg') }}" alt="Yarhands Dissou Arthur" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800">Prof. Yarhands Dissou Arthur</h3>
                                <p class="text-primary-dark font-semibold mb-2">Board Member</p>
                                <p class="text-gray-600 mb-4">AAMUSTED, Ghana</p>
                                <div class="flex justify-center space-x-3">
                                    <a href="mailto:ydarthur@aamusted.edu.gh" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <a href="tel:+233244071973" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Board Member 5 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                <img src="{{ asset('assets/images/management/placeholder_female.svg') }}" alt="Jana Gálová" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800">Dr. Jana Gálová</h3>
                                <p class="text-primary-dark font-semibold mb-2">Board Member</p>
                                <p class="text-gray-600 mb-4">Slovak University of Agriculture in Nitra, Slovakia</p>
                                <div class="flex justify-center space-x-3">
                                    <a href="mailto:jana.galova@uniag.sk" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Management Team -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center border-b pb-2">Project Management Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                <img src="{{ asset('assets/images/management/placeholder.svg') }}" alt="Jonathan Barth" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800">Jonathan Barth</h3>
                                <p class="text-primary-dark font-semibold mb-2">Project Coordinator</p>
                                <p class="text-gray-600 mb-4">Steinbeis Beratungszentren GmbH, Germany</p>
                                <div class="flex justify-center space-x-3">
                                    <a href="mailto:jonathan.barth@steinbeis-mediation.com" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <a href="tel:+4934122513118" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                <img src="{{ asset('assets/images/management/placeholder.svg') }}" alt="Riyadh Qashi" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800">Riyadh Qashi</h3>
                                <p class="text-primary-dark font-semibold mb-2">Project Manager</p>
                                <p class="text-gray-600 mb-4">Int@E UG, Germany</p>
                                <div class="flex justify-center space-x-3">
                                    <a href="mailto:riyadh.qashi@intate.de" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                <img src="{{ asset('assets/images/management/placeholder.svg') }}" alt="Benjamin Asunka" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800">Benjamin Asunka</h3>
                                <p class="text-primary-dark font-semibold mb-2">Project Manager</p>
                                <p class="text-gray-600 mb-4">BTU, Ghana</p>
                                <div class="flex justify-center space-x-3">
                                    <a href="mailto:benjamin.asunka@btu.edu.gh" class="text-gray-600 hover:text-primary-dark">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Announcements Section -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center border-b pb-2">ANNOUNCEMENTS</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Announcement 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Digital Marketing Training in Slovakia</h3>
                            <hr class="my-2">
                            <p class="text-gray-600 mb-4">
                                We are glad to announce the project's maiden Digital Marketing Training at the Slovak University of Agriculture in Nitra, Slovakia. Check our image gallery for details.
                            </p>
                            <div class="mt-auto pt-4 flex justify-between items-center">
                                <p class="text-sm font-semibold">April 28, 2025</p>
                                <div class="flex items-center">
                                    <span class="bg-primary-light text-primary-dark rounded-full px-2 py-1 text-xs mr-1">3</span>
                                    <i class="fas fa-thumbs-up text-primary-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Announcement 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Project Kick-Off Meeting in Germany</h3>
                            <hr class="my-2">
                            <p class="text-gray-600 mb-4">
                                The key stakeholders of the DigiMarkt Project gathered in Germany on February 7 - 8, 2025 for a kick-off meeting. This meeting was to officially commence the project. Check our image gallery for details.
                            </p>
                            <div class="mt-auto pt-4 flex justify-between items-center">
                                <p class="text-sm font-semibold">February 9, 2025</p>
                                <div class="flex items-center">
                                    <span class="bg-primary-light text-primary-dark rounded-full px-2 py-1 text-xs mr-1">2</span>
                                    <i class="fas fa-thumbs-up text-primary-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Announcement 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Application for External Evaluator</h3>
                            <hr class="my-2">
                            <p class="text-gray-600 mb-4">
                                We are glad to announce for applications from qualified applicants for the position of Project External Evaluator. Please download the attached terms of reference for details.
                            </p>
                            <div class="flex justify-center mb-4">
                                <a href="{{ asset('assets/docs/TERMS_OF_REFERENCE_DigiMarkt_evaluation_V02.pdf') }}" download class="bg-primary-dark hover:bg-primary text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                    <i class="fas fa-download mr-2"></i>
                                    <span>Terms of Reference</span>
                                </a>
                            </div>
                            <div class="mt-auto pt-4 flex justify-between items-center">
                                <p class="text-sm font-semibold">January 15, 2025</p>
                                <div class="flex items-center">
                                    <span class="bg-primary-light text-primary-dark rounded-full px-2 py-1 text-xs mr-1">1</span>
                                    <i class="fas fa-thumbs-up text-primary-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- EU Funding Information -->
        <div class="bg-blue-900 text-white rounded-lg p-6 mb-12">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/4 mb-4 md:mb-0 flex justify-center">
                    <img src="{{ asset('assets/images/eu-logo-new.svg') }}" alt="EU Logo" class="h-24">
                </div>
                <div class="md:w-3/4 md:pl-6">
                    <h3 class="text-xl font-bold mb-2">EU Funding Information</h3>
                    <p class="mb-2">This project has been funded with support from the European Commission under the Erasmus+ Programme.</p>
                    <p class="text-sm">Project Number: 2021-1-DE02-KA220-VET-000033042</p>
                    <p class="text-sm">Grant Amount: €394,185.00</p>
                    <p class="text-xs mt-2">This publication reflects the views only of the authors, and the Commission cannot be held responsible for any use which may be made of the information contained therein.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
