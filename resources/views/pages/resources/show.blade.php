@extends('layouts.app')

@section('title', $resource->title)

@section('content')
<div class="bg-gradient-to-r from-primary-dark to-primary py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center text-white mb-6">
                <a href="{{ route('resources') }}" class="flex items-center hover:underline">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Resources
                </a>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $resource->title }}</h1>
            <div class="flex flex-wrap items-center text-white opacity-90">
                <div class="mr-6 mb-2">
                    <span class="px-3 py-1 bg-white bg-opacity-20 rounded-full text-sm">
                        {{ $resource->category }}
                    </span>
                </div>
                <div class="mr-6 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{ $resource->created_at->format('M d, Y') }}
                </div>
                <div class="mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    {{ $resource->views }} {{ Str::plural('view', $resource->views) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            @if($resource->image_path)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
                    <img src="{{ asset('storage/' . $resource->image_path) }}" alt="{{ $resource->title }}" class="w-full h-auto">
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
                <div class="p-6">
                    <div class="prose max-w-none text-gray-600">
                        {!! $resource->content !!}
                    </div>
                </div>
            </div>

            @if($resource->external_url)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">External Resource</h2>
                        <p class="text-gray-600 mb-4">
                            This resource includes an external link for additional information.
                        </p>
                        <a href="{{ $resource->external_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-4 py-2 bg-primary text-white font-semibold rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Visit External Resource
                        </a>
                    </div>
                </div>
            @endif

            @if($relatedResources->count() > 0)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Related Resources</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($relatedResources as $related)
                                <div class="border border-gray-200 rounded-md p-4 hover:border-primary hover:shadow-sm transition-all">
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $related->title }}</h3>
                                    <p class="text-sm text-gray-500 mb-3">{{ Str::limit($related->description, 60) }}</p>
                                    <a href="{{ route('resources.show', $related->id) }}" class="text-primary-dark hover:text-primary font-medium inline-flex items-center text-sm">
                                        Read More
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
