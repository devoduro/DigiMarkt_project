<footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Project Info -->
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <h2 class="text-2xl font-bold mb-4 text-gradient-primary">DigiMarkt</h2>
                <p class="text-gray-300 mb-4">Digital Marketing Skills for TVET Institutions in Ghana</p>
                <div class="flex items-center mb-4 bg-blue-900 p-3 rounded-lg">
                    <img src="{{ asset('assets/images/logo/eulogoNew.png') }}" alt="EU Logo" class="h-12 mr-3">
                    
                </div>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/DigiMarktProject" class="text-gray-300 hover:text-white" target="_blank" rel="noopener">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"></path>
                        </svg>
                    </a>
                    <a href="https://twitter.com/DigiMarktTVET" class="text-gray-300 hover:text-white" target="_blank" rel="noopener">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/digimarkt_tvet/" class="text-gray-300 hover:text-white" target="_blank" rel="noopener">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-span-1 md:col-span-1">
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">About</a></li>
                    <li><a href="{{ route('project.activities') }}" class="text-gray-300 hover:text-white">Project Activities</a></li>
                    <li><a href="{{ route('milestones') }}" class="text-gray-300 hover:text-white">Milestones</a></li>
                    <li><a href="{{ route('deliverables') }}" class="text-gray-300 hover:text-white">Deliverables</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Partner Institutions -->
            <div class="col-span-1 md:col-span-1">
                <h3 class="text-lg font-semibold mb-4">Partner Institutions</h3>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <a href="https://www.steinbeis.de" target="_blank" rel="noopener" class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/logo/int@E_logo.png') }}" alt="Steinbeis Logo" class="h-12 mb-2 bg-white p-1 rounded">
                        <span class="text-xs text-gray-300 text-center">Steinbeis</span>
                    </a>
                    <a href="https://www.uniag.sk/en/" target="_blank" rel="noopener" class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/logo/sua_logo.jpg') }}" alt="Slovak University of Agriculture Logo" class="h-12 mb-2 bg-white p-1 rounded">
                        <span class="text-xs text-gray-300 text-center">SUA</span>
                    </a>
                    <a href="https://aamusted.edu.gh" target="_blank" rel="noopener" class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/logo/aamusted.jpg') }}" alt="AAMUSTED Logo" class="h-12 mb-2 bg-white p-1 rounded">
                        <span class="text-xs text-gray-300 text-center">AAMUSTED</span>
                    </a>
                    <a href="https://btu.edu.gh" target="_blank" rel="noopener" class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/logo/Bolga_logo.png') }}" alt="Bolgatanga Technical University Logo" class="h-12 mb-2 bg-white p-1 rounded">
                        <span class="text-xs text-gray-300 text-center">BTU</span>
                    </a>
                    <a href="https://cctu.edu.gh" target="_blank" rel="noopener" class="flex flex-col items-center">
                        <img src="{{ asset('assets/images/logo/CCTU_logo.png') }}" alt="Cape Coast Technical University Logo" class="h-12 mb-2 bg-white p-1 rounded">
                        <span class="text-xs text-gray-300 text-center">CCTU</span>
                    </a>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-span-1 md:col-span-1">
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 mr-2 text-primary-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-gray-300">AAMUSTED, Kumasi Campus, Ghana</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 mr-2 text-primary-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-gray-300">info@digimarkt.aamusted.edu.gh</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 mr-2 text-primary-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="text-gray-300">+233 302 123 456</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 w-full">
                <div>
                    <h4 class="text-md font-semibold text-white mb-3">EU Funding Disclaimer</h4>
                    <p class="text-sm text-gray-400">This project has been funded with support from the European Commission. This publication reflects the views only of the author, and the Commission cannot be held responsible for any use which may be made of the information contained therein.</p>
                </div>
                <div>
                    <h4 class="text-md font-semibold text-white mb-3">Project Objective</h4>
                    <p class="text-sm text-gray-400">To empower TVET providers and learners in Ghana with digital marketing skills, enabling them to effectively promote their products and services in the digital marketplace.</p>
                </div>
            </div>
            <div class="text-center pt-4 border-t border-gray-800">
                <p class="text-gray-400">&copy; {{ date('Y') }} DigiMarkt Project. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
