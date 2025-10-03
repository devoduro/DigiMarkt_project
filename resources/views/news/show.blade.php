@extends('layouts.app')

@section('title', $blogPost->title)

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('news.index') }}" class="ml-1 text-gray-600 hover:text-blue-600 md:ml-2">News</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-500 md:ml-2 truncate">{{ Str::limit($blogPost->title, 50) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <article class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Featured Image -->
            @if($blogPost->featured_image)
                <div class="relative h-64 md:h-96 overflow-hidden">
                    <img src="{{ asset('storage/' . $blogPost->featured_image) }}" 
                         alt="{{ $blogPost->title }}" 
                         class="w-full h-full object-cover">
                    @if($blogPost->is_featured)
                        <div class="absolute top-6 left-6 bg-yellow-500 text-white px-4 py-2 rounded-full font-semibold">
                            <i class="fas fa-star mr-2"></i>Featured Article
                        </div>
                    @endif
                </div>
            @endif
            
            <div class="p-8">
                <!-- Article Meta -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <span class="inline-block px-3 py-1 bg-{{ $blogPost->category === 'News' ? 'blue' : ($blogPost->category === 'Updates' ? 'green' : ($blogPost->category === 'Events' ? 'purple' : 'orange')) }}-100 text-{{ $blogPost->category === 'News' ? 'blue' : ($blogPost->category === 'Updates' ? 'green' : ($blogPost->category === 'Events' ? 'purple' : 'orange')) }}-800 rounded-full text-sm font-medium">
                        {{ $blogPost->category }}
                    </span>
                    <span class="text-gray-500 text-sm">{{ $blogPost->published_at->format('F d, Y') }}</span>
                    <div class="flex items-center text-sm text-gray-500">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold mr-2">
                            {{ substr($blogPost->creator->name, 0, 1) }}
                        </div>
                        <span>By {{ $blogPost->creator->name }}</span>
                    </div>
                </div>
                
                <!-- Article Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $blogPost->title }}
                </h1>
                
                <!-- Article Excerpt -->
                @if($blogPost->excerpt)
                    <div class="text-xl text-gray-600 mb-8 leading-relaxed border-l-4 border-blue-500 pl-6 italic">
                        {{ $blogPost->excerpt }}
                    </div>
                @endif
                
                <!-- Article Content -->
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($blogPost->content)) !!}
                </div>
                
                <!-- Article Footer -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                                {{ substr($blogPost->creator->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $blogPost->creator->name }}</p>
                                <p class="text-sm text-gray-500">Published on {{ $blogPost->published_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-2">
                            <a href="{{ route('news.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-300">
                                <i class="fas fa-arrow-left mr-2"></i>Back to News
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        
        <!-- Related Articles -->
        @if($relatedPosts->count() > 0)
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-900 mb-8">Related Articles</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $relatedPost)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            @if($relatedPost->featured_image)
                                <div class="h-32 overflow-hidden">
                                    <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" 
                                         alt="{{ $relatedPost->title }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="h-32 bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs px-2 py-1 bg-{{ $relatedPost->category === 'News' ? 'blue' : ($relatedPost->category === 'Updates' ? 'green' : ($relatedPost->category === 'Events' ? 'purple' : 'orange')) }}-100 text-{{ $relatedPost->category === 'News' ? 'blue' : ($relatedPost->category === 'Updates' ? 'green' : ($relatedPost->category === 'Events' ? 'purple' : 'orange')) }}-800 rounded">
                                        {{ $relatedPost->category }}
                                    </span>
                                    <span class="text-xs text-gray-500">{{ $relatedPost->published_at->format('M d') }}</span>
                                </div>
                                
                                <h4 class="font-semibold text-gray-900 mb-2 line-clamp-2">
                                    <a href="{{ route('news.show', $relatedPost) }}" class="hover:text-blue-600">
                                        {{ $relatedPost->title }}
                                    </a>
                                </h4>
                                
                                <p class="text-sm text-gray-600 line-clamp-2 mb-3">{{ $relatedPost->excerpt }}</p>
                                
                                <a href="{{ route('news.show', $relatedPost) }}" class="text-blue-600 text-sm font-medium hover:text-blue-800">
                                    Read more →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
