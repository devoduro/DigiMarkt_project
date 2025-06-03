<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Digital Marketing Platform') }} - @yield('title')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/carousel.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @yield('styles')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
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

    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Initialize Bootstrap Carousel -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
                interval: 5000,
                wrap: true
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
