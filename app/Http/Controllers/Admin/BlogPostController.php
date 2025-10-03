<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BlogPost::with('creator');

        // Search filter
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Status filter
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }

        $blogPosts = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.blog-posts.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'category' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blog-images', 'public');
        }

        // Set published_at if publishing
        if ($request->is_published && !$request->published_at) {
            $data['published_at'] = now();
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog-posts.index')
                        ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return view('admin.blog-posts.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view('admin.blog-posts.edit', compact('blogPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'category' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blogPost->featured_image) {
                Storage::disk('public')->delete($blogPost->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('blog-images', 'public');
        }

        // Set published_at if publishing for first time
        if ($request->is_published && !$blogPost->published_at) {
            $data['published_at'] = now();
        }

        $blogPost->update($data);

        return redirect()->route('admin.blog-posts.index')
                        ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        // Delete featured image if exists
        if ($blogPost->featured_image) {
            Storage::disk('public')->delete($blogPost->featured_image);
        }

        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')
                        ->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Publish a blog post
     */
    public function publish(BlogPost $blogPost)
    {
        $blogPost->update([
            'is_published' => true,
            'published_at' => $blogPost->published_at ?: now()
        ]);

        return redirect()->back()->with('success', 'Blog post published successfully.');
    }

    /**
     * Unpublish a blog post
     */
    public function unpublish(BlogPost $blogPost)
    {
        $blogPost->update(['is_published' => false]);

        return redirect()->back()->with('success', 'Blog post unpublished successfully.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(BlogPost $blogPost)
    {
        $blogPost->update(['is_featured' => !$blogPost->is_featured]);

        $status = $blogPost->is_featured ? 'featured' : 'unfeatured';
        return redirect()->back()->with('success', "Blog post {$status} successfully.");
    }
}
