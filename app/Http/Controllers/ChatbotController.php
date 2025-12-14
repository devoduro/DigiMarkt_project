<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ChatbotConversation;
use Illuminate\Support\Str;
use App\Models\WorkPackage;
use App\Models\ProjectActivity;
use App\Models\Milestone;
use App\Models\Document;

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
        $startTime = microtime(true);
        
        // Validate request data
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
            'session_id' => 'nullable|string'
        ]);

        // Extract the user message
        $userMessage = $validated['message'];
        $sessionId = $validated['session_id']
            ?? ($request->hasSession() ? $request->session()->getId() : null)
            ?? Str::uuid()->toString();
        
        try {
            // Generate rule-based response
            $response = $this->generateResponse($userMessage);
            
            // Calculate response time
            $responseTime = (int)((microtime(true) - $startTime) * 1000);

            // Store conversation in database
            ChatbotConversation::create([
                'session_id' => $sessionId,
                'ip_address' => $request->ip(),
                'user_message' => $userMessage,
                'bot_response' => $response,
                'response_type' => 'rule-based',
                'response_time_ms' => $responseTime,
                'tokens_used' => null
            ]);
            
            // Log the interaction
            Log::info('Chatbot interaction', [
                'session_id' => $sessionId,
                'user_message' => $userMessage,
                'response_time_ms' => $responseTime
            ]);
            
            return response()->json([
                'success' => true,
                'response' => $response,
                'session_id' => $sessionId,
                'response_type' => 'rule-based',
                'response_time_ms' => $responseTime
            ]);
            
        } catch (\Exception $e) {
            Log::error('Chatbot error', [
                'message' => $e->getMessage(),
                'user_message' => $userMessage,
                'session_id' => $sessionId
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
        
        // Leadership and Governance - Highest Priority (must be first)
        if (str_contains($message, 'who leads') || str_contains($message, 'who is leading') || str_contains($message, 'leadership')) {
            return '**DigiMarkt Project Leadership**\n\n' .
                   'The DigiMarkt project is led by a collaborative Management Board with representatives from all six partner institutions.\n\n' .
                   '**Project Coordinator:**\n' .
                   'The project coordinator leads overall project coordination, institutional management, and ensures smooth collaboration between European and Ghanaian partners.\n\n' .
                   '**Partner Representatives:**\n' .
                   '• European partners: Slovak University of Agriculture, Steinbeis (Germany), and INT@E (Germany)\n' .
                   '• Ghanaian partners: AAMUSTED, Bolgatanga Technical University, and Cape Coast Technical University\n\n' .
                   'Each partner institution has a designated representative on the Management Board who contributes to strategic decisions and project implementation. Visit the Management Board page for detailed information about each leader!';
        }
        
        // Governance Structure - Highest Priority (must be before employment handler)
        if (str_contains($message, 'governance') || str_contains($message, 'steering') || str_contains($message, 'working group')) {
            return '**DigiMarkt Governance Structure**\n\n' .
                   'The project operates through a well-defined governance framework ensuring effective implementation and quality outcomes.\n\n' .
                   '**Steering Committee:**\n' .
                   'The Steering Committee provides strategic oversight and is responsible for:\n' .
                   '• Strategic decision making\n' .
                   '• Project oversight and governance\n' .
                   '• Quality assurance\n' .
                   '• Risk management\n' .
                   '• Ensuring alignment with EU funding requirements\n\n' .
                   '**Working Groups:**\n' .
                   'Specialized working groups handle operational aspects:\n' .
                   '• Technical implementation\n' .
                   '• Curriculum development\n' .
                   '• Training coordination\n' .
                   '• Dissemination activities\n\n' .
                   '**Decision-Making Process:**\n' .
                   'The governance structure ensures collaborative decision-making with input from all partner institutions, maintaining transparency and accountability throughout the project lifecycle.\n\n' .
                   'Visit the Management Board page to learn more about the governance framework!';
        }
        
        // Welcome and Help - For new visitors
        if (str_contains($message, 'help') || str_contains($message, 'what can you do') || str_contains($message, 'how can you help') || str_contains($message, 'guide me') || str_contains($message, 'show me around')) {
            return '**Welcome to DigiMarkt! I\'m your project guide.**\n\n' .
                   'I can help you learn about:\n' .
                   '• **Project Overview**: What DigiMarkt is, objectives, and funding\n' .
                   '• **Partners**: Our 6 partner institutions from Ghana and Europe\n' .
                   '• **Work Packages**: 5 work packages (WP1-WP5) and their tasks\n' .
                   '• **Activities**: Project events, workshops, and training sessions\n' .
                   '• **Milestones & Deliverables**: Project progress and outputs\n' .
                   '• **Digital Marketing Labs**: Laboratory setup and equipment\n' .
                   '• **Resources**: Training materials and educational content\n' .
                   '• **Gallery & Videos**: Photos and videos from project activities\n' .
                   '• **News & Updates**: Latest announcements and blog posts\n' .
                   '• **Contact & Participation**: How to get involved\n\n' .
                   'Just ask me anything! For example: "Tell me about the project", "Who are the partners?", "What are work packages?", or "How can I get involved?"';
        }
        
        // Greetings
        if (str_contains($message, 'hello') || str_contains($message, 'hi') || str_contains($message, 'hey') || 
            str_contains($message, 'welcome') || str_contains($message, 'greetings')) {
            return 'Hello! I\'m your DigiMarkt Project Assistant. 👋\n\n' .
                   'I can help you explore our project, partners, activities, work packages, and resources. ' .
                   'Whether you\'re new to the website or looking for specific information, I\'m here to guide you!\n\n' .
                   'Would you like to:\n' .
                   '• Learn about the DigiMarkt project and its objectives?\n' .
                   '• Discover our partner institutions?\n' .
                   '• Explore work packages and activities?\n' .
                   '• Find out how to get involved?\n\n' .
                   'Type "help" to see everything I can assist you with!';
        }
        
        // About the project
        if (str_contains($message, 'about digimarkt') || 
            str_contains($message, 'what is digimarkt') || 
            str_contains($message, 'tell me about the digimarkt project')) {
            return 'The DigiMarkt Project (Digital Marketing in Technical and Vocational Education and Training in Ghana) is an initiative ' .
                   'co-funded by the European Union with a total funding of €394,185.00. Our goal is to enhance digital marketing skills in TVET institutions across Ghana. ' .
                   'The project focuses on building capacity, developing digital marketing curricula, and establishing digital marketing labs in partner institutions.\n\n' .
                   'Key objectives include:\n' .
                   '• Supporting teachers and trainers with new digital skills\n' .
                   '• Improving employability of TVET learners through innovative education programs\n' .
                   '• Setting up digital marketing laboratories for hands-on experience\n' .
                   '• Empowering TVET providers to enhance digital readiness of graduates\n\n' .
                   'Would you like to know more about our partners, activities, or how to get involved?';
        }
        
        // Project partners
        if (str_contains($message, 'partner') || str_contains($message, 'who are the project partners')) {
            return 'The DigiMarkt Project is a collaborative effort between several institutions:\n\n' .
                   '1. **Steinbeis Mediation (Germany)** - Project Coordinator\n' .
                   '2. **INT@E (Germany)** - International Network for Educational Exchange\n' .
                   '3. **Slovak University of Agriculture (SUA, Slovakia)** - Academic Partner\n' .
                   '4. **AAMUSTED (Ghana)** - African Academy for Mathematical Sciences and Technology Education\n' .
                   '5. **Bolgatanga Technical University (Ghana)** - TVET Partner\n' .
                   '6. **Cape Coast Technical University (Ghana)** - TVET Partner\n\n' .
                   'This partnership brings together expertise in digital marketing, education, and vocational training from Europe and Ghana. ' .
                   'Would you like more details about any specific partner or their roles in the project?';
        }
        
        // Project activities
        if (str_contains($message, 'activity') || str_contains($message, 'activities') || str_contains($message, 'what are the project activities')) {
            return '**DigiMarkt Project Activities**\n\n' .
                   'The project includes various activities such as:\n\n' .
                   '• Development of digital marketing curriculum and training materials\n' .
                   '• Training of TVET teachers and trainers in digital marketing\n' .
                   '• Establishment of digital marketing laboratories in partner institutions\n' .
                   '• Workshops and training sessions for students and educators\n' .
                   '• Knowledge transfer between European and Ghanaian institutions\n' .
                   '• Industry partnerships for internships and practical experience\n' .
                   '• Research on digital marketing skills needs in Ghana\n' .
                   '• Conferences and dissemination events\n\n' .
                   '**Stay Updated:**\n' .
                   'Visit the Activities page to see upcoming events, past activities, and photo galleries from our workshops and training sessions.\n\n' .
                   'Would you like more information about any specific activity or how to participate?';
        }
        
        // Get involved
        if (str_contains($message, 'how can i get involved') || str_contains($message, 'how to get involved') || str_contains($message, 'get involved')) {
            return '**Get Involved with DigiMarkt**\n\n' .
                   'There are several ways to engage with the project:\n\n' .
                   '1. **For TVET Institutions**: Partner with us to implement the digital marketing curriculum\n' .
                   '2. **For Educators**: Participate in our train-the-trainer programs\n' .
                   '3. **For Students**: Enroll in digital marketing courses at partner institutions\n' .
                   '4. **For Industry Partners**: Offer internships or collaborate on curriculum development\n' .
                   '5. **For Researchers**: Contribute to our studies on digital skills in Ghana\n' .
                   '6. **For Organizations**: Access our training materials and resources\n\n' .
                   '**Next Steps:**\n' .
                   'Visit the Contact page to reach out to the project team with your specific interests and inquiries. We welcome collaboration and knowledge sharing!\n\n' .
                   'Would you like more specific information about any of these opportunities?';
        }
        
        // Contact information
        if (str_contains($message, 'contact') || str_contains($message, 'how to reach') || 
            str_contains($message, 'get in touch') || str_contains($message, 'email') || str_contains($message, 'phone')) {
            return '**Contact DigiMarkt**\n\n' .
                   'You can reach the project team through:\n\n' .
                   '• **Contact Form**: Visit the Contact page on this website\n' .
                   '• **Email**: Available on the Contact page\n' .
                   '• **Social Media**: Follow us for updates and announcements\n\n' .
                   '**For Specific Inquiries:**\n' .
                   '• Partnership opportunities\n' .
                   '• Training program enrollment\n' .
                   '• Resource access\n' .
                   '• Collaboration proposals\n' .
                   '• General project information\n\n' .
                   'The project welcomes inquiries from TVET institutions, students, educators, and stakeholders interested in digital marketing education in Ghana.';
        }
        
        if (str_contains($message, 'bye') || str_contains($message, 'goodbye') || 
            str_contains($message, 'thank you') || str_contains($message, 'thanks')) {
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
        
        // Laboratory (must check for 'resource' first to avoid false matches)
        if ((str_contains($message, 'lab') && !str_contains($message, 'available') && !str_contains($message, 'collab')) || str_contains($message, 'laboratory') || str_contains($message, 'equipment')) {
            return '**Digital Marketing Laboratories**\n\n' .
                   'One of DigiMarkt\'s key objectives is to set up state-of-the-art digital marketing laboratories at partner institutions in Ghana.\n\n' .
                   '**Lab Features:**\n' .
                   '• Modern computers and hardware\n' .
                   '• Professional digital marketing software\n' .
                   '• High-speed internet connectivity\n' .
                   '• Industry-standard tools and platforms\n' .
                   '• Collaborative workspaces\n\n' .
                   '**Purpose:**\n' .
                   'These labs serve as practical learning environments where TVET students can gain hands-on experience with digital marketing tools, practice real-world campaigns, and apply theoretical knowledge. Students learn SEO, social media marketing, content creation, analytics, and more in a professional setting.\n\n' .
                   'Visit the Gallery to see photos of our labs, or check Activities to learn about lab-based training sessions!';
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
        
        // Work Package 1 - Specific (MUST be before employment check)
        if (preg_match('/\bwp\s*1\b|\bwork\s*package\s*1\b/i', $message) || str_contains($message, 'administration') && str_contains($message, 'coordination')) {
            return '**WP1: Project Administration and Coordination**\n\n' .
                   'This work package focuses on the overall management and coordination of the DigiMarkt project.\n\n' .
                   '**Key Tasks:**\n' .
                   '• T1.1 Initial Meeting to kick off the project\n' .
                   '• T1.2 Management and monitoring meetings\n' .
                   '• T1.3 Project report, midterm and final reports\n\n' .
                   '**Objectives:**\n' .
                   'WP1 ensures smooth project implementation through regular coordination meetings, progress monitoring, financial management, and timely reporting to the European Union. This work package is led by the project coordinator and involves all partner institutions in governance and decision-making processes.';
        }
        
        // Work Package 2 - Specific (MUST be before employment check)
        if (preg_match('/\bwp\s*2\b|\bwork\s*package\s*2\b/i', $message) || str_contains($message, 'needs analysis') || str_contains($message, 'entrepreneurship')) {
            return '**WP2: Social Digital Entrepreneurship and Needs Analysis**\n\n' .
                   'This work package conducts comprehensive research to understand the digital marketing skills needs in Ghana\'s TVET sector.\n\n' .
                   '**Key Tasks:**\n' .
                   '• T2.1 Field research and data collection\n' .
                   '• T2.2 Project questionnaire analysis and definition\n' .
                   '• T2.3 Road map for project implementation and reports delivery\n\n' .
                   '**Objectives:**\n' .
                   'WP2 ensures the project is grounded in real market needs through systematic data collection, stakeholder consultations, and analysis of digital marketing skill gaps. The findings inform curriculum development and training priorities, ensuring DigiMarkt delivers relevant and impactful education programs.';
        }
        
        // Work Package 3 - Specific (MUST be before employment check)
        if (preg_match('/\bwp\s*3\b|\bwork\s*package\s*3\b/i', $message) || str_contains($message, 'training material') || str_contains($message, 'mentorship')) {
            return '**WP3: Training Materials and Mentorship**\n\n' .
                   'This is the core implementation work package focused on building capacity and developing educational resources.\n\n' .
                   '**Key Tasks:**\n' .
                   '• T3.1 Purchase equipment, design and establish training labs\n' .
                   '• T3.2 Transfer of EU experience and staff training\n' .
                   '• T3.3 Design training courses and learning materials\n' .
                   '• T3.4 Develop an innovation model for academia-industry collaboration\n\n' .
                   '**Objectives:**\n' .
                   'WP3 establishes digital marketing laboratories at partner institutions, develops comprehensive curricula and training materials, trains TVET teachers and trainers, and creates sustainable partnerships between academia and industry. This work package directly impacts the quality of digital marketing education delivered to students.';
        }
        
        // Work Package 4 - Specific (MUST be before employment check)
        if (preg_match('/\bwp\s*4\b|\bwork\s*package\s*4\b/i', $message) || str_contains($message, 'quality') && (str_contains($message, 'evaluation') || str_contains($message, 'assurance'))) {
            return '**WP4: Quality Evaluation and Assurance**\n\n' .
                   'This work package ensures the project maintains high standards and achieves its intended impact.\n\n' .
                   '**Key Tasks:**\n' .
                   '• T4.1 Develop a quality plan\n' .
                   '• T4.2 Evaluate and monitor project activities\n' .
                   '• T4.3 Evaluate impact and external reports\n\n' .
                   '**Objectives:**\n' .
                   'WP4 establishes quality benchmarks, monitors project implementation, evaluates the effectiveness of training programs, assesses student learning outcomes, and measures the overall impact of DigiMarkt on TVET education in Ghana. Regular quality assessments ensure continuous improvement and accountability.';
        }
        
        // Work Package 5 - Specific (MUST be before employment check)
        if (preg_match('/\bwp\s*5\b|\bwork\s*package\s*5\b/i', $message) || str_contains($message, 'dissemination') || str_contains($message, 'impact') && str_contains($message, 'project')) {
            return '**WP5: Project Impact and Dissemination**\n\n' .
                   'This work package focuses on sharing project results and ensuring long-term sustainability.\n\n' .
                   '**Key Tasks:**\n' .
                   '• T5.1 Develop project website\n' .
                   '• T5.2 Dissemination planning\n' .
                   '• T5.3 Organize workshops and conferences\n' .
                   '• T5.4 Sustainable planning\n\n' .
                   '**Objectives:**\n' .
                   'WP5 maximizes project visibility and impact through strategic communication, knowledge sharing, and stakeholder engagement. Activities include developing and maintaining the project website, organizing dissemination events, publishing research findings, and creating a sustainability plan to ensure project benefits continue beyond the funding period.';
        }
        
        // Work Packages - General (MUST be before employment check)
        if (str_contains($message, 'work package') || preg_match('/\bwp\b|\bwork\s*packages\b/', $message)) {
            return 'The DigiMarkt project is organized into five key work packages, each with specific objectives and deliverables:\n\n' .
                   '**WP1: Project Administration and Coordination**\n' .
                   'Focuses on initial meetings, management and monitoring meetings, project reports, midterm and final reports. Key tasks include the initial meeting to kick off the project, management and monitoring meetings, and project reporting.\n\n' .
                   '**WP2: Social Digital Entrepreneurship and Needs Analysis**\n' .
                   'Involves field research, data collection, questionnaire analysis, and roadmap for project implementation. This work package ensures the project is grounded in real needs and market analysis.\n\n' .
                   '**WP3: Training Materials and Mentorship**\n' .
                   'Covers equipment purchase, lab setup, EU experience transfer, staff training, and curriculum development. Tasks include establishing training labs, transferring EU experience and staff training, designing training courses and learning materials, and developing an innovation model for academia-industry collaboration.\n\n' .
                   '**WP4: Quality Evaluation and Assurance**\n' .
                   'Ensures quality plan development, project activity monitoring, and impact evaluation. This work package maintains high standards throughout the project lifecycle.\n\n' .
                   '**WP5: Project Impact and Dissemination**\n' .
                   'Focuses on dissemination of project results and sustainability planning. Tasks include developing the project website, dissemination planning, organizing workshops and conferences, and sustainable planning for long-term impact.\n\n' .
                   'Each work package contributes to the overall success of DigiMarkt in enhancing digital marketing education in TVET institutions across Ghana. Ask me about a specific work package (WP1-WP5) for more details!';
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
            return '**DigiMarkt Resources & Materials**\n\n' .
                   'We provide comprehensive training materials and resources for digital marketing education:\n\n' .
                   '**Available Resources:**\n' .
                   '• Digital marketing curricula and syllabi\n' .
                   '• Teaching guides for instructors\n' .
                   '• Practical exercises and assignments\n' .
                   '• Case studies from Ghanaian context\n' .
                   '• Digital marketing tools and templates\n' .
                   '• Video tutorials and presentations\n' .
                   '• Research papers and reports\n\n' .
                   '**Access:**\n' .
                   'Many resources are available for download on the Resources page. Some materials require registration for access. All materials are designed to be practical and applicable to the Ghanaian TVET context.\n\n' .
                   'Visit the Resources section to browse and download materials!';
        }
        
        // Participation and Involvement (check specific phrases first)
        if (str_contains($message, 'how to join') || str_contains($message, 'how do i join') || str_contains($message, 'how can i join') || str_contains($message, 'participate') || str_contains($message, 'get involved') || str_contains($message, 'be involved')) {
            return 'There are several ways to engage with DigiMarkt: 1) TVET institutions can access the training materials and resources developed by the project, 2) Teachers and trainers can benefit from the professional development programmes, 3) Students can enroll in digital marketing courses at partner institutions, 4) Organizations can explore collaboration opportunities. For specific inquiries about participation, please use the contact form on this website to reach out to the project team.';
        }
        
        // Partnership and Collaboration
        if (str_contains($message, 'become a partner') || str_contains($message, 'join the project') || str_contains($message, 'join as partner') || str_contains($message, 'collaborate') || str_contains($message, 'partnership')) {
            return 'Thank you for your interest in DigiMarkt! The current project consortium consists of six partner institutions. However, the project welcomes collaboration and knowledge sharing with interested TVET institutions, organizations, and stakeholders. For inquiries about collaboration opportunities, partnerships, or accessing project resources, please contact us through the contact page on this website. The project team will be happy to discuss how you can engage with DigiMarkt activities.';
        }
        
        // Registration and Enrollment
        if (str_contains($message, 'register') || str_contains($message, 'enroll') || str_contains($message, 'sign up') || str_contains($message, 'apply')) {
            return 'If you\'re interested in enrolling in digital marketing courses, please contact the partner institutions directly: AAMUSTED, Bolgatanga Technical University (BTU), or Cape Coast Technical University (CCTU). Each institution has its own admission process for TVET programmes. For access to online resources and materials, you can register on this website. For other inquiries, please visit our contact page.';
        }
        
        // Location and Visit
        if (str_contains($message, 'where') || str_contains($message, 'location') || str_contains($message, 'visit') || str_contains($message, 'address')) {
            return 'DigiMarkt is implemented across multiple locations in Ghana and Europe. The Ghanaian partner institutions are: AAMUSTED (Kumasi), Bolgatanga Technical University (Bolgatanga, Upper East Region), and Cape Coast Technical University (Cape Coast, Central Region). European partners are based in Germany (Steinbeis and INT@E) and Slovakia (Slovak University of Agriculture in Nitra). For specific addresses and contact details, please visit the contact or partners page on this website.';
        }
        
        // Milestones
        if (str_contains($message, 'milestone') || str_contains($message, 'progress') || str_contains($message, 'achievement')) {
            $milestones = Milestone::query()
                ->orderBy('display_order')
                ->orderBy('created_at', 'desc')
                ->get(['title', 'date', 'status', 'completion_percentage', 'description']);

            if ($milestones->isEmpty()) {
                return 'There are currently no milestones available.';
            }

            $lines = [];
            foreach ($milestones as $idx => $milestone) {
                $n = $idx + 1;
                $title = $milestone->title;
                $date = $milestone->date;
                $status = $milestone->status;
                $pct = (int) $milestone->completion_percentage;
                // Truncate description to first 80 chars
                $desc = strlen($milestone->description) > 80 
                    ? substr($milestone->description, 0, 80) . '...' 
                    : $milestone->description;
                $lines[] = "$n) $title — $date — $status ($pct%)\n   $desc";
            }

            $intro = 'Here are the project milestones:';
            return $intro . "\n\n" . implode("\n\n", $lines);
        }
        
        // Deliverables
        if (str_contains($message, 'deliverable') || str_contains($message, 'output') || str_contains($message, 'result')) {
            $deliverables = Document::query()
                ->where('is_published', true)
                ->latest()
                ->get(['title', 'category', 'file_name', 'description']);

            if ($deliverables->isEmpty()) {
                return 'There are currently no published deliverables available.';
            }

            $lines = [];
            foreach ($deliverables as $idx => $deliverable) {
                $n = $idx + 1;
                $title = $deliverable->title;
                $category = $deliverable->category ?? 'General';
                // Truncate description to first 80 chars
                $desc = strlen($deliverable->description) > 80 
                    ? substr($deliverable->description, 0, 80) . '...' 
                    : $deliverable->description;
                $lines[] = "$n) $title — $category\n   $desc";
            }

            $intro = 'Here are the published deliverables:';
            return $intro . "\n\n" . implode("\n\n", $lines);
        }
        
        // News and Blog
        if (str_contains($message, 'news') || str_contains($message, 'blog') || str_contains($message, 'update') || str_contains($message, 'announcement') || str_contains($message, 'latest')) {
            return 'Stay updated with the latest DigiMarkt news, announcements, and blog posts! The website features regular updates about project activities, success stories, partner highlights, training sessions, and important announcements. Visit the News section to read the latest articles and stay informed about project developments and achievements.';
        }
        
        // Gallery and Photos
        if (str_contains($message, 'gallery') || str_contains($message, 'photo') || str_contains($message, 'image') || str_contains($message, 'picture')) {
            return 'The DigiMarkt Gallery showcases photos from project activities, training sessions, laboratory setups, partner meetings, and events. Visual documentation helps tell the story of the project\'s impact on TVET education in Ghana. Browse the Gallery page to see images from various project activities and milestones.';
        }
        
        // Videos
        if (str_contains($message, 'video') || str_contains($message, 'watch') || str_contains($message, 'recording')) {
            return 'DigiMarkt produces educational videos and documentation of project activities. These videos include training sessions, testimonials, laboratory tours, partner interviews, and instructional content on digital marketing topics. Visit the Videos page to watch content that brings the project to life and provides insights into digital marketing education in TVET.';
        }
        
        // Activities and Events
        if (str_contains($message, 'activit') || str_contains($message, 'event') || str_contains($message, 'workshop') || str_contains($message, 'training session')) {
            $activities = ProjectActivity::query()
                ->orderBy('created_at', 'desc')
                ->get(['title', 'date', 'status', 'description']);

            if ($activities->isEmpty()) {
                return 'There are currently no project activities available.';
            }

            $lines = [];
            foreach ($activities as $idx => $activity) {
                $n = $idx + 1;
                $title = $activity->title;
                $date = $activity->date;
                $status = $activity->status;
                // Truncate description to first 100 chars
                $desc = strlen($activity->description) > 100 
                    ? substr($activity->description, 0, 100) . '...' 
                    : $activity->description;
                $lines[] = "$n) $title — $date — $status\n   $desc";
            }

            $intro = 'Here are the project activities:';
            return $intro . "\n\n" . implode("\n\n", $lines);
        }
        
        // News and Blog
        if (str_contains($message, 'news') || str_contains($message, 'blog') || str_contains($message, 'update') || str_contains($message, 'announcement') || str_contains($message, 'latest')) {
            return 'Stay updated with the latest DigiMarkt news, announcements, and blog posts! The website features regular updates about project activities, success stories, partner highlights, training sessions, and important announcements. Visit the News section to read the latest articles and stay informed about project developments and achievements.';
        }
        
        // Gallery and Photos
        if (str_contains($message, 'gallery') || str_contains($message, 'photo') || str_contains($message, 'image') || str_contains($message, 'picture')) {
            return 'The DigiMarkt Gallery showcases photos from project activities, training sessions, laboratory setups, partner meetings, and events. Visual documentation helps tell the story of the project\'s impact on TVET education in Ghana. Browse the Gallery page to see images from various project activities and milestones.';
        }
        
        // Videos
        if (str_contains($message, 'video') || str_contains($message, 'watch') || str_contains($message, 'recording')) {
            return 'DigiMarkt produces educational videos and documentation of project activities. These videos include training sessions, testimonials, laboratory tours, partner interviews, and instructional content on digital marketing topics. Visit the Videos page to watch content that brings the project to life and provides insights into digital marketing education in TVET.';
        }

        // Resources and Downloads
        if (str_contains($message, 'resource') || str_contains($message, 'material') || str_contains($message, 'download') || str_contains($message, 'document')) {
            return 'DigiMarkt provides comprehensive resources including curricula, teaching guides, practical exercises, case studies, digital tools, and learning materials. Many resources are available for download on the Resources page. These materials are designed to be practical and applicable to the Ghanaian TVET context. Registered users can access additional exclusive resources.';
        }
        
        // Management Board and Leadership
        if (str_contains($message, 'management') || str_contains($message, 'board') || str_contains($message, 'leader') || str_contains($message, 'coordinator') || str_contains($message, 'team')) {
            return '**DigiMarkt Management Board**\n\n' .
                   'The project is led by a Management Board comprising representatives from all six partner institutions, ensuring collaborative governance and effective project implementation.\n\n' .
                   '**Leadership Structure:**\n\n' .
                   '**Project Coordinator:**\n' .
                   'Leads overall project coordination and institutional management\n\n' .
                   '**Partner Institution Leaders:**\n' .
                   '• **European Partners:**\n' .
                   '  - Slovak University of Agriculture (Slovakia)\n' .
                   '  - Steinbeis Beratungszentren GmbH (Germany)\n' .
                   '  - INT@E - Innovative Technologies and Education (Germany)\n\n' .
                   '• **Ghanaian Partners:**\n' .
                   '  - AAMUSTED (Akenten Appiah-Menka University)\n' .
                   '  - Bolgatanga Technical University (BTU)\n' .
                   '  - Cape Coast Technical University (CCTU)\n\n' .
                   '**Governance Structure:**\n\n' .
                   '**Steering Committee:**\n' .
                   '• Strategic decision making\n' .
                   '• Project oversight and governance\n' .
                   '• Quality assurance\n' .
                   '• Risk management\n\n' .
                   '**Working Groups:**\n' .
                   '• Technical implementation\n' .
                   '• Curriculum development\n' .
                   '• Training coordination\n' .
                   '• Dissemination activities\n\n' .
                   '**Responsibilities:**\n' .
                   'The Management Board oversees project implementation, ensures quality standards, manages resources, coordinates activities across Ghana and Europe, and maintains alignment with EU funding requirements.\n\n' .
                   'For inquiries about project governance or partnership opportunities, you can contact the Management Board through the Contact page.\n\n' .
                   'Visit the Management Board page to learn more about the leadership team and their roles in driving the project\'s success!';
        }
        
        // Website Navigation and Pages
        if (str_contains($message, 'navigate') || str_contains($message, 'website') || str_contains($message, 'pages') || str_contains($message, 'sections') || str_contains($message, 'where can i find')) {
            return '**DigiMarkt Website Navigation**\n\n' .
                   'The website is organized into the following main sections:\n\n' .
                   '**About:**\n' .
                   '• Project Objectives\n' .
                   '• Partners\n' .
                   '• Management Board\n\n' .
                   '**Project Content:**\n' .
                   '• Activities (events, workshops, training)\n' .
                   '• Work Packages (WP1-WP5)\n' .
                   '• Milestones & Deliverables\n\n' .
                   '**Resources:**\n' .
                   '• Training Materials\n' .
                   '• Documents & Downloads\n\n' .
                   '**Media:**\n' .
                   '• Gallery (photos)\n' .
                   '• Videos\n' .
                   '• News & Blog\n\n' .
                   '**Labs:**\n' .
                   '• About Labs\n' .
                   '• Lab Photos\n' .
                   '• Lab Activities\n\n' .
                   '**Contact:**\n' .
                   '• Contact Form\n' .
                   '• Get Involved\n\n' .
                   'What section would you like to explore?';
        }
        
        // About Page
        if (str_contains($message, 'about') || str_contains($message, 'who are you') || str_contains($message, 'tell me more')) {
            return 'DigiMarkt (Digital Marketing in Technical and Vocational Education and Training) is an EU-funded project empowering TVET institutions in Ghana with digital marketing education. The project brings together six partner institutions from Ghana, Germany, and Slovakia to develop curricula, establish laboratories, train teachers, and equip students with in-demand digital skills. Visit the About page for comprehensive information about the project\'s background, vision, and impact.';
        }
        
        // Help and Support
        if (str_contains($message, 'help') || str_contains($message, 'support') || str_contains($message, 'assist')) {
            return 'I\'m here to help! I can provide information about: DigiMarkt project overview, objectives, partners, EU funding, TVET education, digital marketing topics (SEO, social media, content marketing, email marketing, PPC, analytics), laboratories, teacher training, student benefits, curriculum, career opportunities, milestones, deliverables, activities, news, gallery, videos, resources, management board, and more. What would you like to know?';
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
            'How to join the project?',
            'What is TVET?',
            'How is the project funded?',
            'What digital marketing topics are covered?',
            'Tell me about project activities',
            'Show me the latest news',
            'What are the project milestones?',
            'What resources are available?',
            'How does DigiMarkt help students?'
        ];
        
        return response()->json([
            'success' => true,
            'suggestions' => $suggestions
        ]);
    }
}
