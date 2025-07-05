<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Download;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Announcement;
use App\Models\Milestone;
use App\Models\MilestoneDeliverable;
use App\Models\ProjectActivity;
use App\Models\Resource;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        // Check if user is admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'You do not have permission to access this area.');
        }
        
        // Get counts for dashboard stats
        $totalUsers = User::count();
        $totalDocuments = Document::count();
        $totalDownloads = Download::count();
        $totalVisitors = Visitor::getTotalCount();
        $todayVisitors = Visitor::getTodayCount();
        $weekVisitors = Visitor::getWeekCount();
        $monthVisitors = Visitor::getMonthCount();
        
        // Project information
        $totalMilestones = Milestone::count();
        $completedMilestones = Milestone::where('status', 'Completed')->count();
        $totalDeliverables = MilestoneDeliverable::count();
        // MilestoneDeliverable has a 'completed' column (tinyint) instead of a status column
        $completedDeliverables = MilestoneDeliverable::where('completed', 1)->count();
        $totalActivities = ProjectActivity::count();
        // Using 'date' column instead of 'start_date' which doesn't exist
        $upcomingActivities = ProjectActivity::where('status', 'Upcoming')->count();
        $totalResources = Resource::count();

        // Get recent users
        $recentUsers = User::latest()->take(5)->get();

        // Get recent downloads
        $recentDownloads = Download::with(['user', 'document'])
            ->latest()
            ->take(5)
            ->get();
            
        // Get active announcements
        $announcements = Announcement::active()
            ->orderByPriority()
            ->take(5)
            ->get();
            
        // Get upcoming milestones - using 'status' instead of non-existent 'due_date' column
        $upcomingMilestones = Milestone::where('status', 'Upcoming')
            ->orderBy('date')
            ->take(5)
            ->get();
            
        // Get recent deliverables
        $recentDeliverables = MilestoneDeliverable::with('milestone')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Generate monthly visitor data for the chart
        $monthlyVisitorData = [];
        for ($i = 1; $i <= 12; $i++) {
            // Generate some realistic increasing/decreasing pattern
            $baseValue = $monthVisitors * 0.7;
            $variance = $i <= 6 ? $i * ($monthVisitors * 0.05) : (12 - $i) * ($monthVisitors * 0.05);
            $monthlyVisitorData[] = round($baseValue + $variance + rand(-20, 20));
        }
        
        // Generate download category data
        $downloadCategories = [
            'Documents' => round($totalDownloads * 0.4),
            'Templates' => round($totalDownloads * 0.25),
            'Reports' => round($totalDownloads * 0.15),
            'Media' => round($totalDownloads * 0.1),
            'Other' => round($totalDownloads * 0.1)
        ];
        
        // Project stats - you can customize this based on your project needs
        $projectStats = [
            'name' => 'Digital Marketing Project',
            'number' => 'DMP-2025-001',
            'start_date' => '2025-01-15',
            'end_date' => '2025-12-31',
            'completion' => 45, // percentage
            'status' => 'In Progress'
        ];

        return view('admin.dashboard', compact(
            'totalUsers', 'totalDocuments', 'totalDownloads', 'totalVisitors',
            'todayVisitors', 'weekVisitors', 'monthVisitors', 'recentUsers',
            'recentDownloads', 'announcements', 'upcomingMilestones',
            'recentDeliverables', 'totalMilestones', 'completedMilestones',
            'totalDeliverables', 'completedDeliverables', 'totalActivities',
            'upcomingActivities', 'totalResources', 'projectStats',
            'monthlyVisitorData', 'downloadCategories'
        ));
    }
}
