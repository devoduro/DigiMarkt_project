<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
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
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chatbot.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/accessibility.css') }}">
    
    <style>
        /* Announcement Slider Styles */
        .announcement-slider {
            position: relative;
            overflow: hidden;
            width: 100%;
            white-space: nowrap;
        }
        
        .announcement-slide {
            display: inline-block;
            animation: slideAnnouncement 15s linear infinite;
            padding-right: 50px;
        }
        
        /* Marquee Styles */
        .marquee-container {
            overflow: hidden;
            width: 100%;
            position: relative;
        }
        
        .marquee-content {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 40s linear infinite;
            padding-left: 100%;
        }
        
        .marquee-content:hover {
            animation-play-state: paused;
        }
        
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        
        @keyframes slideAnnouncement {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        
        .announcement-slider:hover .announcement-slide {
            animation-play-state: paused;
        }
    </style>
    
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

    <!-- Main Content Container with padding for fixed header -->
    <div class="pt-24"> <!-- Add padding-top to account for fixed header -->
        <!-- Project Objective Marquee -->
        @include('partials.marquee')

        <!-- Main Content -->
        <main class="flex-grow">
        @yield('content')
    </main>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Accessibility Panel -->
    @include('components.accessibility-panel')
    
    <!-- Audio Aid Button -->
    @include('components.audio-aid-button')
    
    <!-- Chatbot placeholder -->
    <!-- Single chatbot implementation at the bottom of the page -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/chatbot.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/accessibility.js') }}"></script>

    <script>
        // Announcement slider functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize announcement modals
            var announcementModals = document.querySelectorAll('.modal');
            announcementModals.forEach(function(modal) {
                new bootstrap.Modal(modal);
            });
            
            // Clone announcement slides for continuous scrolling effect if there's only one
            const sliderContainer = document.querySelector('.announcement-slider');
            if (sliderContainer) {
                const slides = sliderContainer.querySelectorAll('.announcement-slide');
                if (slides.length === 1) {
                    const clone = slides[0].cloneNode(true);
                    sliderContainer.appendChild(clone);
                }
            }
        });
    </script>
    
    <!-- Initialize Bootstrap Carousel -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
                interval: 5000,
                wrap: true
            });
        });
    </script>
    
    <!-- Single Chatbot Implementation -->
    <!-- All chatbot functionality is now handled inline at the bottom of the page -->
    
    @yield('scripts')
    
    <!-- Accessibility Features Init -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize chatbot with options
            if (typeof AccessibleChatbot !== 'undefined') {
                window.accessibleChatbot = new AccessibleChatbot({
                    apiEndpoint: '/api/chatbot/message',
                    welcomeMessage: 'Hello! I\'m DigiBot, your digital marketing assistant. How can I help you today?',
                    position: 'bottom-right',
                    theme: 'light'
                });
            }
            
            // Skip to main content functionality
            var skipLink = document.createElement('a');
            skipLink.id = 'skip-to-content';
            skipLink.href = '#main-content';
            skipLink.className = 'sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[9999] focus:bg-white focus:p-4 focus:shadow-lg focus:rounded';
            skipLink.textContent = 'Skip to main content';
            document.body.insertBefore(skipLink, document.body.firstChild);
            
            // Add ID to main content for skip link target
            var mainContent = document.querySelector('main');
            if (mainContent) {
                mainContent.id = 'main-content';
                mainContent.setAttribute('tabindex', '-1');
            }
        });
    </script>
    
    <style>
        @keyframes pulse {
            0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
            40% { transform: scale(1.2); opacity: 1; }
        }
    </style>
</body>
</html>
