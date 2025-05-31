<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Download;
use App\Models\User;
use App\Models\Resource;
use App\Models\Milestone;
use App\Models\ProjectActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        // Get resource metrics
        $totalResources = Resource::count();
        $publishedResources = Resource::where('is_published', true)->count();
        $resourceDownloads = Resource::sum('download_count');
        $resourcesByCategory = Resource::select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->orderByDesc('count')
            ->take(5)
            ->get();
            
        // Get milestone metrics
        $totalMilestones = Milestone::count();
        $completedMilestones = Milestone::where('status', 'completed')->count();
        $upcomingMilestones = Milestone::where('status', 'upcoming')->count();
        $inProgressMilestones = Milestone::where('status', 'in_progress')->count();
        $milestoneCompletionRate = $totalMilestones > 0 ? round(($completedMilestones / $totalMilestones) * 100) : 0;
        
        // Get project activity metrics
        $totalActivities = ProjectActivity::count();
        $featuredActivities = ProjectActivity::where('is_featured', true)->count();
        $recentActivities = ProjectActivity::with('images')
            ->latest('date')
            ->take(5)
            ->get()
            ->map(function($activity) {
                return [
                    'id' => $activity->id,
                    'title' => $activity->title,
                    'date' => $activity->date,
                    'image' => $activity->images->isNotEmpty() ? asset('storage/' . $activity->images->first()->image_path) : null
                ];
            });

        // Get recent users
        $recentUsers = User::latest()->take(5)->get();

        // Get recent downloads
        $recentDownloads = Download::with(['user', 'document'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalDocuments',
            'totalDownloads',
            'recentUsers',
            'recentDownloads',
            'totalResources',
            'publishedResources',
            'resourceDownloads',
            'resourcesByCategory',
            'totalMilestones',
            'completedMilestones',
            'upcomingMilestones',
            'inProgressMilestones',
            'milestoneCompletionRate',
            'totalActivities',
            'featuredActivities',
            'recentActivities'
        ));
    }
}
