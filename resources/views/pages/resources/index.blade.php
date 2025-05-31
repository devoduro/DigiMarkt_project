@extends('layouts.app')

@section('title', 'Resources')

@section('content')
<div class="bg-gradient-to-r from-primary-dark to-primary py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Digital Marketing Resources</h1>
            <p class="text-xl text-white opacity-90">
                Explore our collection of free resources to enhance your digital marketing knowledge
            </p>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <!-- Categories Filter -->
        <div class="max-w-7xl mx-auto mb-10">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('resources') }}" class="px-4 py-2 rounded-full {{ !request('category') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} font-medium transition-colors">
                    All Resources
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('resources', ['category' => $category['name']]) }}" class="px-4 py-2 rounded-full {{ request('category') == $category['name'] ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} font-medium transition-colors">
                        {{ $category['name'] }} ({{ $category['count'] }})
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Resources Grid -->
        <div class="max-w-7xl mx-auto">
            @if($resources->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($resources as $resource)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            @if($resource->thumbnail_path)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $resource->thumbnail_path) }}" alt="{{ $resource->title }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="h-48 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="px-3 py-1 bg-primary-light bg-opacity-20 text-primary-dark rounded-full text-sm">
                                        {{ $resource->category }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        {{ $resource->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $resource->title }}</h3>
                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit($resource->description, 100) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('resources.show', $resource->id) }}" class="text-primary-dark hover:text-primary font-medium inline-flex items-center">
                                            Read More
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                        @if($resource->file_path)
                                        <a href="{{ route('resources.download', $resource->id) }}" class="text-green-600 hover:text-green-800 font-medium inline-flex items-center">
                                            Download
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                            </svg>
                                        </a>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $resource->download_count ?? 0 }} {{ Str::plural('download', $resource->download_count ?? 0) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $resources->withQueryString()->links() }}
                </div>
            @else
                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No resources found</h3>
                    <p class="text-gray-500">
                        @if(request('category'))
                            No resources found in this category. Try another category or check back later.
                        @else
                            There are no resources available at the moment. Please check back later.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
