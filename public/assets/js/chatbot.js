/**
 * DigiMarkt AI Chatbot
 * An accessible chatbot implementation for the DigiMarkt platform
 */

class AccessibleChatbot {
    constructor(options = {}) {
        // Default options
        this.options = {
            apiKey: null,
            apiEndpoint: '/api/chatbot',
            welcomeMessage: 'Hi! I\'m DigiBot, your digital marketing assistant. How can I help you today?',
            placeholderText: 'Type your question here...',
            position: 'bottom-right',
            theme: 'light',
            ...options
        };

        // State management
        this.state = {
            isOpen: false,
            isLoading: false,
            messages: [],
            awaitingResponse: false,
            isReading: false
        };

        // Initialize 
        this.init();
    }

    /**
     * Initialize the chatbot
     */
    init() {
        this.setupAccessibilityFeatures();
        this.createElements();
        this.setupEventListeners();
        this.addWelcomeMessage();
    }

    /**
     * Create the DOM elements for the chatbot
     */
    createElements() {
        // Create the main container
        this.container = document.createElement('div');
        this.container.id = 'accessible-chatbot';
        this.container.className = `chatbot-container chatbot-${this.options.position} chatbot-theme-${this.options.theme}`;
        this.container.setAttribute('role', 'region');
        this.container.setAttribute('aria-label', 'AI Chat Assistant');
        
        // Create the toggle button
        this.toggleBtn = document.createElement('button');
        this.toggleBtn.className = 'chatbot-toggle';
        this.toggleBtn.setAttribute('aria-label', 'Open chat assistant');
        this.toggleBtn.setAttribute('aria-expanded', 'false');
        this.toggleBtn.setAttribute('title', 'Chat with our AI assistant');
        this.toggleBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>';
        
        // Create the chat interface
        this.chatInterface = document.createElement('div');
        this.chatInterface.className = 'chatbot-interface';
        this.chatInterface.setAttribute('aria-hidden', 'true');

        // Header for the chat
        this.chatHeader = document.createElement('div');
        this.chatHeader.className = 'chatbot-header';
        this.chatHeader.innerHTML = `
            <div class="chatbot-title" id="chatbot-title">DigiBot Assistant</div>
            <button class="chatbot-close" aria-label="Close chat assistant">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        `;

        // Messages container
        this.messagesContainer = document.createElement('div');
        this.messagesContainer.className = 'chatbot-messages';
        this.messagesContainer.setAttribute('role', 'log');
        this.messagesContainer.setAttribute('aria-live', 'polite');
        this.messagesContainer.setAttribute('aria-atomic', 'false');

        // Input area
        this.inputArea = document.createElement('div');
        this.inputArea.className = 'chatbot-input-area';

        this.messageInput = document.createElement('textarea');
        this.messageInput.className = 'chatbot-input';
        this.messageInput.placeholder = this.options.placeholderText;
        this.messageInput.setAttribute('rows', '1');
        this.messageInput.setAttribute('aria-label', 'Type your message');
        
        this.sendButton = document.createElement('button');
        this.sendButton.className = 'chatbot-send';
        this.sendButton.setAttribute('aria-label', 'Send message');
        this.sendButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
            </svg>
        `;

        // Accessibility controls
        this.accessibilityControls = document.createElement('div');
        this.accessibilityControls.className = 'chatbot-accessibility-controls';
        this.accessibilityControls.innerHTML = `
            <button class="chatbot-accessibility-btn" aria-label="Increase font size" title="Increase font size">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 12h16"></path><path d="M12 4v16"></path>
                </svg>A
            </button>
            <button class="chatbot-accessibility-btn" aria-label="Decrease font size" title="Decrease font size">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 12h16"></path>
                </svg>A
            </button>
            <button class="chatbot-accessibility-btn" aria-label="Toggle high contrast mode" title="Toggle high contrast mode">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 2v20"></path>
                    <path d="M2 12h20"></path>
                </svg>
            </button>
            <button class="chatbot-accessibility-btn" aria-label="Read messages aloud" title="Read messages aloud">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 6v12"></path>
                    <path d="M6 12h12"></path>
                    <path d="M18 6h.01"></path>
                    <path d="M6 6h.01"></path>
                    <path d="M18 18h.01"></path>
                    <path d="M6 18h.01"></path>
                </svg>
            </button>
        `;

        // Build the DOM structure
        this.inputArea.appendChild(this.messageInput);
        this.inputArea.appendChild(this.sendButton);

        this.chatInterface.appendChild(this.chatHeader);
        this.chatInterface.appendChild(this.messagesContainer);
        this.chatInterface.appendChild(this.inputArea);
        this.chatInterface.appendChild(this.accessibilityControls);

        this.container.appendChild(this.toggleBtn);
        this.container.appendChild(this.chatInterface);

        // Append to the body
        document.body.appendChild(this.container);
    }

    /**
     * Set up event listeners
     */
    setupEventListeners() {
        // Toggle chatbot visibility
        this.toggleBtn.addEventListener('click', () => this.toggle());
        
        // Close button
        this.chatHeader.querySelector('.chatbot-close').addEventListener('click', () => this.toggle(false));

        // Send message
        this.sendButton.addEventListener('click', () => this.sendMessage());
        this.messageInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                this.sendMessage();
            }
        });
        
        // Auto resize textarea
        this.messageInput.addEventListener('input', () => {
            this.messageInput.style.height = 'auto';
            this.messageInput.style.height = (this.messageInput.scrollHeight) + 'px';
        });

        // Accessibility buttons
        const accessibilityButtons = this.accessibilityControls.querySelectorAll('.chatbot-accessibility-btn');
        
        // Increase font size
        accessibilityButtons[0].addEventListener('click', () => this.adjustFontSize(1));
        
        // Decrease font size
        accessibilityButtons[1].addEventListener('click', () => this.adjustFontSize(-1));
        
        // Toggle high contrast
        accessibilityButtons[2].addEventListener('click', () => this.toggleHighContrast());
        
        // Screen reader
        accessibilityButtons[3].addEventListener('click', () => this.readMessages());
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            // ESC key closes the chatbot
            if (e.key === 'Escape' && this.state.isOpen) {
                this.toggle(false);
            }
        });
    }

    /**
     * Add welcome message
     */
    addWelcomeMessage() {
        this.addMessage({
            sender: 'bot',
            content: this.options.welcomeMessage,
            timestamp: new Date()
        });
    }

    /**
     * Toggle chatbot visibility
     * @param {boolean} forceState - Optional state to force
     */
    toggle(forceState) {
        const newState = forceState !== undefined ? forceState : !this.state.isOpen;
        
        this.state.isOpen = newState;
        
        if (newState) {
            this.chatInterface.classList.add('chatbot-open');
            this.chatInterface.setAttribute('aria-hidden', 'false');
            this.toggleBtn.setAttribute('aria-expanded', 'true');
            this.toggleBtn.setAttribute('aria-label', 'Close chat assistant');
            
            setTimeout(() => this.messageInput.focus(), 100);
        } else {
            this.chatInterface.classList.remove('chatbot-open');
            this.chatInterface.setAttribute('aria-hidden', 'true');
            this.toggleBtn.setAttribute('aria-expanded', 'false');
            this.toggleBtn.setAttribute('aria-label', 'Open chat assistant');
        }
    }

    /**
     * Send user message
     */
    async sendMessage() {
        const userInput = this.messageInput.value.trim();
        if (!userInput || this.state.awaitingResponse) return;

        // Add user message to chat
        this.addMessage({
            sender: 'user',
            content: userInput,
            timestamp: new Date()
        });

        // Clear input
        this.messageInput.value = '';
        this.messageInput.style.height = 'auto';
        
        // Set loading state
        this.state.awaitingResponse = true;
        this.showLoadingIndicator();
        
        try {
            const response = await this.fetchBotResponse(userInput);
            this.hideLoadingIndicator();
            
            // Add bot response to chat
            this.addMessage({
                sender: 'bot',
                content: response,
                timestamp: new Date()
            });
        } catch (error) {
            this.hideLoadingIndicator();
            console.error('Error fetching response:', error);
            
            // Add error message
            this.addMessage({
                sender: 'bot',
                content: 'Sorry, I encountered an error processing your request. Please try again later.',
                timestamp: new Date(),
                isError: true
            });
        }
        
        // Reset state
        this.state.awaitingResponse = false;
    }

    /**
     * Fetch response from the bot
     * @param {string} userInput - User's message
     * @returns {Promise<string>} Bot's response
     */
    async fetchBotResponse(userInput) {
        try {
            const headers = {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            };
            
            // Only add Authorization header if apiKey is provided
            if (this.options.apiKey) {
                headers['Authorization'] = `Bearer ${this.options.apiKey}`;
            }

            const response = await fetch(this.options.apiEndpoint, {
                method: 'POST',
                headers: headers,
                body: JSON.stringify({ message: userInput })
            });

            if (!response.ok) {
                throw new Error('Error fetching response: ' + response.status);
            }

            const data = await response.json();
            return data.response || data.message || 'Sorry, I could not process your request.';
        } catch (error) {
            console.error('Chatbot API Error:', error);
            throw error;
        }
    }

    /**
     * Add a message to the chat
     * @param {Object} message - Message object
     */
    addMessage(message) {
        // Add to state
        this.state.messages.push(message);
        
        // Create message element
        const messageElement = document.createElement('div');
        messageElement.className = `chatbot-message chatbot-message-${message.sender}`;
        
        if (message.isError) {
            messageElement.classList.add('chatbot-message-error');
        }
        
        // Add appropriate ARIA roles and properties
        messageElement.setAttribute('role', 'article');
        messageElement.setAttribute('aria-label', `${message.sender === 'bot' ? 'Assistant' : 'You'}: ${message.content}`);
        
        // Format timestamp
        const timeFormatted = message.timestamp.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        messageElement.innerHTML = `
            <div class="chatbot-message-content">
                ${message.content}
            </div>
            <div class="chatbot-message-time" aria-hidden="true">
                ${timeFormatted}
            </div>
        `;
        
        // Add to DOM
        this.messagesContainer.appendChild(messageElement);
        
        // Scroll to bottom
        this.scrollToBottom();
        
        // Announce new message for screen readers
        if (message.sender === 'bot') {
            this.announceForScreenReader(`New message from assistant: ${message.content}`);
        }
    }

    /**
     * Show loading indicator
     */
    showLoadingIndicator() {
        const loadingElement = document.createElement('div');
        loadingElement.className = 'chatbot-message chatbot-message-bot chatbot-message-loading';
        loadingElement.setAttribute('role', 'status');
        loadingElement.setAttribute('aria-label', 'Assistant is typing');
        
        loadingElement.innerHTML = `
            <div class="chatbot-loading-dots">
                <div class="chatbot-loading-dot"></div>
                <div class="chatbot-loading-dot"></div>
                <div class="chatbot-loading-dot"></div>
            </div>
        `;
        
        this.messagesContainer.appendChild(loadingElement);
        this.scrollToBottom();
    }

    /**
     * Hide loading indicator
     */
    hideLoadingIndicator() {
        const loadingElement = this.messagesContainer.querySelector('.chatbot-message-loading');
        if (loadingElement) {
            loadingElement.remove();
        }
    }

    /**
     * Scroll messages container to bottom
     */
    scrollToBottom() {
        this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
    }

    /**
     * Set up accessibility features
     */
    setupAccessibilityFeatures() {
        // Create screen reader announcer
        this.srAnnouncer = document.createElement('div');
        this.srAnnouncer.className = 'sr-only';
        this.srAnnouncer.setAttribute('aria-live', 'polite');
        document.body.appendChild(this.srAnnouncer);
        
        // Setup initial accessibility state
        this.accessibilityState = {
            fontSize: 16,  // Base font size in pixels
            highContrast: false
        };
    }

    /**
     * Announce message to screen readers
     * @param {string} message - Message to announce
     */
    announceForScreenReader(message) {
        if (this.srAnnouncer) {
            this.srAnnouncer.textContent = message;
        }
    }

    /**
     * Adjust font size
     * @param {number} delta - Amount to change (positive = increase, negative = decrease)
     */
    adjustFontSize(delta) {
        const newSize = Math.min(Math.max(this.accessibilityState.fontSize + delta, 14), 24);
        this.accessibilityState.fontSize = newSize;
        
        this.container.style.setProperty('--chatbot-font-size', `${newSize}px`);
        
        // Announce change
        this.announceForScreenReader(`Font size ${delta > 0 ? 'increased' : 'decreased'} to ${newSize} pixels`);
    }

    /**
     * Toggle high contrast mode
     */
    toggleHighContrast() {
        this.accessibilityState.highContrast = !this.accessibilityState.highContrast;
        
        if (this.accessibilityState.highContrast) {
            this.container.classList.add('chatbot-high-contrast');
            this.announceForScreenReader('High contrast mode enabled');
        } else {
            this.container.classList.remove('chatbot-high-contrast');
            this.announceForScreenReader('High contrast mode disabled');
        }
    }

    /**
     * Read messages aloud
     */
    readMessages() {
        if (!('speechSynthesis' in window)) {
            this.announceForScreenReader('Text-to-speech is not supported in your browser');
            alert('Text-to-speech is not supported in your browser');
            return;
        }
        
        // Get the read button
        const readButton = this.accessibilityControls.querySelectorAll('.chatbot-accessibility-btn')[3];
        
        // If already reading, stop it
        if (this.state.isReading) {
            window.speechSynthesis.cancel();
            this.state.isReading = false;
            if (readButton) {
                readButton.style.backgroundColor = '';
                readButton.style.color = '';
                readButton.setAttribute('title', 'Read messages aloud');
            }
            this.announceForScreenReader('Stopped reading');
            return;
        }
        
        // Get the last few messages to read
        const messagesToRead = this.state.messages.slice(-3);
        
        if (messagesToRead.length === 0) {
            this.announceForScreenReader('No messages to read');
            return;
        }
        
        // Set reading state
        this.state.isReading = true;
        
        // Add active state to button
        if (readButton) {
            readButton.style.backgroundColor = 'var(--chatbot-primary)';
            readButton.style.color = 'white';
            readButton.setAttribute('title', 'Stop reading');
        }
        
        // Read each message sequentially
        let currentIndex = 0;
        const readNext = () => {
            if (currentIndex < messagesToRead.length && this.state.isReading) {
                const message = messagesToRead[currentIndex];
                const utterance = new SpeechSynthesisUtterance(
                    `${message.sender === 'bot' ? 'Assistant says' : 'You said'}: ${message.content}`
                );
                
                // Set voice properties for better clarity
                utterance.rate = 0.9; // Slightly slower for clarity
                utterance.pitch = 1.0;
                utterance.volume = 1.0;
                
                // When this message finishes, read the next one
                utterance.onend = () => {
                    currentIndex++;
                    if (currentIndex >= messagesToRead.length) {
                        // Reset state and button style when done
                        this.state.isReading = false;
                        if (readButton) {
                            readButton.style.backgroundColor = '';
                            readButton.style.color = '';
                            readButton.setAttribute('title', 'Read messages aloud');
                        }
                    }
                    readNext();
                };
                
                utterance.onerror = (event) => {
                    console.error('Speech synthesis error:', event);
                    currentIndex++;
                    if (currentIndex >= messagesToRead.length) {
                        // Reset state and button style on error
                        this.state.isReading = false;
                        if (readButton) {
                            readButton.style.backgroundColor = '';
                            readButton.style.color = '';
                            readButton.setAttribute('title', 'Read messages aloud');
                        }
                    }
                    readNext();
                };
                
                window.speechSynthesis.speak(utterance);
            }
        };
        
        this.announceForScreenReader('Reading messages aloud');
        readNext();
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.accessibleChatbot = new AccessibleChatbot({
        // Configuration options can be set here
        apiKey: null, // Set your API key here if you have one
        apiEndpoint: '/api/chatbot/message',
        welcomeMessage: 'Hello! Welcome to DigiMarkt. I can help you learn about the project, partners, objectives, and digital marketing in TVET. What would you like to know?'
    });
});
