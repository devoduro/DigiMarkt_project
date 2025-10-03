<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkPackage;
use Illuminate\Http\Request;

class WorkPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workPackages = WorkPackage::with('creator')
            ->orderBy('display_order')
            ->paginate(10);
            
        return view('admin.work-packages.index', compact('workPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.work-packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'status' => 'required|in:Not Started,In Progress,Completed,On Hold',
            'completion_percentage' => 'required|integer|min:0|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'display_order' => 'nullable|integer|min:0',
        ]);

        WorkPackage::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'status' => $validated['status'],
            'completion_percentage' => $validated['completion_percentage'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'display_order' => $validated['display_order'] ?? 0,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.work-packages.index')
            ->with('success', 'Work package created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkPackage $workPackage)
    {
        $workPackage->load('creator');
        return view('admin.work-packages.show', compact('workPackage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkPackage $workPackage)
    {
        return view('admin.work-packages.edit', compact('workPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkPackage $workPackage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'status' => 'required|in:Not Started,In Progress,Completed,On Hold',
            'completion_percentage' => 'required|integer|min:0|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $workPackage->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'status' => $validated['status'],
            'completion_percentage' => $validated['completion_percentage'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'display_order' => $validated['display_order'] ?? $workPackage->display_order,
        ]);

        return redirect()->route('admin.work-packages.index')
            ->with('success', 'Work package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkPackage $workPackage)
    {
        $workPackage->delete();

        return redirect()->route('admin.work-packages.index')
            ->with('success', 'Work package deleted successfully.');
    }

    /**
     * Publish the work package.
     */
    public function publish(WorkPackage $workPackage)
    {
        $workPackage->update(['is_published' => true]);
        
        return redirect()->route('admin.work-packages.index')
            ->with('success', 'Work package has been published successfully.');
    }

    /**
     * Unpublish the work package.
     */
    public function unpublish(WorkPackage $workPackage)
    {
        $workPackage->update(['is_published' => false]);
        
        return redirect()->route('admin.work-packages.index')
            ->with('success', 'Work package has been unpublished successfully.');
    }

    /**
     * Toggle the featured status of the work package.
     */
    public function toggleFeatured(WorkPackage $workPackage)
    {
        $workPackage->update(['is_featured' => !$workPackage->is_featured]);
        
        $status = $workPackage->is_featured ? 'featured' : 'unfeatured';
        return redirect()->route('admin.work-packages.index')
            ->with('success', "Work package has been {$status} successfully.");
    }
}
