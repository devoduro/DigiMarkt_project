<header class="fixed top-0 w-full bg-white shadow z-50" x-data="mobileMenu">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('assets/images/logo/digiMark_logo.jpg') }}" alt="DigiMarkt Logo" class="h-16 mr-2">
                            </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu" @click="toggle">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-2">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-dark px-1 py-2">Home</a>
                
                <!-- About Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>About</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Project Objective</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('partners') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Partners</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('management.board') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Management Board</a>
                        <div class="border-t border-gray-100"></div>
                    
                    </div>
                </div>
                
                <!-- Activities Link -->
                <a href="{{ route('project.activities') }}" class="text-gray-700 hover:text-primary-dark px-1 py-2">Activities</a>
                
                <!-- Work Packages Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Work Packages</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#WP1" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP1: Project Administration</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#WP2" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP2: Social Digital Entrepreneurship</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#WP3" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP3: Training Materials</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#WP4" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP4: Quality Evaluation</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#WP5" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP5: Project Impact</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('milestones') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All Work Packages</a>
                    </div>
                </div>
                
                <!-- Media Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Media</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('gallery') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gallery</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('videos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Videos</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('project.activities') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All Activities</a>
                    </div>
                </div>
                
                <!-- Deliverables and Milestones Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Deliverables and Milestones</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('deliverables') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Deliverables</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('milestones') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Milestones</a>
                    </div>
                </div>
                
                <!-- Digital Marketing Labs Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Digital Marketing Labs</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">About Labs</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('gallery') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lab Photos</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('project.activities') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lab Activities</a>
                    </div>
                </div>
                
                <!-- Newsletter Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Newsletter</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="docs/Newsletter_First_Issue_March_31_2025.pdf" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">1st Issue - March 31, 2025</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">2nd Issue - August 31, 2025</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">3rd Issue - December 31, 2025</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">4th Issue - April 30, 2026</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">5th Issue - August 31, 2026</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">6th Issue - December 31, 2026</a>
                    </div>
                </div>
                
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-dark px-1 py-2">Contact</a>
                
                @guest
                    <a href="{{ route('login') }}" class="ml-4 px-4 py-2 bg-primary-dark text-white rounded-md hover:bg-primary transition-colors">Login</a>
                @else
                    <div x-data="dropdown" class="relative">
                        <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="close" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin Dashboard</a>
                                <div class="border-t border-gray-100"></div>
                            @endif
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </nav>
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('assets/images/logo/eulogo8.jpg') }}" alt="DigiMarkt Logo" class="h-16 mr-2">
                            </a>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div x-show="open" class="md:hidden mt-4" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" @click.away="close">
            <nav class="flex flex-col space-y-1 bg-white rounded-lg shadow-lg p-4">
                <nav class="flex flex-col space-y-2 mt-4 pb-4">
                    <!-- Mobile Home Link -->
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">Home</a>
                    
                    <!-- Mobile About Dropdown -->
                    <div class="relative">
                        <button @click="toggleDropdown('about')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                            <span>About</span>
                            <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('about')}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="isDropdownOpen('about')" class="pl-4 mt-1 space-y-1">
                            <a href="{{ route('about') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Project Objective</a>
                            <a href="{{ route('partners') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Partners</a>
 
                            <a href="{{ route('management.board') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Management Board</a>
                        </div>
                    </div>
                    
                    <!-- Mobile Activities Link -->
                    <a href="{{ route('project.activities') }}" class="text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">Activities</a>
                    
                    <!-- Mobile Work Packages Dropdown -->
                    <div class="relative">
                        <button @click="toggleDropdown('work-packages')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                            <span>Work Packages</span>
                            <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('work-packages')}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        
                        <div x-show="isDropdownOpen('work-packages')" class="pl-4 mt-1 space-y-1">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#WP1" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP1: Project Administration</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#WP2" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP2: Social Digital Entrepreneurship</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#WP3" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP3: Training Materials</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#WP4" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP4: Quality Evaluation</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#WP5" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP5: Project Impact</a>
                            <a href="{{ route('milestones') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">All Work Packages</a>
                        </div>
                    </div>
                    
                    <!-- Mobile Media Dropdown -->
                    <div class="relative">
                        <button @click="toggleDropdown('media')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                            <span>Media</span>
                            <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('media')}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        
                        <div x-show="isDropdownOpen('media')" class="pl-4 mt-1 space-y-1">
                            <a href="{{ route('gallery') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Gallery</a>
                            <a href="{{ route('videos') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Videos</a>
                            <a href="{{ route('project.activities') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">All Activities</a>
                        </div>
                    </div>
                    
                    <!-- Mobile Deliverables and Milestones Dropdown -->
                    <div class="relative">
                        <button @click="toggleDropdown('deliverables-milestones')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                            <span>Deliverables and Milestones</span>
                            <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('deliverables-milestones')}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        
                        <div x-show="isDropdownOpen('deliverables-milestones')" class="pl-4 mt-1 space-y-1">
                            <a href="{{ route('deliverables') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Deliverables</a>
                            <a href="{{ route('milestones') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Milestones</a>
                        </div>
                    </div>
                    
                    <!-- Mobile Digital Marketing Labs Dropdown -->
                    <div class="relative">
                        <button @click="toggleDropdown('digital-labs')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                            <span>Digital Marketing Labs</span>
                            <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('digital-labs')}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        
                        <div x-show="isDropdownOpen('digital-labs')" class="pl-4 mt-1 space-y-1">
                            <a href="" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">About Labs</a>
                            <a href="{{ route('gallery') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Lab Photos</a>
                            <a href="{{ route('project.activities') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Lab Activities</a>
                        </div>
                    </div>
                    
                    <!-- Mobile Newsletter Dropdown -->
                    <div class="relative">
                        <button @click="toggleDropdown('newsletter')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                            <span>Newsletter</span>
                            <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('newsletter')}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        
                        <div x-show="isDropdownOpen('newsletter')" class="pl-4 mt-1 space-y-1">
                            <a href="docs/Newsletter_First_Issue_March_31_2025.pdf" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">1st Issue - March 31, 2025</a>
                            <a href="#" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">2nd Issue - August 31, 2025</a>
                            <a href="#" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">3rd Issue - December 31, 2025</a>
                            <a href="#" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">4th Issue - April 30, 2026</a>
                            <a href="#" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">5th Issue - August 31, 2026</a>
                            <a href="#" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">6th Issue - December 31, 2026</a>
                        </div>
                    </div>
                    
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">Contact</a>
                    
                </nav>
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">Register</a>
                    @endif
                @else
                    <div class="relative">
                        <button @click="toggleDropdown('user')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('user')}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="isDropdownOpen('user')" class="pl-4 mt-1 space-y-1">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Admin Dashboard</a>
                            @endif
                            <a href="{{ route('profile') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Logout</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </nav>
        </div>
    </div>
</header>

<!-- Work Package Modals -->
<!-- WP1 Modal -->
<div class="modal fade" id="WP1" tabindex="-1" aria-labelledby="WP1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                <h5 class="modal-title" id="WP1Label">WP1: Project Administration and Coordination</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="prose max-w-none">
                    <p class="font-medium text-lg mb-4">The project is structured into 5 work packages, 2 of which deal with the development of the work, and 3 dealing with cross-cutting aspects such as management, quality assurance, dissemination and impact.</p>
                    
                    <h3 class="text-xl font-bold text-primary-dark mb-3">WP1: Project Administration and Coordination</h3>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Tasks:</h4>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><span class="font-medium">T1.1</span> Initial Meeting to kick off the project</li>
                            <li><span class="font-medium">T1.2</span> Management and monitoring meeting</li>
                            <li><span class="font-medium">T1.3</span> Project report, midterm and final reports</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('milestones') }}" class="btn btn-primary">View Milestones</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- WP2 Modal -->
<div class="modal fade" id="WP2" tabindex="-1" aria-labelledby="WP2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                <h5 class="modal-title" id="WP2Label">WP2: Social Digital Entrepreneurship and Needs Analysis</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="prose max-w-none">
                    <h3 class="text-xl font-bold text-primary-dark mb-3">WP2: Social Digital Entrepreneurship and Needs Analysis</h3>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Tasks:</h4>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><span class="font-medium">T2.1</span> Field research and data collection</li>
                            <li><span class="font-medium">T2.2</span> Project questionnaire analysis and definition</li>
                            <li><span class="font-medium">T2.3</span> Road map for project implementation and reports delivery</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('milestones') }}" class="btn btn-primary">View Milestones</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- WP3 Modal -->
<div class="modal fade" id="WP3" tabindex="-1" aria-labelledby="WP3Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                <h5 class="modal-title" id="WP3Label">WP3: Training Materials and Mentorship</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="prose max-w-none">
                    <h3 class="text-xl font-bold text-primary-dark mb-3">WP3: Training Materials and Mentorship</h3>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Tasks:</h4>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><span class="font-medium">T3.1</span> Purchase equipment, design and Establish Training labs</li>
                            <li><span class="font-medium">T3.2</span> Transfer of EU experience and Staff Training</li>
                            <li><span class="font-medium">T3.3</span> Design training courses and learning materials</li>
                            <li><span class="font-medium">T3.4</span> Develop an innovation model for academia-industry collaboration</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('milestones') }}" class="btn btn-primary">View Milestones</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- WP4 Modal -->
<div class="modal fade" id="WP4" tabindex="-1" aria-labelledby="WP4Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                <h5 class="modal-title" id="WP4Label">WP4: Quality Evaluation and Assurance</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="prose max-w-none">
                    <h3 class="text-xl font-bold text-primary-dark mb-3">WP4: Quality Evaluation and Assurance</h3>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Tasks:</h4>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><span class="font-medium">T4.1</span> Develop a quality plan</li>
                            <li><span class="font-medium">T4.2</span> Evaluate and monitor project activities</li>
                            <li><span class="font-medium">T4.3</span> Evaluate impact and external reports</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('milestones') }}" class="btn btn-primary">View Milestones</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- WP5 Modal -->
<div class="modal fade" id="WP5" tabindex="-1" aria-labelledby="WP5Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                <h5 class="modal-title" id="WP5Label">WP5: Project Impact and Dissemination</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="prose max-w-none">
                    <h3 class="text-xl font-bold text-primary-dark mb-3">WP5: Project Impact and Dissemination</h3>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Tasks:</h4>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><span class="font-medium">T5.1</span> Develop project web site</li>
                            <li><span class="font-medium">T5.2</span> Dissemination planning</li>
                            <li><span class="font-medium">T5.3</span> Organize workshops and conferences</li>
                            <li><span class="font-medium">T5.4</span> Sustainable planning</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('milestones') }}" class="btn btn-primary">View Milestones</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
