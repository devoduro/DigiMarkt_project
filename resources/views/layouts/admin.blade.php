<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - {{ config('app.name', 'Digital Marketing Platform') }}</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#4ade80',
                            DEFAULT: '#22c55e',
                            dark: '#16a34a',
                        },
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js for admin analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    @yield('styles')
</head>
<body class="bg-gray-100 min-h-screen" x-data="{ sidebarOpen: window.innerWidth >= 1024 }" @resize.window="sidebarOpen = window.innerWidth >= 1024">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-gray-900 lg:translate-x-0 lg:static lg:inset-0 transition duration-300 ease-in-out"
             :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <span class="text-white text-2xl font-semibold">Admin Dashboard</span>
                </div>
            </div>

            <nav class="mt-10">
                <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-primary-dark hover:text-white"
                   href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt w-5 h-5 text-center"></i>
                    <span class="mx-3">Dashboard</span>
                </a>
                
                
    <!-- Project Activities -->
    <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-primary-dark hover:text-white"
    href="{{ route('admin.resources.index') }}">
    <i class="fas fa-book-open w-5 h-5 text-center"></i>
        <span class="mx-3">Digital Resources</span>
 </a>







     <!-- Project Activities -->
     <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-primary-dark hover:text-white"
     href="{{ route('admin.deliverables.index') }}">
     <i class="fas fa-file-alt w-5 h-5 text-center"></i>
     <span class="mx-3">Documents</span>
  </a>



      <!-- Project Activities -->
      <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-primary-dark hover:text-white"
      href="{{ route('admin.milestones.index') }}">
      <i class="fas fa-flag-checkered w-5 h-5 text-center"></i>
      <span class="mx-3">Project Milestones</span>
   </a>





                <!-- Project Activities -->
                <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-primary-dark hover:text-white"
                   href="{{ route('admin.activities.index') }}">
                    <i class="fas fa-calendar-alt w-5 h-5 text-center"></i>
                    <span class="mx-3">Project Activities</span>
                </a>
                
                <!-- User Management -->
                <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-primary-dark hover:text-white"
                   href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users w-5 h-5 text-center"></i>
                    <span class="mx-3">Users</span>
                </a>
                
                <!-- Settings -->
                <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-primary-dark hover:text-white"
                   href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-cog w-5 h-5 text-center"></i>
                    <span class="mx-3">Settings</span>
                </a>
            </nav>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center text-gray-700 focus:outline-none">
                                <span class="text-gray-700">Admin User</span>
                                <svg class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    <!-- Flash Messages -->
                    @if (session('success'))
                        <div class="flash-message bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 transition-opacity duration-300" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="flash-message bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 transition-opacity duration-300" role="alert">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="flash-message bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 transition-opacity duration-300" role="alert">
                            <p>{{ session('warning') }}</p>
                        </div>
                    @endif

                    @if (session('info'))
                        <div class="flash-message bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4 transition-opacity duration-300" role="alert">
                            <p>{{ session('info') }}</p>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    @yield('scripts')
</body>
</html>
