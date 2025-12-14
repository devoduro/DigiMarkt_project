<!-- Simple Inline Chatbot Component -->
<div id="simple-chatbot" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    <button id="chat-toggle-btn" style="width: 60px; height: 60px; border-radius: 50%; background-color: #4f46e5; color: white; border: none; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: transform 0.3s;" 
        onclick="toggleChatbox()"
        aria-label="Open chat assistant"
        title="Chat with our AI assistant">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
    </button>

    <div id="chatbox" style="display: none; position: absolute; bottom: 70px; right: 0; width: 350px; height: 450px; background-color: white; border-radius: 16px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <!-- Chat Header -->
        <div style="background: linear-gradient(135deg, #4f46e5, #8b5cf6); color: white; padding: 15px; display: flex; justify-content: space-between; align-items: center;">
            <div style="font-weight: bold;">DigiMarktBot Assistant</div>
            <button onclick="toggleChatbox()" style="background: none; border: none; color: white; cursor: pointer;" aria-label="Close chat">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        
        <!-- Chat Messages -->
        <div id="chat-messages" style="height: 330px; overflow-y: auto; padding: 15px; display: flex; flex-direction: column; gap: 10px;">
            <!-- Bot welcome message -->
            <div style="align-self: flex-start; background-color: #4f46e5; color: white; padding: 10px 15px; border-radius: 18px; border-bottom-left-radius: 4px; max-width: 80%;">
                Welcome to the DigiMarkt Project! I'm your DigiMarkt Project Assistant. I can help you explore our project, partners, activities, and resources. Where would you like to start?
                <div style="margin-top: 10px; font-size: 0.9em;">
                    <div>• <a href="#" onclick="sendSuggestedQuestion('Tell me about the DigiMarkt project')" style="color: #93c5fd; text-decoration: underline;">About DigiMarkt</a></div>
                    <div>• <a href="#" onclick="sendSuggestedQuestion('Who are the project partners?')" style="color: #93c5fd; text-decoration: underline;">Our Partners</a></div>
                    <div>• <a href="#" onclick="sendSuggestedQuestion('What are the project activities?')" style="color: #93c5fd; text-decoration: underline;">Project Activities</a></div>
                    <div>• <a href="#" onclick="sendSuggestedQuestion('How can I get involved?')" style="color: #93c5fd; text-decoration: underline;">Get Involved</a></div>
                </div>
            </div>
        </div>
        
        <!-- Chat Input -->
        <div style="padding: 10px; border-top: 1px solid #e5e7eb; display: flex; align-items: center; gap: 10px;">
            <input id="chat-input" type="text" placeholder="Type your message..." style="flex: 1; padding: 12px; border: 1px solid #d1d5db; border-radius: 20px; outline: none;" 
                onkeydown="if(event.key==='Enter')sendMessage()">
            <button onclick="sendMessage()" style="background-color: #4f46e5; color: white; border: none; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer;" aria-label="Send message">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
function toggleChatbox() {
    const chatbox = document.getElementById('chatbox');
    const button = document.getElementById('chat-toggle-btn');
    
    if (chatbox.style.display === 'none' || !chatbox.style.display) {
        chatbox.style.display = 'block';
        button.setAttribute('aria-expanded', 'true');
        document.getElementById('chat-input').focus();
    } else {
        chatbox.style.display = 'none';
        button.setAttribute('aria-expanded', 'false');
    }
}

function sendSuggestedQuestion(question) {
    const input = document.getElementById('chat-input');
    input.value = question;
    sendMessage();
}

function sendMessage() {
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    
    if (!message) return;
    
    // Add user message
    addMessage(message, 'user');
    input.value = '';
    
    // Add "typing" indicator
    const typingIndicator = document.createElement('div');
    typingIndicator.id = 'typing-indicator';
    typingIndicator.style = 'align-self: flex-start; background-color: #e5e7eb; color: #4b5563; padding: 10px 15px; border-radius: 18px; max-width: 80%; display: flex; gap: 4px;';
    typingIndicator.innerHTML = `
        <span style="width: 8px; height: 8px; background-color: #6b7280; border-radius: 50%; display: inline-block; animation: bounce 1.4s infinite ease-in-out both;"></span>
        <span style="width: 8px; height: 8px; background-color: #6b7280; border-radius: 50%; display: inline-block; animation: bounce 1.4s infinite ease-in-out both; animation-delay: 0.2s;"></span>
        <span style="width: 8px; height: 8px; background-color: #6b7280; border-radius: 50%; display: inline-block; animation: bounce 1.4s infinite ease-in-out both; animation-delay: 0.4s;"></span>
    `;
    document.getElementById('chat-messages').appendChild(typingIndicator);
    scrollToBottom();
    
    // Generate response (simulated delay)
    setTimeout(() => {
        // Remove typing indicator
        document.getElementById('typing-indicator').remove();
        
        // Get response based on message content
        const response = getBotResponse(message);
        
        // Add bot response
        addMessage(response, 'bot');
    }, 1000);
}

function addMessage(content, sender) {
    const messagesContainer = document.getElementById('chat-messages');
    const messageElement = document.createElement('div');
    
    if (sender === 'user') {
        messageElement.style = 'align-self: flex-end; background-color: #f3f4f6; color: #374151; padding: 10px 15px; border-radius: 18px; border-bottom-right-radius: 4px; max-width: 80%;';
    } else {
        messageElement.style = 'align-self: flex-start; background-color: #4f46e5; color: white; padding: 10px 15px; border-radius: 18px; border-bottom-left-radius: 4px; max-width: 80%;';
    }
    
    messageElement.textContent = content;
    messagesContainer.appendChild(messageElement);
    scrollToBottom();
}

function scrollToBottom() {
    const messagesContainer = document.getElementById('chat-messages');
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function getBotResponse(message) {
    message = message.toLowerCase();
    
    // Simple rule-based responses
    if (message.includes('hello') || message.includes('hi') || message.includes('hey')) {
        return 'Hello there! How can I help you with digital marketing today?';
    }
    
    if (message.includes('seo') || message.includes('search engine')) {
        return 'SEO is crucial for digital visibility. It involves optimizing your website content, structure, and backlinks to rank higher in search results. Would you like specific tips for improving your SEO?';
    }
    
    if (message.includes('social media') || message.includes('facebook') || message.includes('instagram')) {
        return 'Social media marketing is essential for brand awareness and engagement. Each platform has unique advantages - LinkedIn for B2B, Instagram for visual products, and Facebook for community building.';
    }
    
    if (message.includes('thank')) {
        return "You're welcome! Is there anything else I can help with?";
    }
    
    // Default response
    return "That's an interesting question about digital marketing. To provide more specific guidance, could you elaborate a bit more?";
}
</script>

<style>
@keyframes bounce {
    0%, 80%, 100% { transform: scale(0); opacity: 0.5; }
    40% { transform: scale(1); opacity: 1; }
}
</style>
