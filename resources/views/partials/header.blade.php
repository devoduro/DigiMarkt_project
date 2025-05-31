<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-primary-dark">
                    DigiMarkt Platform
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu" x-data="{ open: false }" @click="open = !open">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-dark">Home</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary-dark">About</a>
                <a href="{{ route('resources') }}" class="text-gray-700 hover:text-primary-dark">Resources</a>
                <a href="{{ route('project.activities') }}" class="text-gray-700 hover:text-primary-dark">Project Activities</a>
                <a href="{{ route('milestones') }}" class="text-gray-700 hover:text-primary-dark">Milestones</a>
                <a href="{{ route('deliverables') }}" class="text-gray-700 hover:text-primary-dark">Deliverables</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-dark">Contact</a>
                
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-primary-dark text-white rounded-md hover:bg-primary transition-colors">Login</a>
                @else
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center text-gray-700 focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin Dashboard</a>
                            @endif
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </nav>
        </div>
        
        <!-- Mobile Navigation -->
        <div x-data="{ open: false }" x-show="open" class="md:hidden mt-4">
            <nav class="flex flex-col space-y-2">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-dark py-2">Home</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary-dark py-2">About</a>
                <a href="{{ route('resources') }}" class="text-gray-700 hover:text-primary-dark py-2">Resources</a>
                <a href="{{ route('project.activities') }}" class="text-gray-700 hover:text-primary-dark py-2">Project Activities</a>
                <a href="{{ route('milestones') }}" class="text-gray-700 hover:text-primary-dark py-2">Milestones</a>
                <a href="{{ route('deliverables') }}" class="text-gray-700 hover:text-primary-dark py-2">Deliverables</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-dark py-2">Contact</a>
                
                @guest
                    <a href="{{ route('login') }}" class="inline-block px-4 py-2 bg-primary-dark text-white rounded-md hover:bg-primary transition-colors">Login</a>
                @else
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-primary-dark py-2">Admin Dashboard</a>
                    @endif
                    <a href="{{ route('profile') }}" class="text-gray-700 hover:text-primary-dark py-2">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-primary-dark py-2">Logout</button>
                    </form>
                @endguest
            </nav>
        </div>
    </div>
</header>
