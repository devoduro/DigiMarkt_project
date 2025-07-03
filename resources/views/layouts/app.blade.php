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

    <!-- Main Content -->
    <main class="flex-grow pt-16">
        @yield('content')
    </main>

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
    <script src="{{ asset('assets/js/chatbot.js') }}"></script>
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
    <!-- Guaranteed Inline Chat Button and Interface -->
    <script>
        // Wait for DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Create chat interface
            var chatInterface = document.createElement('div');
            chatInterface.id = 'digibot-interface';
            chatInterface.setAttribute('style', 'position: fixed; bottom: 100px; right: 20px; width: 350px; height: 500px; background-color: white; border-radius: 16px; box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2); display: none; flex-direction: column; overflow: hidden; z-index: 9999998; border: 1px solid rgba(0, 0, 0, 0.1);');
            
            // Chat header
            var chatHeader = document.createElement('div');
            chatHeader.setAttribute('style', 'background: linear-gradient(135deg, #4f46e5, #8b5cf6); color: white; padding: 15px; display: flex; justify-content: space-between; align-items: center; border-top-left-radius: 15px; border-top-right-radius: 15px;');
            
            var chatTitle = document.createElement('div');
            chatTitle.textContent = 'DigiBot Assistant';
            chatTitle.setAttribute('style', 'font-weight: bold; font-size: 16px;');
            
            var closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;';
            closeButton.setAttribute('style', 'background: none; border: none; color: white; font-size: 24px; cursor: pointer; padding: 0; line-height: 1;');
            closeButton.setAttribute('aria-label', 'Close chat');
            
            chatHeader.appendChild(chatTitle);
            chatHeader.appendChild(closeButton);
            
            // Chat messages area
            var messagesArea = document.createElement('div');
            messagesArea.id = 'chat-messages';
            messagesArea.setAttribute('style', 'flex: 1; padding: 15px; overflow-y: auto; display: flex; flex-direction: column; gap: 10px; background-color: #f8fafc;');
            
            // Welcome message
            var welcomeMsg = document.createElement('div');
            welcomeMsg.setAttribute('style', 'align-self: flex-start; background-color: #4f46e5; color: white; padding: 12px 16px; border-radius: 18px; border-bottom-left-radius: 4px; max-width: 80%; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); margin-bottom: 5px;');
            welcomeMsg.textContent = 'Hello! I\'m DigiBot, your digital marketing assistant. How can I help you today?';
            messagesArea.appendChild(welcomeMsg);
            
            // Add a few suggested questions
            var suggestionArea = document.createElement('div');
            suggestionArea.setAttribute('style', 'display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px;');
            
            var suggestions = [
                'What is SEO?',
                'Social media tips',
                'Email marketing'
            ];
            
            suggestions.forEach(function(suggestion) {
                var suggestionBtn = document.createElement('button');
                suggestionBtn.textContent = suggestion;
                suggestionBtn.setAttribute('style', 'background-color: #e0e7ff; color: #4f46e5; border: none; padding: 8px 16px; border-radius: 16px; font-size: 14px; cursor: pointer; transition: all 0.2s;');
                suggestionBtn.addEventListener('mouseover', function() {
                    this.style.backgroundColor = '#c7d2fe';
                });
                suggestionBtn.addEventListener('mouseout', function() {
                    this.style.backgroundColor = '#e0e7ff';
                });
                suggestionBtn.addEventListener('click', function() {
                    sendMessage(suggestion);
                });
                suggestionArea.appendChild(suggestionBtn);
            });
            
            messagesArea.appendChild(suggestionArea);
            
            // Chat input area
            var inputArea = document.createElement('div');
            inputArea.setAttribute('style', 'padding: 15px; border-top: 1px solid #e5e7eb; display: flex; gap: 10px; background-color: white;');
            
            var textInput = document.createElement('input');
            textInput.id = 'chat-input';
            textInput.setAttribute('type', 'text');
            textInput.setAttribute('placeholder', 'Type your message...');
            textInput.setAttribute('style', 'flex: 1; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 24px; outline: none; font-size: 14px;');
            
            var sendButton = document.createElement('button');
            sendButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>';
            sendButton.setAttribute('style', 'width: 44px; height: 44px; background-color: #4f46e5; color: white; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer;');
            sendButton.setAttribute('aria-label', 'Send message');
            
            inputArea.appendChild(textInput);
            inputArea.appendChild(sendButton);
            
            // Assemble the interface
            chatInterface.appendChild(chatHeader);
            chatInterface.appendChild(messagesArea);
            chatInterface.appendChild(inputArea);
            
            // Create chat button with inline styles for guaranteed visibility
            var chatButton = document.createElement('div');
            chatButton.id = 'guaranteed-chat-button';
            chatButton.setAttribute('style', 'position: fixed; bottom: 20px; right: 20px; width: 70px; height: 70px; border-radius: 50%; background-color: #4f46e5; color: white; display: flex; align-items: center; justify-content: center; font-size: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.3); cursor: pointer; z-index: 9999999;');
            chatButton.innerHTML = '💬';
            chatButton.setAttribute('aria-label', 'Open chat assistant');
            chatButton.setAttribute('title', 'Chat with DigiBot');
            
            // Add to body
            document.body.appendChild(chatInterface);
            document.body.appendChild(chatButton);
            
            // Event handlers
            chatButton.addEventListener('click', function() {
                if (chatInterface.style.display === 'none' || !chatInterface.style.display) {
                    chatInterface.style.display = 'flex';
                    textInput.focus();
                } else {
                    chatInterface.style.display = 'none';
                }
            });
            
            closeButton.addEventListener('click', function() {
                chatInterface.style.display = 'none';
            });
            
            sendButton.addEventListener('click', function() {
                sendMessage();
            });
            
            textInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
            
            // Function to send messages
            function sendMessage(text) {
                const input = document.getElementById('chat-input');
                const message = text || input.value.trim();
                
                if (!message) return;
                
                // Create user message element
                const userMsg = document.createElement('div');
                userMsg.setAttribute('style', 'align-self: flex-end; background-color: #f1f5f9; color: #334155; padding: 12px 16px; border-radius: 18px; border-bottom-right-radius: 4px; max-width: 80%; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);');
                userMsg.textContent = message;
                document.getElementById('chat-messages').appendChild(userMsg);
                
                // Clear input
                input.value = '';
                
                // Scroll to bottom
                document.getElementById('chat-messages').scrollTop = document.getElementById('chat-messages').scrollHeight;
                
                // Show typing indicator
                const typingIndicator = document.createElement('div');
                typingIndicator.id = 'typing-indicator';
                typingIndicator.setAttribute('style', 'align-self: flex-start; background-color: #e2e8f0; color: #64748b; padding: 12px 16px; border-radius: 18px; border-bottom-left-radius: 4px; max-width: 80%; display: flex; gap: 4px;');
                
                for (let i = 0; i < 3; i++) {
                    const dot = document.createElement('div');
                    dot.setAttribute('style', `width: 8px; height: 8px; background-color: #94a3b8; border-radius: 50%; animation: pulse 1.5s infinite ease-in-out both; animation-delay: ${i * 0.2}s;`);
                    typingIndicator.appendChild(dot);
                }
                
                document.getElementById('chat-messages').appendChild(typingIndicator);
                document.getElementById('chat-messages').scrollTop = document.getElementById('chat-messages').scrollHeight;
                
                // Process the response
                setTimeout(function() {
                    typingIndicator.remove();
                    
                    // Generate response based on input
                    let botResponse;
                    const lowerMsg = message.toLowerCase();
                    
                    if (lowerMsg.includes('seo') || lowerMsg.includes('search engine')) {
                        botResponse = 'SEO (Search Engine Optimization) is essential for digital visibility. It involves optimizing your website content, structure, and backlinks to rank higher in search results. Would you like some specific tips to improve your SEO?';
                    } else if (lowerMsg.includes('social media') || lowerMsg.includes('facebook') || lowerMsg.includes('instagram')) {
                        botResponse = 'Social media marketing can significantly boost your brand awareness. Each platform has unique advantages: LinkedIn for B2B, Instagram for visual products, Facebook for community building, and Twitter for quick updates and trends.';
                    } else if (lowerMsg.includes('email') || lowerMsg.includes('newsletter')) {
                        botResponse = 'Email marketing remains one of the most effective digital channels, with an average ROI of 3800%. Focus on personalization, segmentation, and providing real value rather than just promotions.';
                    } else if (lowerMsg.includes('hello') || lowerMsg.includes('hi') || lowerMsg.includes('hey')) {
                        botResponse = 'Hello! I\'m here to help with your digital marketing questions. What specific area are you interested in?';
                    } else {
                        botResponse = 'That\'s an interesting question! Digital marketing encompasses many strategies including content marketing, paid advertising, SEO, social media and email marketing. Could you provide more specifics about what you\'d like to learn?';
                    }
                    
                    // Create bot response element
                    const botMsg = document.createElement('div');
                    botMsg.setAttribute('style', 'align-self: flex-start; background-color: #4f46e5; color: white; padding: 12px 16px; border-radius: 18px; border-bottom-left-radius: 4px; max-width: 80%; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);');
                    botMsg.textContent = botResponse;
                    document.getElementById('chat-messages').appendChild(botMsg);
                    
                    // Scroll to bottom again
                    document.getElementById('chat-messages').scrollTop = document.getElementById('chat-messages').scrollHeight;
                }, 1500);
            }
            
            console.log('Chat interface initialized');
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
