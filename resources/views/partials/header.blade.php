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
                        <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Project Overview</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('management.board') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Management Board</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('partners') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Partners</a>
                    </div>
                </div>
                
                <!-- Activities Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Activities</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('project.activities') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Project Activities</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('gallery') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gallery</a>
                    </div>
                </div>
                
                <!-- Work Packages Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Work Packages</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('milestones') }}?wp=1" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP1: Project Management</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('milestones') }}?wp=2" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP2: Curriculum Development</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('milestones') }}?wp=3" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP3: Capacity Building</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('milestones') }}?wp=4" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">WP4: Dissemination</a>
                    </div>
                </div>
                
                <!-- Media Labs Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Media</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('resources') }}?category=labs&lab=aamusted" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">AAMUSTED Media Lab</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('resources') }}?category=labs&lab=ucc" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">UCC Media Lab</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('resources') }}?category=labs&lab=uew" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">UEW Media Lab</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('resources') }}?category=labs&lab=knust" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">KNUST Media Lab</a>
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

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('resources') }}?category=digital-labs&lab=aamusted" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">AAMUSTED Digital Marketing Lab</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('resources') }}?category=digital-labs&lab=ucc" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">UCC Digital Marketing Lab</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('resources') }}?category=digital-labs&lab=uew" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">UEW Digital Marketing Lab</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('resources') }}?category=digital-labs&lab=knust" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">KNUST Digital Marketing Lab</a>
                    </div>
                </div>
                
                    
                <!-- Deliverables & Milestones Dropdown -->
                <div x-data="dropdown" class="relative">
                    <button @click="toggle" class="flex items-center text-gray-700 hover:text-primary-dark px-1 py-2 focus:outline-none">
                        <span>Deliverables</span>
                        <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('deliverables') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All Deliverables</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('milestones') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Project Milestones</a>
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

                    <div x-show="open" @click.away="close" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="{{ route('resources') }}?category=newsletter&year=2025" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">2025 Newsletters</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('resources') }}?category=newsletter&year=2024" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">2024 Newsletters</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('resources') }}?category=newsletter&year=2023" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">2023 Newsletters</a>
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
                        <a href="{{ route('about') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Project Overview</a>
                        <a href="{{ route('management.board') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Management Board</a>
                        <a href="{{ route('partners') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Partners</a>
                    </div>
                </div>
                

                
                <!-- Mobile Activities Dropdown -->
                <div class="relative">
                    <button @click="toggleDropdown('activities')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                        <span>Activities</span>
                        <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('activities')}" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="isDropdownOpen('activities')" class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('project.activities') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Project Activities</a>
                        <a href="{{ route('gallery') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Gallery</a>
                    </div>
                </div>
                
                <!-- Mobile Work Packages Dropdown -->
                <div class="relative">
                    <button @click="toggleDropdown('workpackages')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                        <span>Work Packages</span>
                        <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('workpackages')}" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="isDropdownOpen('workpackages')" class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('milestones') }}?wp=1" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP1: Project Management</a>
                        <a href="{{ route('milestones') }}?wp=2" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP2: Curriculum Development</a>
                        <a href="{{ route('milestones') }}?wp=3" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP3: Capacity Building</a>
                        <a href="{{ route('milestones') }}?wp=4" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">WP4: Dissemination</a>
                    </div>
                </div>
                
                <!-- Mobile Media Labs Dropdown -->
                <div class="relative">
                    <button @click="toggleDropdown('medialabs')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                        <span>Media Labs</span>
                        <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('medialabs')}" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="isDropdownOpen('medialabs')" class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('resources') }}?category=labs&lab=aamusted" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">AAMUSTED Media Lab</a>
                        <a href="{{ route('resources') }}?category=labs&lab=ucc" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">UCC Media Lab</a>
                        <a href="{{ route('resources') }}?category=labs&lab=uew" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">UEW Media Lab</a>
                        <a href="{{ route('resources') }}?category=labs&lab=knust" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">KNUST Media Lab</a>
                    </div>
                </div>
                
                <!-- Mobile Digital Marketing Labs Dropdown -->
                <div class="relative">
                    <button @click="toggleDropdown('digitallabs')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                        <span>Digital Marketing Labs</span>
                        <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('digitallabs')}" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="isDropdownOpen('digitallabs')" class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('resources') }}?category=digital-labs&lab=aamusted" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">AAMUSTED Digital Marketing Lab</a>
                        <a href="{{ route('resources') }}?category=digital-labs&lab=ucc" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">UCC Digital Marketing Lab</a>
                        <a href="{{ route('resources') }}?category=digital-labs&lab=uew" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">UEW Digital Marketing Lab</a>
                        <a href="{{ route('resources') }}?category=digital-labs&lab=knust" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">KNUST Digital Marketing Lab</a>
                    </div>
                </div>
                
                <!-- Mobile Deliverables Dropdown -->
                <div class="relative">
                    <button @click="toggleDropdown('deliverables')" class="w-full flex justify-between items-center text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">
                        <span>Deliverables</span>
                        <svg class="h-5 w-5 ml-1" :class="{'transform rotate-180': isDropdownOpen('deliverables')}" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="isDropdownOpen('deliverables')" class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('deliverables') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">All Deliverables</a>
                        <a href="{{ route('milestones') }}" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">Project Milestones</a>
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
                        <a href="{{ route('resources') }}?category=newsletter&year=2025" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">2025 Newsletters</a>
                        <a href="{{ route('resources') }}?category=newsletter&year=2024" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">2024 Newsletters</a>
                        <a href="{{ route('resources') }}?category=newsletter&year=2023" class="block text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2">2023 Newsletters</a>
                    </div>
                </div>
                
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-dark hover:bg-gray-50 rounded px-3 py-2 font-medium">Contact</a>
                
                <div class="pt-2 mt-2 border-t border-gray-200">
                    @guest
                        <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 bg-primary-dark text-white rounded-md hover:bg-primary transition-colors">Login</a>
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
                </div>
            </nav>
        </div>
    </div>
</header>
