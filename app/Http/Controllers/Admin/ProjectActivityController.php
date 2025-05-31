<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectActivity;
use App\Models\ActivityImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = ProjectActivity::with('creator')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Upcoming,In Progress,Completed',
            'featured' => 'sometimes|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'captions.*' => 'nullable|string|max:255',
        ]);

        $activity = ProjectActivity::create([
            'title' => $validated['title'],
            'date' => $validated['date'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'featured' => $request->has('featured'),
            'created_by' => auth()->id(),
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('activity_images', 'public');
                
                ActivityImage::create([
                    'project_activity_id' => $activity->id,
                    'image_path' => $path,
                    'caption' => $request->captions[$index] ?? null,
                    'display_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.activities.index')
            ->with('success', 'Project activity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectActivity $activity)
    {
        $activity->load(['creator', 'images']);
        return view('admin.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectActivity $activity)
    {
        $activity->load('images');
        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectActivity $activity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Upcoming,In Progress,Completed',
            'featured' => 'sometimes|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'captions.*' => 'nullable|string|max:255',
        ]);

        $activity->update([
            'title' => $validated['title'],
            'date' => $validated['date'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'featured' => $request->has('featured'),
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('activity_images', 'public');
                
                ActivityImage::create([
                    'project_activity_id' => $activity->id,
                    'image_path' => $path,
                    'caption' => $request->captions[$index] ?? null,
                    'display_order' => $index + $activity->images->count(),
                ]);
            }
        }

        // Handle image deletions
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ActivityImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->image_path);
                    $image->delete();
                }
            }
        }

        return redirect()->route('admin.activities.index')
            ->with('success', 'Project activity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectActivity $activity)
    {
        // Delete associated images from storage
        foreach ($activity->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        
        $activity->delete();

        return redirect()->route('admin.activities.index')
            ->with('success', 'Project activity deleted successfully.');
    }
    
    /**
     * Toggle featured status of the activity.
     */
    public function toggleFeatured(ProjectActivity $activity)
    {
        $activity->update([
            'featured' => !$activity->featured
        ]);
        
        return redirect()->route('admin.activities.index')
            ->with('success', 'Featured status updated successfully.');
    }
    
    /**
     * Store a new image for the activity.
     */
    public function storeImage(Request $request, ProjectActivity $activity)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_primary' => 'sometimes|boolean',
        ]);
        
        $path = $request->file('image')->store('activity_images', 'public');
        
        // If this is set as primary, reset all other images to non-primary
        if ($request->has('is_primary') && $request->is_primary) {
            $activity->images()->update(['is_primary' => false]);
        }
        
        $image = ActivityImage::create([
            'project_activity_id' => $activity->id,
            'image_path' => $path,
            'is_primary' => $request->has('is_primary') ? $request->is_primary : false,
            'display_order' => $activity->images->count(),
        ]);
        
        return redirect()->route('admin.activities.edit', $activity)
            ->with('success', 'Image uploaded successfully.');
    }
    
    /**
     * Remove an image from the activity.
     */
    public function destroyImage(ProjectActivity $activity, ActivityImage $image)
    {
        // Check if the image belongs to this activity
        if ($image->project_activity_id !== $activity->id) {
            return redirect()->route('admin.activities.edit', $activity)
                ->with('error', 'Image does not belong to this activity.');
        }
        
        // Delete the image file from storage
        Storage::disk('public')->delete($image->image_path);
        
        // Delete the image record
        $image->delete();
        
        return redirect()->route('admin.activities.edit', $activity)
            ->with('success', 'Image deleted successfully.');
    }
    
    /**
     * Set an image as the primary image for the activity.
     */
    public function setPrimaryImage(ProjectActivity $activity, ActivityImage $image)
    {
        // Check if the image belongs to this activity
        if ($image->project_activity_id !== $activity->id) {
            return redirect()->route('admin.activities.edit', $activity)
                ->with('error', 'Image does not belong to this activity.');
        }
        
        // Reset all images to non-primary
        $activity->images()->update(['is_primary' => false]);
        
        // Set this image as primary
        $image->update(['is_primary' => true]);
        
        return redirect()->route('admin.activities.edit', $activity)
            ->with('success', 'Primary image set successfully.');
    }
}
