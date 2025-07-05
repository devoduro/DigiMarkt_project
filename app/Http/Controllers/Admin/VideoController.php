<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['Project', 'Tutorial', 'Event', 'Interview', 'Other'];
        return view('admin.videos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_type' => ['required', Rule::in(['youtube', 'vimeo', 'upload'])],
            'video_url' => 'required_if:video_type,youtube,vimeo|nullable|string|max:255',
            'video_file' => 'required_if:video_type,upload|nullable|file|mimes:mp4,mov,avi,wmv|max:102400',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'nullable|string|max:10',
            'category' => 'nullable|string|max:50',
            'featured' => 'boolean',
            'published' => 'boolean',
            'publish_date' => 'nullable|date',
        ]);

        $data = $request->except(['thumbnail', 'video_file']);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('videos/thumbnails', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        // Handle video file upload
        if ($request->hasFile('video_file')) {
            $videoPath = $request->file('video_file')->store('videos/files', 'public');
            $data['video_file'] = $videoPath;
        }

        // Create the video
        Video::create($data);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $video = Video::findOrFail($id);
        $categories = ['Project', 'Tutorial', 'Event', 'Interview', 'Other'];
        return view('admin.videos.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $video = Video::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_type' => ['required', Rule::in(['youtube', 'vimeo', 'upload'])],
            'video_url' => 'required_if:video_type,youtube,vimeo|nullable|string|max:255',
            'video_file' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:102400',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'nullable|string|max:10',
            'category' => 'nullable|string|max:50',
            'featured' => 'boolean',
            'published' => 'boolean',
            'publish_date' => 'nullable|date',
        ]);

        $data = $request->except(['thumbnail', 'video_file']);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            
            $thumbnailPath = $request->file('thumbnail')->store('videos/thumbnails', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        // Handle video file upload
        if ($request->hasFile('video_file')) {
            // Delete old video file if exists
            if ($video->video_file) {
                Storage::disk('public')->delete($video->video_file);
            }
            
            $videoPath = $request->file('video_file')->store('videos/files', 'public');
            $data['video_file'] = $videoPath;
        }

        // Update the video
        $video->update($data);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);
        
        // Delete associated files
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        
        if ($video->video_file) {
            Storage::disk('public')->delete($video->video_file);
        }
        
        // Delete the video record
        $video->delete();
        
        return redirect()->route('admin.videos.index')
            ->with('success', 'Video deleted successfully.');
    }
    
    /**
     * Toggle the featured status of the video.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleFeatured($id)
    {
        $video = Video::findOrFail($id);
        $video->featured = !$video->featured;
        $video->save();
        
        return redirect()->back()->with('success', 
            $video->featured ? 'Video marked as featured.' : 'Video removed from featured.');
    }
    
    /**
     * Toggle the published status of the video.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function togglePublished($id)
    {
        $video = Video::findOrFail($id);
        $video->published = !$video->published;
        $video->save();
        
        return redirect()->back()->with('success', 
            $video->published ? 'Video published successfully.' : 'Video unpublished successfully.');
    }
}
