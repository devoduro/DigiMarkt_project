/**
 * DigiMarkt Chatbot Initialization
 * Direct implementation to ensure the chatbot icon appears
 */

// Create the chatbot when the page is fully loaded
window.addEventListener('load', function() {
    // Create the chatbot container
    const chatbotContainer = document.createElement('div');
    chatbotContainer.id = 'accessible-chatbot';
    chatbotContainer.className = 'chatbot-container chatbot-bottom-right chatbot-theme-light';
    chatbotContainer.setAttribute('role', 'region');
    chatbotContainer.setAttribute('aria-label', 'AI Chat Assistant');
    
    // Create the toggle button
    const toggleBtn = document.createElement('button');
    toggleBtn.className = 'chatbot-toggle';
    toggleBtn.setAttribute('aria-label', 'Open chat assistant');
    toggleBtn.setAttribute('title', 'Chat with our AI assistant');
    toggleBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>';
    
    // Add the toggle button to the container
    chatbotContainer.appendChild(toggleBtn);
    
    // Add the container to the body
    document.body.appendChild(chatbotContainer);
    
    // Initialize the full chatbot when the button is clicked
    toggleBtn.addEventListener('click', function() {
        // Only initialize the full chatbot if it hasn't been initialized yet
        if (typeof window.accessibleChatbot === 'undefined') {
            // Load the full chatbot functionality
            if (typeof AccessibleChatbot !== 'undefined') {
                window.accessibleChatbot = new AccessibleChatbot({
                    apiEndpoint: '/api/chatbot/message',
                    welcomeMessage: 'Hello! Welcome to DigiMarkt. I can help you learn about the project, partners, objectives, and digital marketing in TVET. What would you like to know?',
                    position: 'bottom-right',
                    theme: 'light'
                });
            } else {
                console.error('AccessibleChatbot class is not defined. Please check the chatbot.js file.');
                
                // Create a simple fallback interface if the class is not available
                const chatInterface = document.createElement('div');
                chatInterface.className = 'chatbot-interface chatbot-open';
                chatInterface.innerHTML = `
                    <div class="chatbot-header">
                        <div class="chatbot-title">DigiBot Assistant</div>
                        <button class="chatbot-close" aria-label="Close chat assistant">✕</button>
                    </div>
                    <div class="chatbot-messages">
                        <div class="chatbot-message chatbot-message-bot">
                            <div class="chatbot-message-content">
                                Sorry, there was an error loading the chat assistant. Please try again later.
                            </div>
                        </div>
                    </div>
                `;
                
                chatbotContainer.appendChild(chatInterface);
                
                // Add close functionality
                const closeButton = chatInterface.querySelector('.chatbot-close');
                if (closeButton) {
                    closeButton.addEventListener('click', function() {
                        chatInterface.classList.remove('chatbot-open');
                    });
                }
            }
        } else {
            // Toggle the existing chatbot
            window.accessibleChatbot.toggle();
        }
    });
});
