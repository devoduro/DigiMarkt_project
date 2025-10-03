@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
<!-- Header Section -->
<div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg p-6 mb-6 text-white">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold mb-1">Blog Posts</h1>
            <p class="text-blue-100">Create and manage news articles, updates, and announcements</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.dashboard') }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-all duration-200 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Dashboard
            </a>
            <a href="{{ route('admin.blog-posts.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-semibold transition-all duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i>New Post
            </a>
        </div>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

<!-- Filters Section -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
    <div class="border-b border-gray-200 px-6 py-4">
        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-filter mr-2 text-blue-600"></i>Filter Posts
        </h3>
    </div>
    <div class="p-6">
        <form method="GET" action="{{ route('admin.blog-posts.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" 
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                           placeholder="Search by title or content...">
                </div>
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select id="category" name="category" class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    <option value="News" {{ request('category') == 'News' ? 'selected' : '' }}>📰 News</option>
                    <option value="Updates" {{ request('category') == 'Updates' ? 'selected' : '' }}>🔄 Updates</option>
                    <option value="Events" {{ request('category') == 'Events' ? 'selected' : '' }}>📅 Events</option>
                    <option value="Announcements" {{ request('category') == 'Announcements' ? 'selected' : '' }}>📢 Announcements</option>
                </select>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="status" name="status" class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>✅ Published</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                <a href="{{ route('admin.blog-posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Blog Posts Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @if($blogPosts->count() > 0)
        @foreach($blogPosts as $post)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 overflow-hidden">
                <!-- Featured Image -->
                @if($post->featured_image)
                    <div class="relative h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" 
                             alt="{{ $post->title }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3">
                            @if($post->is_published)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-500 text-white shadow-lg">
                                    <i class="fas fa-check mr-1"></i>Live
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-500 text-white shadow-lg">
                                    <i class="fas fa-edit mr-1"></i>Draft
                                </span>
                            @endif
                        </div>
                        @if($post->is_featured)
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-500 text-white shadow-lg">
                                    <i class="fas fa-star mr-1"></i>Featured
                                </span>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="relative h-32 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <i class="fas fa-newspaper text-3xl mb-2"></i>
                            <p class="text-sm font-medium">No Image</p>
                        </div>
                        <div class="absolute top-3 right-3">
                            @if($post->is_published)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-500 text-white shadow-lg">
                                    <i class="fas fa-check mr-1"></i>Live
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-500 text-white shadow-lg">
                                    <i class="fas fa-edit mr-1"></i>Draft
                                </span>
                            @endif
                        </div>
                        @if($post->is_featured)
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-500 text-white shadow-lg">
                                    <i class="fas fa-star mr-1"></i>Featured
                                </span>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Card Content -->
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-3">
                        @if($post->category == 'News')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                📰 {{ $post->category }}
                            </span>
                        @elseif($post->category == 'Updates')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                🔄 {{ $post->category }}
                            </span>
                        @elseif($post->category == 'Events')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                📅 {{ $post->category }}
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                📢 {{ $post->category }}
                            </span>
                        @endif
                    </div>
                    
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 120) }}</p>
                    
                    <!-- Author and Date -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white text-sm font-semibold mr-3">
                                {{ substr($post->creator->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm text-gray-900 font-medium">{{ $post->creator->name }}</p>
                                <p class="text-xs text-gray-500">
                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="text-xs text-gray-400">
                            <i class="fas fa-eye mr-1"></i>{{ rand(50, 500) }} views
                        </div>
                    </div>
                </div>
                
                <!-- Card Actions -->
                <div class="p-4">
                    <div class="flex gap-2 mb-3">
                        <a href="{{ route('admin.blog-posts.edit', $post) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-2 rounded-lg transition-colors duration-200 text-center">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        
                        @if($post->is_published)
                            <form action="{{ route('admin.blog-posts.unpublish', $post) }}" method="POST" class="flex-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-2 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-eye-slash mr-1"></i>Unpublish
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.blog-posts.publish', $post) }}" method="POST" class="flex-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-2 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-eye mr-1"></i>Publish
                                </button>
                            </form>
                        @endif
                    </div>
                    
                    <!-- Additional Actions -->
                    <div class="flex gap-2">
                        <form action="{{ route('admin.blog-posts.toggle-featured', $post) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm px-3 py-2 rounded-lg transition-colors duration-200">
                                <i class="fas fa-star mr-1"></i>{{ $post->is_featured ? 'Unfeature' : 'Feature' }}
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-700 text-sm px-3 py-2 rounded-lg transition-colors duration-200">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <!-- Empty State -->
        <div class="col-span-full">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
                <div class="mb-4">
                    <i class="fas fa-newspaper text-6xl text-gray-300"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No blog posts found</h3>
                <p class="text-gray-600 mb-6">
                    @if(request()->filled('search') || request()->filled('category') || request()->filled('status'))
                        Try adjusting your filters or search terms.
                    @else
                        Get started by creating your first blog post to share news and updates.
                    @endif
                </p>
                <div class="flex gap-3 justify-center">
                    <a href="{{ route('admin.blog-posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>Create Your First Post
                    </a>
                    @if(request()->filled('search') || request()->filled('category') || request()->filled('status'))
                        <a href="{{ route('admin.blog-posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                            <i class="fas fa-times mr-2"></i>Clear Filters
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Pagination -->
@if($blogPosts->count() > 0)
    <div class="mt-6 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            <i class="fas fa-info-circle mr-1"></i>
            Showing {{ $blogPosts->firstItem() }} to {{ $blogPosts->lastItem() }} of {{ $blogPosts->total() }} posts
        </div>
        <div>
            {{ $blogPosts->links() }}
        </div>
    </div>
@endif
@endsection
