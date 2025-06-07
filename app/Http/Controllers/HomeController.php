<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Resource;
use App\Models\ProjectActivity;
use App\Models\Milestone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Show the home page with dynamic data.
     */
    public function index()
    {
        // Get latest public documents/deliverables
        $latestDocuments = Document::where('is_public', true)
            ->orWhere('is_published', true)
            ->latest()
            ->take(3)
            ->get();
            
        // Debug info
        \Log::info('Latest Documents Count: ' . $latestDocuments->count());
        foreach ($latestDocuments as $doc) {
            \Log::info('Document: ' . $doc->title . ', Public: ' . ($doc->is_public ? 'Yes' : 'No') . ', Published: ' . ($doc->is_published ? 'Yes' : 'No'));
        }
            
        // Get featured digital marketing resources
        $featuredResources = Resource::where('is_published', true)
            ->where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();
            
        // Get featured project activities
        $featuredActivities = ProjectActivity::where('is_featured', true)
            ->with('images')
            ->latest()
            ->take(3)
            ->get();
            
        // Get upcoming milestones
        $upcomingMilestones = Milestone::where('status', 'upcoming')
            ->orderBy('display_order')
            ->take(3)
            ->get();
            
        // Get statistics for the platform
        $stats = [
            'users' => User::count(),
            'documents' => Document::count(),
            'downloads' => DB::table('downloads')->count(),
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
        
        // Get resource categories
        $categories = Resource::select('category')
            ->distinct()
            ->get()
            ->map(function($item) {
                $icon = 'document-text'; // Default icon
                
                // Assign icons based on category name
                if (Str::contains(strtolower($item->category), 'social')) {
                    $icon = 'share';
                } elseif (Str::contains(strtolower($item->category), 'seo')) {
                    $icon = 'search';
                } elseif (Str::contains(strtolower($item->category), 'email')) {
                    $icon = 'mail';
                } elseif (Str::contains(strtolower($item->category), 'content')) {
                    $icon = 'document-text';
                } elseif (Str::contains(strtolower($item->category), 'analytics')) {
                    $icon = 'chart-bar';
                }
                
                return [
                    'name' => $item->category,
                    'icon' => $icon,
                    'description' => 'Resources related to ' . $item->category,
                    'count' => Resource::where('category', $item->category)->count()
                ];
            })
            ->take(4);
        
        // If no categories exist yet, use default categories
        if ($categories->isEmpty()) {
            $categories = collect([
                [
                    'name' => 'Social Media Marketing',
                    'icon' => 'share',
                    'description' => 'Strategies and tools for effective social media campaigns',
                    'count' => 0
                ],
                [
                    'name' => 'SEO Optimization',
                    'icon' => 'search',
                    'description' => 'Techniques to improve search engine rankings',
                    'count' => 0
                ],
                [
                    'name' => 'Content Marketing',
                    'icon' => 'document-text',
                    'description' => 'Create compelling content that drives engagement',
                    'count' => 0
                ],
                [
                    'name' => 'Email Marketing',
                    'icon' => 'mail',
                    'description' => 'Build effective email campaigns that convert',
                    'count' => 0
                ]
            ]);
        }
        
        // Add this to the index method in HomeController
        $featuredGalleries = Gallery::where('is_featured', true)
        ->with('images')
        ->latest()
        ->take(3)
        ->get();
        
        // Add $featuredGalleries to the view data
        return view('pages.home', compact(
        'latestDocuments',
        'featuredResources',
        'featuredActivities',
        'upcomingMilestones',
        'stats',
        'testimonials',
        'categories',
        'featuredGalleries' // Add this line
        ));
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
        // Get published resources, filter by access level for non-admin users
        $query = \App\Models\Resource::where('is_published', true);
        
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            $query->where(function($q) {
                $q->where('access_level', 'public');
                if (auth()->check()) {
                    $q->orWhere('access_level', 'registered');
                }
            });
        }
        
        $resources = $query->orderBy('created_at', 'desc')
            ->paginate(12);
            
        // Get resource categories for filtering
        $categories = \App\Models\Resource::select('category')
            ->distinct()
            ->pluck('category')
            ->map(function($category) {
                return [
                    'name' => $category,
                    'count' => \App\Models\Resource::where('category', $category)
                        ->where('is_published', true)
                        ->count()
                ];
            });
            
        return view('pages.resources.index', compact('resources', 'categories'));
    }

    /**
     * Show a single resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function resourceShow($id)
    {
        $resource = \App\Models\Resource::findOrFail($id);
        
        // Check access permissions
        if ($resource->access_level !== 'public' && (!auth()->check() || 
            ($resource->access_level === 'admin' && !auth()->user()->isAdmin()))) {
            abort(403, 'You do not have permission to view this resource');
        }
        
        // Get related resources
        $relatedResources = \App\Models\Resource::where('id', '!=', $resource->id)
            ->where('is_published', true)
            ->where('category', $resource->category)
            ->take(3)
            ->get();
            
        return view('pages.resources.show', compact('resource', 'relatedResources'));
    }
    
    /**
     * Download a resource file.
     *
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function resourceDownload($id)
    {
        $resource = \App\Models\Resource::findOrFail($id);
        
        // Check access permissions
        if ($resource->access_level !== 'public' && (!auth()->check() || 
            ($resource->access_level === 'admin' && !auth()->user()->isAdmin()))) {
            abort(403, 'You do not have permission to download this resource');
        }
        
        // Check if file exists
        if (!$resource->file_path || !\Storage::disk('public')->exists($resource->file_path)) {
            abort(404, 'Resource file not found');
        }
        
        // Increment download count
        $resource->increment('download_count');
        
        return \Storage::disk('public')->download($resource->file_path, $resource->file_name);
    }
    
    /**
     * Show the deliverables page.
     */
    public function deliverables()
    {
        // Get documents, published ones for guests and all for authenticated users
        if (auth()->check()) {
            // Authenticated users can see all documents
            $documents = Document::latest()->paginate(12);
        } else {
            // Guests can see all published documents (not just public ones)
            $documents = Document::where('is_published', true)->latest()->paginate(12);
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
     * Download a document file with authentication check.
     *
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\RedirectResponse
     */
    public function documentDownload($id)
    {
        $document = \App\Models\Document::findOrFail($id);
        
        // Check if user is authenticated
        if (!auth()->check()) {
            // Store intended URL in session
            session()->put('url.intended', url()->previous());
            
            // Redirect to login with message
            return redirect()->route('login')
                ->with('message', 'Please login to download this document.');
        }
        
        // Check if file exists
        if (!$document->file_path || !\Storage::exists($document->file_path)) {
            return redirect()->back()->with('error', 'Document file not found');
        }
        
        // Record the download
        \App\Models\Download::create([
            'user_id' => auth()->id(),
            'document_id' => $document->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        
        return \Storage::download($document->file_path, $document->file_name);
    }
    
    /**
     * Show the project activities page.
     */
    public function projectActivities()
    {
        // Get all project activities ordered by date (newest first)
        $activities = \App\Models\ProjectActivity::with('images')
            ->orderBy('date', 'desc')
            ->get()
            ->map(function($activity) {
                // Format the activity data for the view
                $formattedActivity = [
                    'id' => $activity->id,
                    'title' => $activity->title,
                    'date' => $activity->date,
                    'description' => $activity->description,
                    'status' => $activity->status,
                    'featured' => $activity->is_featured
                ];
                
                // Add image if available
                if ($activity->images->isNotEmpty()) {
                    $formattedActivity['image'] = asset('storage/' . $activity->images->first()->image_path);
                } else {
                    // Default placeholder image
                    $formattedActivity['image'] = 'https://via.placeholder.com/800x400?text=No+Image';
                }
                
                return $formattedActivity;
            });
        
        // Get latest announcements from resources
        $announcements = \App\Models\Resource::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get()
            ->map(function($resource) {
                return [
                    'title' => $resource->title,
                    'date' => $resource->created_at->format('F d, Y'),
                    'content' => substr($resource->description, 0, 200) . (strlen($resource->description) > 200 ? '...' : '')
                ];
            });
        
        // If no announcements found, provide fallback data
        if ($announcements->isEmpty()) {
            $announcements = [
                [
                    'title' => 'Call for Participants: Digital Marketing Workshop',
                    'date' => 'August 5, 2023',
                    'content' => 'We are inviting TVET trainers to participate in our upcoming Digital Marketing Tools Workshop.'
                ]
            ];
        }
        
        return view('pages.project_activities', compact('activities', 'announcements'));
    }
    
    /**
     * Display the project milestones and deliverables page.
     *
     * @return \Illuminate\View\View
     */
    public function milestones()
    {
        // Get all milestones ordered by display_order
        $dbMilestones = \App\Models\Milestone::with('deliverables')
            ->orderBy('display_order')
            ->get();
            
        // Format milestones for the view
        $milestones = $dbMilestones->map(function($milestone) {
            $formattedMilestone = [
                'id' => $milestone->id,
                'title' => $milestone->title,
                'date' => $milestone->date,
                'status' => $milestone->status,
                'description' => $milestone->description,
                'completion' => $milestone->completion_percentage,
                'deliverables' => []
            ];
            
            // Format deliverables
            foreach ($milestone->deliverables as $deliverable) {
                $formattedMilestone['deliverables'][] = [
                    'id' => $deliverable->id,
                    'title' => $deliverable->title,
                    'description' => $deliverable->description,
                    'file' => $deliverable->file_name,
                    'file_path' => $deliverable->file_path ? asset('storage/' . $deliverable->file_path) : null,
                    'completed' => $deliverable->completed,
                    'restricted' => $deliverable->restricted
                ];
            }
            
            return $formattedMilestone;
        });
        
        // If no milestones exist yet, use default sample data
        if ($milestones->isEmpty()) {
            $milestones = collect([
                [
                    'id' => 1,
                    'title' => 'Project Inception',
                    'date' => 'February 2025',
                    'status' => 'Completed',
                    'description' => 'Project kick-off meeting, establishment of project management structures, and detailed planning.',
                    'completion' => 100,
                    'deliverables' => [
                        ['id' => 1, 'title' => 'Project Management Plan', 'description' => 'Detailed project plan', 'file' => 'project_management_plan.pdf', 'completed' => true, 'restricted' => false],
                        ['id' => 2, 'title' => 'Kick-off Meeting Report', 'description' => 'Summary of the kick-off meeting', 'file' => 'kickoff_meeting_report.pdf', 'completed' => true, 'restricted' => false],
                        ['title' => 'Quality Assurance Framework', 'file' => 'quality_assurance_framework.pdf', 'restricted' => true]
                    ]
                ],
                [
                    'id' => 2,
                    'title' => 'Needs Assessment',
                    'date' => 'March - April 2025',
                    'status' => 'in-progress',
                    'description' => 'Assessment of digital marketing skills needs in TVET institutions in Ghana and development of curriculum framework.',
                    'completion' => 60,
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
                    'completion' => 0,
                    'deliverables' => [
                        ['title' => 'Training Materials', 'file' => 'training_materials.pdf', 'restricted' => true],
                        ['title' => 'Training Report', 'file' => 'training_report.pdf', 'restricted' => false],
                        ['title' => 'Competency Assessment Framework', 'file' => 'competency_assessment.pdf', 'restricted' => true]
                    ]
                ]
            ]);
        }
        
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
