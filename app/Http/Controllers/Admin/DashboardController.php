<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Download;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        // Get counts for dashboard stats
        $totalUsers = User::count();
        $totalDocuments = Document::count();
        $totalDownloads = Download::count();

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
            'recentDownloads'
        ));
    }
}
