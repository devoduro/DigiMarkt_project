<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = Resource::with('creator')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'category' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|file|max:10240', // 10MB max file size
            'is_featured' => 'sometimes|boolean',
            'access_level' => 'required|in:public,registered,admin',
            'is_published' => 'sometimes|boolean',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('resource_thumbnails', 'public');
        }
        
        $filePath = null;
        $fileName = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('resource_files', 'public');
            $fileName = $request->file('file')->getClientOriginalName();
        }

        $resource = Resource::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'content' => $validated['content'] ?? null,
            'category' => $validated['category'],
            'thumbnail_path' => $thumbnailPath,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'is_featured' => $request->has('is_featured'),
            'access_level' => $validated['access_level'],
            'is_published' => $request->has('is_published'),
            'created_by' => auth()->id(),
            'download_count' => 0,
        ]);

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        $resource->load('creator');
        return view('admin.resources.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'category' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|file|max:10240', // 10MB max file size
            'is_featured' => 'sometimes|boolean',
            'access_level' => 'required|in:public,registered,admin',
            'is_published' => 'sometimes|boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'content' => $validated['content'] ?? null,
            'category' => $validated['category'],
            'is_featured' => $request->has('is_featured'),
            'access_level' => $validated['access_level'],
            'is_published' => $request->has('is_published'),
        ];

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($resource->thumbnail_path) {
                Storage::disk('public')->delete($resource->thumbnail_path);
            }
            
            $data['thumbnail_path'] = $request->file('thumbnail')->store('resource_thumbnails', 'public');
        }
        
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($resource->file_path) {
                Storage::disk('public')->delete($resource->file_path);
            }
            
            $data['file_path'] = $request->file('file')->store('resource_files', 'public');
            $data['file_name'] = $request->file('file')->getClientOriginalName();
        }

        $resource->update($data);

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        // Delete thumbnail if exists
        if ($resource->thumbnail_path) {
            Storage::disk('public')->delete($resource->thumbnail_path);
        }
        
        // Delete file if exists
        if ($resource->file_path) {
            Storage::disk('public')->delete($resource->file_path);
        }
        
        $resource->delete();

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource deleted successfully.');
    }
    
    /**
     * Toggle featured status of the resource.
     */
    public function toggleFeatured(Resource $resource)
    {
        $resource->update([
            'is_featured' => !$resource->is_featured
        ]);
        
        return redirect()->route('admin.resources.index')
            ->with('success', 'Featured status updated successfully.');
    }
    
    /**
     * Toggle published status of the resource.
     */
    public function togglePublished(Resource $resource)
    {
        $resource->update([
            'is_published' => !$resource->is_published
        ]);
        
        return redirect()->route('admin.resources.index')
            ->with('success', 'Published status updated successfully.');
    }
    
    /**
     * Download the resource file.
     */
    public function download(Resource $resource)
    {
        // Increment download count
        $resource->increment('download_count');
        
        // Check if file exists
        if (!$resource->file_path || !Storage::disk('public')->exists($resource->file_path)) {
            return redirect()->back()->with('error', 'File not found.');
        }
        
        return Storage::disk('public')->download($resource->file_path, $resource->file_name);
    }
}
