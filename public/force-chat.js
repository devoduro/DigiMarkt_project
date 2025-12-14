// Force chat icon to appear
document.addEventListener('DOMContentLoaded', function() {
    // Create chat button element
    var chatButton = document.createElement('div');
    chatButton.id = 'forced-chat-button';
    
    // Add styles directly to the element
    chatButton.style.position = 'fixed';
    chatButton.style.bottom = '30px';
    chatButton.style.right = '30px';
    chatButton.style.width = '60px';
    chatButton.style.height = '60px';
    chatButton.style.borderRadius = '50%';
    chatButton.style.backgroundColor = '#4f46e5';
    chatButton.style.color = 'white';
    chatButton.style.display = 'flex';
    chatButton.style.alignItems = 'center';
    chatButton.style.justifyContent = 'center';
    chatButton.style.boxShadow = '0 4px 12px rgba(0,0,0,0.2)';
    chatButton.style.cursor = 'pointer';
    chatButton.style.zIndex = '999999';
    chatButton.style.fontSize = '24px';
    
    // Add chat icon
    chatButton.innerHTML = '💬';
    
    // Add click handler
    chatButton.addEventListener('click', function() {
        alert('Chat is available! Click OK to continue.');
        
        // Create simple chat interface
        var chatInterface = document.createElement('div');
        chatInterface.style.position = 'fixed';
        chatInterface.style.bottom = '100px';
        chatInterface.style.right = '30px';
        chatInterface.style.width = '300px';
        chatInterface.style.height = '400px';
        chatInterface.style.backgroundColor = 'white';
        chatInterface.style.borderRadius = '10px';
        chatInterface.style.boxShadow = '0 5px 15px rgba(0,0,0,0.2)';
        chatInterface.style.display = 'flex';
        chatInterface.style.flexDirection = 'column';
        chatInterface.style.overflow = 'hidden';
        chatInterface.style.zIndex = '999998';
        
        // Chat header
        var chatHeader = document.createElement('div');
        chatHeader.style.padding = '15px';
        chatHeader.style.backgroundColor = '#4f46e5';
        chatHeader.style.color = 'white';
        chatHeader.style.display = 'flex';
        chatHeader.style.justifyContent = 'space-between';
        chatHeader.style.alignItems = 'center';
        chatHeader.innerHTML = '<strong>DigiMarkt Project Assistant</strong>';
        
        // Close button
        var closeButton = document.createElement('button');
        closeButton.style.background = 'none';
        closeButton.style.border = 'none';
        closeButton.style.color = 'white';
        closeButton.style.fontSize = '18px';
        closeButton.style.cursor = 'pointer';
        closeButton.innerHTML = '&times;';
        closeButton.addEventListener('click', function() {
            document.body.removeChild(chatInterface);
        });
        
        // Add close button to header
        chatHeader.appendChild(closeButton);
        
        // Message area
        var messageArea = document.createElement('div');
        messageArea.style.flex = '1';
        messageArea.style.padding = '15px';
        messageArea.style.overflowY = 'auto';
        messageArea.innerHTML = '<div style="background-color: #4f46e5; color: white; padding: 10px; border-radius: 10px; margin-bottom: 10px; align-self: flex-start; max-width: 80%;">Welcome to the DigiMarkt Project! I\'m your DigiMarkt Project Assistant. How can I help you today?</div>';
        
        // Input area
        var inputArea = document.createElement('div');
        inputArea.style.padding = '10px';
        inputArea.style.borderTop = '1px solid #eee';
        inputArea.style.display = 'flex';
        
        // Text input
        var textInput = document.createElement('input');
        textInput.style.flex = '1';
        textInput.style.padding = '10px';
        textInput.style.border = '1px solid #ddd';
        textInput.style.borderRadius = '20px';
        textInput.style.marginRight = '10px';
        textInput.setAttribute('placeholder', 'Type your message...');
        
        // Send button
        var sendButton = document.createElement('button');
        sendButton.style.backgroundColor = '#4f46e5';
        sendButton.style.color = 'white';
        sendButton.style.border = 'none';
        sendButton.style.borderRadius = '20px';
        sendButton.style.padding = '10px 15px';
        sendButton.style.cursor = 'pointer';
        sendButton.textContent = 'Send';
        
        // Add elements to input area
        inputArea.appendChild(textInput);
        inputArea.appendChild(sendButton);
        
        // Add elements to chat interface
        chatInterface.appendChild(chatHeader);
        chatInterface.appendChild(messageArea);
        chatInterface.appendChild(inputArea);
        
        // Add chat interface to body
        document.body.appendChild(chatInterface);
    });
    
    // Append to body
    document.body.appendChild(chatButton);
    
    console.log('Forced chat button has been added to the page');
});
