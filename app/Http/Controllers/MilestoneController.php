<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\WorkPackage;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display the public milestones page
     */
    public function index()
    {
        // Fetch milestones from database and transform to array format
        $milestonesData = Milestone::with('deliverables')
            ->orderBy('display_order')
            ->orderBy('created_at', 'desc')
            ->get();
            
        $milestones = $milestonesData->map(function ($milestone) {
            return [
                'title' => $milestone->title,
                'date' => $milestone->date,
                'description' => $milestone->description,
                'status' => $milestone->status,
                'completion' => $milestone->completion_percentage,
                'deliverables' => $milestone->deliverables->map(function ($deliverable) {
                    return [
                        'title' => $deliverable->title,
                        'description' => $deliverable->description,
                        'completed' => true, // You can add a completed field if needed
                        'file_path' => $deliverable->file_path ? asset('storage/' . $deliverable->file_path) : null,
                        'restricted' => $deliverable->restricted ?? false,
                    ];
                })->toArray(),
            ];
        })->toArray();
        
        // Fetch work packages from database and transform to array format
        $workPackagesData = WorkPackage::orderBy('display_order')
            ->get();
            
        $workPackages = $workPackagesData->map(function ($package) {
            return [
                'title' => $package->title,
                'description' => $package->description,
                'status' => $package->status,
                'completion' => $package->completion_percentage,
                'tasks' => [], // Add tasks field if needed
            ];
        })->toArray();
            
        return view('pages.milestones', compact('milestones', 'workPackages'));
    }
}
