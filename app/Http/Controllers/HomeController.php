<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the home page with dynamic data.
     */
    public function index()
    {
        // Get latest public documents/resources
        $latestDocuments = Document::where('is_public', true)
            ->latest()
            ->take(3)
            ->get();
            
        // Get statistics for the platform
        $stats = [
            'users' => User::count(),
            'documents' => Document::count(),
            'downloads' => 0, // Placeholder until download_count column is added
            'categories' => Document::select('category')->distinct()->count()
        ];
        
        // Get testimonials (in a real app, these would come from a database)
        $testimonials = [
            [
                'name' => 'John Smith',
                'position' => 'Marketing Director',
                'company' => 'TechCorp',
                'content' => 'This platform has transformed how we approach digital marketing. The resources are invaluable!',
                'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg'
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'SEO Specialist',
                'company' => 'Growth Marketing',
                'content' => 'I\'ve been able to improve our search rankings by 200% using the strategies from this platform.',
                'avatar' => 'https://randomuser.me/api/portraits/women/2.jpg'
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Social Media Manager',
                'company' => 'Brand Solutions',
                'content' => 'The deliverables section has saved me countless hours of research and planning.',
                'avatar' => 'https://randomuser.me/api/portraits/men/3.jpg'
            ]
        ];
        
        // Get featured categories
        $categories = [
            [
                'name' => 'Social Media Marketing',
                'icon' => 'share',
                'description' => 'Strategies and tools for effective social media campaigns'
            ],
            [
                'name' => 'SEO Optimization',
                'icon' => 'search',
                'description' => 'Techniques to improve search engine rankings'
            ],
            [
                'name' => 'Content Marketing',
                'icon' => 'document-text',
                'description' => 'Create compelling content that drives engagement'
            ],
            [
                'name' => 'Email Marketing',
                'icon' => 'mail',
                'description' => 'Build effective email campaigns that convert'
            ]
        ];
        
        return view('pages.home', compact('latestDocuments', 'stats', 'testimonials', 'categories'));
    }

    /**
     * Show the about page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show the resources page.
     */
    public function resources()
    {
        return view('pages.resources');
    }

    /**
     * Show the deliverables page.
     */
    public function deliverables()
    {
        // Get documents, public ones for guests and all for authenticated users
        if (auth()->check()) {
            $documents = Document::latest()->paginate(12);
        } else {
            $documents = Document::where('is_public', true)->latest()->paginate(12);
        }

        return view('pages.deliverables', compact('documents'));
    }

    /**
     * Show the contact page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Show the terms of service page.
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * Show the privacy policy page.
     */
    public function privacy()
    {
        return view('pages.privacy');
    }
    
    /**
     * Show the project activities page.
     */
    public function projectActivities()
    {
        // Define project activities
        $activities = [
            [
                'title' => 'Digital Marketing Training in Slovakia',
                'date' => 'April 28 - May 02, 2025',
                'description' => 'The first cohort of training will take place in Slovak University of Agriculture (SUA) in Nitra with first 20 Ghanaian staff from AAMUSTED, CCTU and BTU.',
                'images' => [
                    'slovak-training_main.svg',
                    'slovak-training_3.svg',
                    'slovak-training_main.svg', // Reusing existing SVG as placeholder
                    'slovak-training_3.svg', // Reusing existing SVG as placeholder
                    'slovak-training_main.svg' // Reusing existing SVG as placeholder
                ],
                'status' => 'Upcoming'
            ],
            [
                'title' => 'Project Kick-Off Meeting in Germany',
                'date' => 'February 9 - 12, 2025',
                'description' => 'Initial project meeting held in Germany to establish project parameters, timelines, and responsibilities among all partner institutions.',
                'images' => [
                    'gal1.svg',
                    'gal2.svg',
                    'gal1.svg', // Reusing existing SVG as placeholder
                    'gal2.svg', // Reusing existing SVG as placeholder
                    'gal1.svg' // Reusing existing SVG as placeholder
                ],
                'status' => 'Completed'
            ],
            [
                'title' => 'Digital Marketing Laboratory Setup',
                'date' => 'March 15 - 30, 2025',
                'description' => 'Setting up digital marketing laboratories in Ghanaian partner institutions to enable students to interact and enhance their competency in Digital TVET marketing.',
                'images' => [
                    'Lab_photo_1.svg',
                    'Lab_photo_2.svg',
                    'Lab_photo_1.svg' // Reusing existing SVG as placeholder
                ],
                'status' => 'In Progress'
            ]
        ];
        
        // Define announcements
        $announcements = [
            [
                'title' => 'Digital Marketing Training in Slovakia',
                'date' => 'April 28, 2025',
                'content' => 'The first cohort of training will take place in Slovak University of Agriculture (SUA) in Nitra with first 20 Ghanaian staff from AAMUSTED, CCTU and BTU.',
                'likes' => 3
            ],
            [
                'title' => 'Project Kick-Off Meeting in Germany',
                'date' => 'February 9, 2025',
                'content' => 'Initial project meeting held in Germany to establish project parameters, timelines, and responsibilities among all partner institutions.',
                'likes' => 2
            ],
            [
                'title' => 'Application for External Evaluator',
                'date' => 'February 9, 2025',
                'content' => 'We are seeking applications for an external evaluator for the DigiMarkt project. Please refer to the Terms of Reference for more details.',
                'document' => 'TERMS_OF_REFERENCE_DigiMarkt_evaluation_V02.pdf',
                'likes' => 3
            ]
        ];
        
        return view('pages.project_activities', compact('activities', 'announcements'));
    }
    
    /**
     * Display the project milestones and deliverables page.
     *
     * @return \Illuminate\View\View
     */
    public function milestones()
    {
        $milestones = [
            [
                'id' => 1,
                'title' => 'Project Inception',
                'date' => 'February 2025',
                'status' => 'completed',
                'description' => 'Project kick-off meeting, establishment of project management structures, and detailed planning.',
                'deliverables' => [
                    ['title' => 'Project Management Plan', 'file' => 'project_management_plan.pdf', 'restricted' => false],
                    ['title' => 'Kick-off Meeting Report', 'file' => 'kickoff_meeting_report.pdf', 'restricted' => false],
                    ['title' => 'Quality Assurance Framework', 'file' => 'quality_assurance_framework.pdf', 'restricted' => true]
                ]
            ],
            [
                'id' => 2,
                'title' => 'Needs Assessment',
                'date' => 'March - April 2025',
                'status' => 'in-progress',
                'description' => 'Assessment of digital marketing skills needs in TVET institutions in Ghana and development of curriculum framework.',
                'deliverables' => [
                    ['title' => 'Needs Assessment Report', 'file' => 'needs_assessment_report.pdf', 'restricted' => false],
                    ['title' => 'Digital Marketing Curriculum Framework', 'file' => 'curriculum_framework.pdf', 'restricted' => true],
                    ['title' => 'Stakeholder Consultation Report', 'file' => 'stakeholder_consultation.pdf', 'restricted' => false]
                ]
            ],
            [
                'id' => 3,
                'title' => 'Training of Trainers',
                'date' => 'May - June 2025',
                'status' => 'upcoming',
                'description' => 'Capacity building for TVET educators in digital marketing through intensive training sessions in Slovakia and Germany.',
                'deliverables' => [
                    ['title' => 'Training Materials', 'file' => 'training_materials.pdf', 'restricted' => true],
                    ['title' => 'Training Report', 'file' => 'training_report.pdf', 'restricted' => false],
                    ['title' => 'Competency Assessment Framework', 'file' => 'competency_assessment.pdf', 'restricted' => true]
                ]
            ],
            [
                'id' => 4,
                'title' => 'Digital Marketing Laboratory Setup',
                'date' => 'July - August 2025',
                'status' => 'upcoming',
                'description' => 'Establishment of digital marketing laboratories in participating TVET institutions with necessary hardware and software.',
                'deliverables' => [
                    ['title' => 'Laboratory Setup Guidelines', 'file' => 'lab_setup_guidelines.pdf', 'restricted' => false],
                    ['title' => 'Equipment Specifications', 'file' => 'equipment_specs.pdf', 'restricted' => false],
                    ['title' => 'Software Installation Manual', 'file' => 'software_manual.pdf', 'restricted' => true]
                ]
            ],
            [
                'id' => 5,
                'title' => 'Pilot Implementation',
                'date' => 'September - December 2025',
                'status' => 'upcoming',
                'description' => 'Pilot implementation of digital marketing courses in participating TVET institutions and initial assessment.',
                'deliverables' => [
                    ['title' => 'Implementation Guidelines', 'file' => 'implementation_guidelines.pdf', 'restricted' => true],
                    ['title' => 'Monitoring Framework', 'file' => 'monitoring_framework.pdf', 'restricted' => true],
                    ['title' => 'Mid-term Evaluation Report', 'file' => 'midterm_evaluation.pdf', 'restricted' => false]
                ]
            ]
        ];
        
        // Work Packages data
        $workPackages = [
            [
                'title' => 'WP1: Project Management and Implementation',
                'description' => 'Coordination, financial management, quality assurance, and reporting for the project.',
                'status' => 'In Progress',
                'completion' => 45
            ],
            [
                'title' => 'WP2: Digital Marketing Skills Needs Assessment',
                'description' => 'Research and analysis of digital marketing skills needs in TVET institutions in Ghana.',
                'status' => 'Completed',
                'completion' => 100
            ],
            [
                'title' => 'WP3: Curriculum Development and Training',
                'description' => 'Development of digital marketing curriculum and training of TVET educators.',
                'status' => 'In Progress',
                'completion' => 60
            ],
            [
                'title' => 'WP4: Digital Marketing Laboratory Setup',
                'description' => 'Establishment of digital marketing labs in participating TVET institutions.',
                'status' => 'Upcoming',
                'completion' => 10
            ],
            [
                'title' => 'WP5: Dissemination and Exploitation',
                'description' => 'Dissemination of project results and sustainability planning.',
                'status' => 'In Progress',
                'completion' => 30
            ]
        ];
        
        // Partner institutions data
        $partners = [
            [
                'name' => 'Steinbeis University',
                'country' => 'Germany',
                'logo' => asset('assets/images/partners/steinbeis-logo.svg')
            ],
            [
                'name' => 'Slovak University of Agriculture',
                'country' => 'Slovakia',
                'logo' => asset('assets/images/partners/slovak-logo.svg')
            ],
            [
                'name' => 'AAMUSTED',
                'country' => 'Ghana',
                'logo' => asset('assets/images/partners/aamusted-logo.svg')
            ],
            [
                'name' => 'Bolgatanga Technical University',
                'country' => 'Ghana',
                'logo' => asset('assets/images/partners/btu-logo.svg')
            ],
            [
                'name' => 'Cape Coast Technical University',
                'country' => 'Ghana',
                'logo' => asset('assets/images/partners/cctu-logo.svg')
            ]
        ];
        
        // Gallery images
        $gallery = [
            [
                'title' => 'Kick-off Meeting in Germany',
                'category' => 'Meeting',
                'image' => asset('assets/images/gallery/kickoff-meeting.svg')
            ],
            [
                'title' => 'Needs Assessment Workshop',
                'category' => 'Workshop',
                'image' => asset('assets/images/gallery/needs-assessment.svg')
            ],
            [
                'title' => 'Training Session in Slovakia',
                'category' => 'Training',
                'image' => asset('assets/images/gallery/training-session.svg')
            ],
            [
                'title' => 'Laboratory Setup',
                'category' => 'Infrastructure',
                'image' => asset('assets/images/gallery/lab-setup.svg')
            ],
            [
                'title' => 'Stakeholder Meeting in Ghana',
                'category' => 'Meeting',
                'image' => asset('assets/images/gallery/stakeholder-meeting.svg')
            ],
            [
                'title' => 'Digital Marketing Workshop',
                'category' => 'Workshop',
                'image' => asset('assets/images/gallery/digital-marketing.svg')
            ]
        ];
        
        return view('pages.milestones', compact('milestones', 'workPackages', 'partners', 'gallery'));
    }
    
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = auth()->user();
        
        // Get user's recent documents/deliverables
        $recentDocuments = Document::latest()->take(5)->get();
        
        // Get user statistics
        $stats = [
            'totalUsers' => User::count(),
            'totalDocuments' => Document::count(),
            'totalDownloads' => Document::sum('download_count'),
            'userDownloads' => $user->downloads()->count() ?? 0
        ];
        
        return view('pages.dashboard', compact('user', 'recentDocuments', 'stats'));
    }
}
