<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ChatbotController extends Controller
{
    /**
     * Process a chatbot request and generate a response
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function processMessage(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Extract the user message
        $userMessage = $validated['message'];
        
        try {
            // In a real implementation, you'd connect to an AI service like OpenAI, Azure, etc.
            // Here we'll implement a simple rule-based response system
            $response = $this->generateResponse($userMessage);
            
            // Log the interaction (in a real app, you might want to store this in a database)
            Log::info('Chatbot interaction', [
                'user_message' => $userMessage,
                'bot_response' => $response,
                'ip' => $request->ip()
            ]);
            
            return response()->json([
                'success' => true,
                'response' => $response
            ]);
            
        } catch (\Exception $e) {
            Log::error('Chatbot error', [
                'message' => $e->getMessage(),
                'user_message' => $userMessage
            ]);
            
            return response()->json([
                'success' => false,
                'error' => 'Sorry, I encountered a problem processing your request. Please try again.'
            ], 500);
        }
    }

    /**
     * Generate a response based on the user message
     * 
     * @param string $userMessage
     * @return string
     */
    private function generateResponse($userMessage)
    {
        $message = strtolower($userMessage);
        
        // Sample rule-based responses
        // In a real implementation, you would use a proper NLP or call an external AI API
        
        // Check for keywords and provide appropriate responses
        if (str_contains($message, 'hello') || str_contains($message, 'hi') || str_contains($message, 'hey')) {
            return 'Hello there! How can I help you with digital marketing today?';
        }
        
        if (str_contains($message, 'bye') || str_contains($message, 'goodbye')) {
            return 'Goodbye! Feel free to chat again if you have any more questions about digital marketing.';
        }
        
        if (str_contains($message, 'thank')) {
            return "You're welcome! Is there anything else I can help with?";
        }
        
        if (str_contains($message, 'seo') || str_contains($message, 'search engine')) {
            return 'SEO (Search Engine Optimization) is crucial for digital visibility. It involves optimizing your website content, structure, and backlinks to rank higher in search results. Would you like specific tips for improving your SEO?';
        }
        
        if (str_contains($message, 'social media') || str_contains($message, 'facebook') || str_contains($message, 'instagram') || str_contains($message, 'twitter') || str_contains($message, 'linkedin')) {
            return 'Social media marketing is essential for brand awareness and engagement. Each platform has unique advantages - LinkedIn for B2B, Instagram for visual products, Facebook for community building, and Twitter for real-time engagement. Which platform would you like to learn more about?';
        }
        
        if (str_contains($message, 'content marketing') || str_contains($message, 'blog') || str_contains($message, 'article')) {
            return 'Content marketing drives engagement and establishes authority. Publishing valuable, relevant content consistently helps attract and retain your target audience. Would you like tips on creating an effective content strategy?';
        }
        
        if (str_contains($message, 'email marketing')) {
            return 'Email marketing remains one of the highest-ROI digital channels. Building a quality email list, crafting compelling subject lines, and segmenting your audience for targeted campaigns are key strategies. Would you like specific tips for improving your email campaigns?';
        }
        
        if (str_contains($message, 'ppc') || str_contains($message, 'pay per click') || str_contains($message, 'google ads')) {
            return 'PPC (Pay-Per-Click) advertising can drive immediate traffic to your website. Google Ads, social media ads, and display networks offer various targeting options based on demographics, interests, and behaviors. Would you like to know more about optimizing ad campaigns?';
        }
        
        if (str_contains($message, 'analytics') || str_contains($message, 'metrics') || str_contains($message, 'track')) {
            return 'Analytics are crucial for measuring marketing performance. Key metrics include traffic, conversion rate, bounce rate, and ROI. Tools like Google Analytics provide insights to optimize your strategies. What specific metrics are you interested in tracking?';
        }
        
        // Default response if no keywords match
        return "That's an interesting question about digital marketing. To provide more specific guidance, could you elaborate a bit more on what you're looking to achieve?";
    }
    
    /**
     * Get pre-built suggested questions for new users
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSuggestedQuestions()
    {
        $suggestions = [
            'What is SEO and why is it important?',
            'How can I improve my social media strategy?',
            'What are the best content marketing practices?',
            'How do I measure the success of my digital marketing?',
            'What is the role of email marketing in 2025?',
            'How can I optimize my website for conversions?'
        ];
        
        return response()->json([
            'success' => true,
            'suggestions' => $suggestions
        ]);
    }
}
