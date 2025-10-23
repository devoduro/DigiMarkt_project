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
        
        // Greetings
        if (str_contains($message, 'hello') || str_contains($message, 'hi') || str_contains($message, 'hey')) {
            return 'Hello! Welcome to DigiMarkt - the Digital Marketing in Technical and Vocational Education and Training project in Ghana. How can I assist you today?';
        }
        
        if (str_contains($message, 'bye') || str_contains($message, 'goodbye')) {
            return 'Goodbye! Thank you for learning about DigiMarkt. Feel free to return if you have more questions about our project.';
        }
        
        if (str_contains($message, 'thank')) {
            return "You're welcome! Is there anything else you'd like to know about DigiMarkt or digital marketing in TVET?";
        }
        
        // DigiMarkt Project Information
        if (str_contains($message, 'digimarkt') || str_contains($message, 'about project') || str_contains($message, 'what is this')) {
            return 'DigiMarkt (Digital Marketing in Technical and Vocational Education and Training) is an EU-funded project with total funding of €394,185.00. The aim is to empower training providers and learners to enhance their digital readiness for TVET in Ghana. The project runs for two years and focuses on building digital marketing skills, setting up digital marketing laboratories, and improving the competences of TVET learners and teachers.';
        }
        
        // Project Objectives
        if (str_contains($message, 'objective') || str_contains($message, 'goal') || str_contains($message, 'aim')) {
            return 'DigiMarkt has four main objectives: 1) Support teachers and trainers with new digital skills and competences, 2) Improve the level of competences, skills and employability potential of TVET learners by developing innovative TVET education programmes in ICT skills, 3) Set up digital marketing laboratories to enable students to interact and enhance their competency in Digital TVET marketing, 4) Empower TVET providers to enhance the resilience and digital readiness of TVET graduates in Ghana.';
        }
        
        // Funding
        if (str_contains($message, 'fund') || str_contains($message, 'budget') || str_contains($message, 'money') || str_contains($message, 'eu')) {
            return 'The DigiMarkt project is co-funded by the European Union with a total funding of €394,185.00. This funding supports the development of digital marketing education infrastructure, training materials, and capacity building activities across partner institutions in Ghana and Europe.';
        }
        
        // Partners - General
        if (str_contains($message, 'partner') && !str_contains($message, 'aamusted') && !str_contains($message, 'btu') && !str_contains($message, 'cctu')) {
            return 'DigiMarkt is implemented by six partner institutions: European Partners - Steinbeis Beratungszentrum (SBZ) from Germany, INT@E from Germany, and Slovak University of Agriculture (SUA) from Slovakia. Ghanaian Partners - Akenten Appiah-Menka University of Skills Training and Entrepreneurial Development (AAMUSTED), Bolgatanga Technical University (BTU), and Cape Coast Technical University (CCTU).';
        }
        
        // AAMUSTED
        if (str_contains($message, 'aamusted') || str_contains($message, 'akenten')) {
            return 'AAMUSTED (Akenten Appiah-Menka University of Skills Training and Entrepreneurial Development) is Ghana\'s Premier Public TVET and Entrepreneurial Development Teacher Education University. Their mission is to train and provide relevant TVET and entrepreneurial development teachers and other professionals for TVET institutions and industry. Core values include Excellence with Integrity, Education for Work and Development, Creativity, Innovation and Invention, Collaboration and Teamwork, Entrepreneurial Development, and Gender Equity, Social Inclusiveness and Diversity.';
        }
        
        // BTU
        if (str_contains($message, 'btu') || str_contains($message, 'bolgatanga')) {
            return 'Bolgatanga Technical University (BTU) is a Ghanaian partner institution. Their vision is to become a preferred technical university with innovative academic programmes producing graduates equipped with new technological skills for sustainable development. Their mission focuses on providing career-focused education, applying state-of-the-art laboratories and workshops for teaching, practical training, applied research, sustainable agricultural and entrepreneurship development. Their niche area is ecological agriculture in line with their agrarian and savannah geographical location.';
        }
        
        // CCTU
        if (str_contains($message, 'cctu') || str_contains($message, 'cape coast')) {
            return 'Cape Coast Technical University (CCTU) is a Ghanaian partner institution. Their vision is to be a leading technologically innovative and entrepreneurial Technical University with a reputation in green and clean energy technologies. Their mission is to provide quality technical, vocational and entrepreneurial education that inspires learners to be creative and driven towards technology-based and sustainable solutions for communities and industries within the country and the sub-region.';
        }
        
        // SUA
        if (str_contains($message, 'sua') || str_contains($message, 'slovak')) {
            return 'The Slovak University of Agriculture in Nitra (SUA) has been a leading university since 1952. The university provides education in agriculture and related research areas including agrobiology, food resources, sustainable agriculture, biotechnology, food technology, engineering, computerization, gardening and landscape design, economics and management, international trade, marketing, rural tourism development, and project management. They are committed to conducting world-class research and teaching.';
        }
        
        // Steinbeis
        if (str_contains($message, 'steinbeis') || str_contains($message, 'sbz')) {
            return 'Steinbeis Beratungszentren GmbH, headquartered in Leipzig, Germany, is a premier institute specializing in mediation, conflict management, and organizational development. They offer expert services in handling escalated conflict situations and citizen participation in infrastructure projects. Over the past two decades, they have gained expertise in project management by leading multiple cross-national EU grant-aided projects.';
        }
        
        // INT@E
        if (str_contains($message, 'int@e') || str_contains($message, 'inte')) {
            return 'INT@E UG is a German firm providing vocational training, innovative computer and medical technology training, knowledge management, mobile learning, e-learning, collaborative research and innovation. They have extensive experience in supporting reform processes in Higher Education in third countries through EU Programs like Tempus and Erasmus Plus. INT@E helps partners use new technologies and develop new courses in agriculture, sport, digital marketing and AI.';
        }
        
        // Duration
        if (str_contains($message, 'duration') || str_contains($message, 'how long') || str_contains($message, 'timeline')) {
            return 'The DigiMarkt project has a duration of two years. During this period, the project partners will work together to develop digital marketing curricula, establish digital marketing laboratories, train teachers and trainers, and create sustainable resources for TVET institutions in Ghana.';
        }
        
        // TVET
        if (str_contains($message, 'tvet') || str_contains($message, 'technical vocational')) {
            return 'TVET stands for Technical and Vocational Education and Training. It focuses on providing practical skills and knowledge for specific trades, occupations, and vocations. DigiMarkt aims to enhance TVET in Ghana by integrating digital marketing skills into the curriculum, making graduates more competitive and employable in the digital economy.';
        }
        
        // Digital Marketing Topics
        if (str_contains($message, 'seo') || str_contains($message, 'search engine')) {
            return 'SEO (Search Engine Optimization) is a key component of digital marketing education in the DigiMarkt project. It involves optimizing website content, structure, and backlinks to rank higher in search results. TVET students will learn practical SEO techniques to help businesses improve their online visibility and attract more customers.';
        }
        
        if (str_contains($message, 'social media') || str_contains($message, 'facebook') || str_contains($message, 'instagram') || str_contains($message, 'twitter') || str_contains($message, 'linkedin')) {
            return 'Social media marketing is an essential part of the DigiMarkt curriculum. Students learn how to leverage platforms like Facebook, Instagram, LinkedIn, and Twitter for business growth. Each platform has unique advantages - LinkedIn for B2B, Instagram for visual products, Facebook for community building, and Twitter for real-time engagement. The project equips TVET learners with practical skills to manage social media campaigns effectively.';
        }
        
        if (str_contains($message, 'content marketing') || str_contains($message, 'blog') || str_contains($message, 'article')) {
            return 'Content marketing is a crucial element of digital marketing education in DigiMarkt. Students learn how to create valuable, relevant content that attracts and retains target audiences. This includes blog writing, article creation, video content, infographics, and more. The project emphasizes practical content strategy development aligned with business objectives.';
        }
        
        if (str_contains($message, 'email marketing')) {
            return 'Email marketing is taught as one of the highest-ROI digital channels in the DigiMarkt curriculum. TVET learners discover how to build quality email lists, craft compelling subject lines, segment audiences for targeted campaigns, and measure campaign performance. These skills are essential for businesses looking to maintain customer relationships and drive conversions.';
        }
        
        if (str_contains($message, 'ppc') || str_contains($message, 'pay per click') || str_contains($message, 'google ads') || str_contains($message, 'advertising')) {
            return 'PPC (Pay-Per-Click) advertising and digital advertising are important topics in DigiMarkt training. Students learn how to create and manage Google Ads campaigns, social media ads, and display network advertising. The curriculum covers targeting options, budget management, ad copywriting, and campaign optimization to maximize return on investment.';
        }
        
        if (str_contains($message, 'analytics') || str_contains($message, 'metrics') || str_contains($message, 'track') || str_contains($message, 'measurement')) {
            return 'Analytics and metrics are fundamental to the DigiMarkt curriculum. Students learn to use tools like Google Analytics to measure marketing performance. Key metrics covered include website traffic, conversion rates, bounce rates, ROI, engagement rates, and customer acquisition costs. Data-driven decision making is emphasized throughout the training.';
        }
        
        // Laboratory
        if (str_contains($message, 'lab') || str_contains($message, 'laboratory') || str_contains($message, 'equipment')) {
            return 'One of DigiMarkt\'s key objectives is to set up digital marketing laboratories at partner institutions in Ghana. These labs will be equipped with modern computers, software, and internet connectivity to enable students to gain hands-on experience with digital marketing tools and platforms. The laboratories will serve as practical learning environments where students can apply theoretical knowledge.';
        }
        
        // Teachers and Training
        if (str_contains($message, 'teacher') || str_contains($message, 'trainer') || str_contains($message, 'instructor') || str_contains($message, 'faculty')) {
            return 'DigiMarkt places strong emphasis on training teachers and trainers. The project provides professional development opportunities for TVET instructors to acquire new digital skills and competences. This includes training on innovative online pedagogies, teaching techniques, cutting-edge technologies, and trends in digital marketing. Well-trained teachers are essential for delivering quality digital marketing education to students.';
        }
        
        // Students and Learners
        if (str_contains($message, 'student') || str_contains($message, 'learner') || str_contains($message, 'youth')) {
            return 'DigiMarkt empowers TVET students and learners with digital marketing skills that enhance their employability. The project focuses on developing competences in ICT skills, digital tools, online marketing strategies, and practical application of digital marketing concepts. By equipping youth with these in-demand skills, DigiMarkt helps prepare them for careers in the digital economy.';
        }
        
        // Sustainability
        if (str_contains($message, 'sustain') || str_contains($message, 'future') || str_contains($message, 'long term')) {
            return 'Sustainability is a core principle of DigiMarkt. The project ensures long-term impact by creating an online micro-learning unit on digital marketing that will be available to all interested organizations and learners in English. Training materials, curricula, and resources developed during the project will remain accessible to TVET institutions beyond the project duration, ensuring continued benefit to the education sector in Ghana.';
        }
        
        // Curriculum and Course
        if (str_contains($message, 'curriculum') || str_contains($message, 'course') || str_contains($message, 'program')) {
            return 'DigiMarkt develops innovative TVET education programmes focused on digital marketing. The curriculum covers essential topics including SEO, social media marketing, content marketing, email marketing, PPC advertising, analytics, digital strategy, and emerging technologies. The courses are designed to be practical, hands-on, and aligned with industry needs to ensure graduates are job-ready.';
        }
        
        // Employment and Career
        if (str_contains($message, 'employ') || str_contains($message, 'job') || str_contains($message, 'career') || str_contains($message, 'work')) {
            return 'DigiMarkt significantly improves the employability potential of TVET learners. Digital marketing skills are in high demand across industries. Graduates of the program will be equipped to work as digital marketing specialists, social media managers, content creators, SEO analysts, digital strategists, and more. The project bridges the skills gap between education and industry requirements.';
        }
        
        // Contact and More Information
        if (str_contains($message, 'contact') || str_contains($message, 'reach') || str_contains($message, 'get in touch')) {
            return 'For more information about DigiMarkt, you can visit the contact page on this website. The project welcomes inquiries from interested TVET institutions, students, educators, and stakeholders who want to learn more about digital marketing education in Ghana.';
        }
        
        // Resources and Materials
        if (str_contains($message, 'resource') || str_contains($message, 'material') || str_contains($message, 'download')) {
            return 'DigiMarkt develops comprehensive training materials and resources for digital marketing education. These include curricula, teaching guides, practical exercises, case studies, and digital tools. Many resources are available through the project website for registered users. The materials are designed to be practical and applicable to the Ghanaian context.';
        }
        
        // Default response if no keywords match
        return "That's an interesting question! DigiMarkt is focused on digital marketing education in TVET institutions in Ghana. I can provide information about the project objectives, partners, funding, curriculum, digital marketing topics (SEO, social media, content marketing, etc.), laboratories, teacher training, and more. What specific aspect would you like to know about?";
    }
    
    /**
     * Get pre-built suggested questions for new users
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSuggestedQuestions()
    {
        $suggestions = [
            'What is DigiMarkt project about?',
            'Who are the project partners?',
            'What are the project objectives?',
            'Tell me about AAMUSTED',
            'What is TVET?',
            'How is the project funded?',
            'What digital marketing topics are covered?',
            'What are the digital marketing laboratories?',
            'How does DigiMarkt help students?',
            'What is the project duration?'
        ];
        
        return response()->json([
            'success' => true,
            'suggestions' => $suggestions
        ]);
    }
}
