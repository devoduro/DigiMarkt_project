@extends('layouts.app')

@section('title', 'News & Updates')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">News & Updates</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Stay informed with the latest news, project updates, and announcements from the DigiMarkt project
            </p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <form method="GET" action="{{ route('news.index') }}" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search news articles..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="md:w-48">
                <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
                <a href="{{ route('news.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-300">
                    Clear
                </a>
            </div>
        </form>
    </div>

    @if($blogPosts->count() > 0)
        <!-- Blog Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($blogPosts as $post)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group border border-gray-100">
                    @if($post->featured_image)
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            @if($post->is_featured)
                                <div class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    <i class="fas fa-star mr-1"></i>Featured
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="relative h-48 bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            @if($post->is_featured)
                                <div class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    <i class="fas fa-star mr-1"></i>Featured
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block px-2 py-1 bg-{{ $post->category === 'News' ? 'blue' : ($post->category === 'Updates' ? 'green' : ($post->category === 'Events' ? 'purple' : 'orange')) }}-100 text-{{ $post->category === 'News' ? 'blue' : ($post->category === 'Updates' ? 'green' : ($post->category === 'Events' ? 'purple' : 'orange')) }}-800 rounded text-sm font-medium">
                                {{ $post->category }}
                            </span>
                            <span class="text-gray-500 text-sm">{{ $post->published_at->format('M d, Y') }}</span>
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                            <a href="{{ route('news.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold mr-2">
                                    {{ substr($post->creator->name, 0, 1) }}
                                </div>
                                <span>{{ $post->creator->name }}</span>
                            </div>
                            
                            <a href="{{ route('news.show', $post) }}" class="text-blue-600 font-medium inline-flex items-center group-hover:text-blue-800 transition-colors duration-300">
                                Read more
                                <svg class="w-4 h-4 ml-2 group-hover:ml-3 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $blogPosts->appends(request()->query())->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="max-w-md mx-auto">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">No news articles found</h3>
                <p class="text-gray-600 mb-6">
                    @if(request()->filled('search') || request()->filled('category'))
                        Try adjusting your search criteria or browse all articles.
                    @else
                        Check back later for the latest news and updates.
                    @endif
                </p>
                @if(request()->filled('search') || request()->filled('category'))
                    <a href="{{ route('news.index') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">
                        View All Articles
                    </a>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection
