<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blog posts.
     */
    public function index(Request $request)
    {
        $query = BlogPost::published()->with('creator');

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Search filter
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%');
            });
        }

        $blogPosts = $query->orderBy('published_at', 'desc')->paginate(9);

        // Get categories for filter
        $categories = BlogPost::published()
            ->select('category')
            ->distinct()
            ->pluck('category');

        return view('news.index', compact('blogPosts', 'categories'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(BlogPost $blogPost)
    {
        // Check if blog post is published
        if (!$blogPost->is_published) {
            abort(404);
        }

        // Get related posts
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $blogPost->id)
            ->where('category', $blogPost->category)
            ->with('creator')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('news.show', compact('blogPost', 'relatedPosts'));
    }
}
