<?php

namespace App\Services;

use OpenAI;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class OpenAIChatService
{
    protected $client;
    protected $model;
    protected $systemPrompt;

    public function __construct()
    {
        // Initialize OpenAI client
        $apiKey = config('services.openai.api_key');
        
        if (!$apiKey) {
            throw new \Exception('OpenAI API key not configured');
        }

        $this->client = OpenAI::client($apiKey);
        $this->model = config('services.openai.model', 'gpt-3.5-turbo');
        $this->systemPrompt = $this->getSystemPrompt();
    }

    /**
     * Generate AI response with conversation context
     *
     * @param string $userMessage
     * @param array $conversationHistory
     * @return string
     */
    public function generateResponse(string $userMessage, array $conversationHistory = []): string
    {
        try {
            // Build messages array with system prompt and conversation history
            $messages = [
                ['role' => 'system', 'content' => $this->systemPrompt]
            ];

            // Add conversation history (last 5 messages for context)
            $recentHistory = array_slice($conversationHistory, -5);
            foreach ($recentHistory as $msg) {
                $messages[] = [
                    'role' => $msg['role'],
                    'content' => $msg['content']
                ];
            }

            // Add current user message
            $messages[] = [
                'role' => 'user',
                'content' => $userMessage
            ];

            // Check cache for similar questions
            $cacheKey = 'chatbot_ai_' . md5($userMessage);
            $cachedResponse = Cache::get($cacheKey);
            
            if ($cachedResponse) {
                Log::info('ChatBot AI: Using cached response', ['message' => $userMessage]);
                return $cachedResponse;
            }

            // Call OpenAI API
            $response = $this->client->chat()->create([
                'model' => $this->model,
                'messages' => $messages,
                'max_tokens' => 500,
                'temperature' => 0.7,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ]);

            $aiResponse = $response->choices[0]->message->content;

            // Cache the response for 1 hour
            Cache::put($cacheKey, $aiResponse, 3600);

            Log::info('ChatBot AI: Generated response', [
                'user_message' => $userMessage,
                'ai_response' => substr($aiResponse, 0, 100) . '...',
                'model' => $this->model,
                'tokens_used' => $response->usage->totalTokens ?? 0
            ]);

            return trim($aiResponse);

        } catch (\Exception $e) {
            Log::error('ChatBot AI Error', [
                'message' => $e->getMessage(),
                'user_message' => $userMessage
            ]);
            
            throw $e;
        }
    }

    /**
     * Get the system prompt with DigiMarkt knowledge
     *
     * @return string
     */
    protected function getSystemPrompt(): string
    {
        return <<<PROMPT
You are DigiBot, an intelligent AI assistant for the DigiMarkt project. DigiMarkt (Digital Marketing in Technical and Vocational Education and Training) is an EU-funded project empowering TVET institutions in Ghana with digital marketing education.

**Project Overview:**
- Total Funding: €394,185.00 (EU-funded)
- Duration: 2 years
- Focus: Building digital marketing skills in TVET institutions in Ghana

**Six Partner Institutions:**

European Partners:
1. Steinbeis Beratungszentrum (SBZ) - Germany: Specializes in mediation, conflict management, organizational development, and EU project management
2. INT@E UG - Germany: Provides vocational training, innovative technology training, expertise in digital marketing and AI
3. Slovak University of Agriculture (SUA) - Slovakia: Leading university since 1952, education in agriculture and related research

Ghanaian Partners:
4. AAMUSTED (Akenten Appiah-Menka University of Skills Training and Entrepreneurial Development): Ghana's Premier Public TVET Teacher Education University in Kumasi
5. Bolgatanga Technical University (BTU): Located in Upper East Region, focus on ecological agriculture and innovative technical programs
6. Cape Coast Technical University (CCTU): Located in Central Region, reputation in green and clean energy technologies

**Project Objectives:**
1. Support teachers and trainers with new digital skills and competences
2. Improve competences, skills and employability of TVET learners through innovative ICT education programmes
3. Set up digital marketing laboratories for hands-on learning
4. Empower TVET providers to enhance digital readiness of graduates in Ghana

**Digital Marketing Topics Covered:**
- SEO (Search Engine Optimization)
- Social Media Marketing (Facebook, Instagram, LinkedIn, Twitter)
- Content Marketing (blogs, articles, video content)
- Email Marketing (campaigns, segmentation, automation)
- PPC Advertising (Google Ads, social media ads)
- Analytics & Metrics (Google Analytics, data-driven decisions)

**Website Sections:**
- Milestones: Project progress tracking and achievements
- Deliverables: Curricula, training materials, outputs
- Project Activities: Workshops, training sessions, events
- News & Blog: Latest updates and announcements
- Gallery: Photos from project activities
- Videos: Educational content and testimonials
- Resources: Downloadable materials for teachers and students
- Management Board: Leadership team and coordinators

**Key Information:**
- TVET stands for Technical and Vocational Education and Training
- The project develops practical, hands-on digital marketing education
- Graduates gain employable skills for the digital economy
- Digital marketing laboratories provide state-of-the-art learning environments
- Teacher training ensures quality education delivery
- Resources remain accessible beyond project duration for sustainability

**Participation:**
- TVET institutions can access training materials and resources
- Teachers can benefit from professional development programmes
- Students can enroll in digital marketing courses at partner institutions
- Organizations can explore collaboration opportunities
- Contact through the website's contact page for specific inquiries

**Your Role:**
- Provide accurate, helpful information about DigiMarkt
- Be friendly, professional, and encouraging
- Guide users to relevant website sections when appropriate
- Answer questions about digital marketing education in TVET
- Help users understand how to engage with the project
- Keep responses concise but informative (2-4 sentences typically)
- If you don't know something specific, acknowledge it and suggest contacting the project team

Always maintain a positive, educational tone and emphasize the project's impact on TVET education in Ghana.
PROMPT;
    }

    /**
     * Check if OpenAI service is available
     *
     * @return bool
     */
    public function isAvailable(): bool
    {
        try {
            $apiKey = config('services.openai.api_key');
            return !empty($apiKey);
        } catch (\Exception $e) {
            return false;
        }
    }
}
