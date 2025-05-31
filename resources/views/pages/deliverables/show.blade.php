@extends('layouts.app')

@section('title', $deliverable->title)

@section('content')
<div class="bg-gradient-to-r from-primary-dark to-primary py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center text-white mb-6">
                <a href="{{ route('deliverables') }}" class="flex items-center hover:underline">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Deliverables
                </a>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $deliverable->title }}</h1>
            <div class="flex flex-wrap items-center text-white opacity-90">
                <div class="mr-6 mb-2">
                    <span class="px-3 py-1 bg-white bg-opacity-20 rounded-full text-sm">
                        {{ $deliverable->category }}
                    </span>
                </div>
                <div class="mr-6 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{ $deliverable->created_at->format('M d, Y') }}
                </div>
                <div class="mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                    {{ $deliverable->downloads->count() }} {{ Str::plural('download', $deliverable->downloads->count()) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                    <div class="prose max-w-none text-gray-600">
                        <p>{{ $deliverable->description }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">File Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">File Name</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $deliverable->file_name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">File Type</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $deliverable->file_type }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">File Size</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ number_format($deliverable->file_size / 1024, 2) }} KB</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Uploaded By</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $deliverable->uploader->name }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('deliverables.download', $deliverable->id) }}" class="inline-flex items-center px-4 py-2 bg-primary text-white font-semibold rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                            </svg>
                            Download File
                        </a>
                    </div>
                </div>
            </div>

            @if($relatedDocuments->count() > 0)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Related Documents</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($relatedDocuments as $related)
                                <div class="border border-gray-200 rounded-md p-4 hover:border-primary hover:shadow-sm transition-all">
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $related->title }}</h3>
                                    <p class="text-sm text-gray-500 mb-3">{{ Str::limit($related->description, 60) }}</p>
                                    <a href="{{ route('deliverables.show', $related->id) }}" class="text-primary-dark hover:text-primary font-medium inline-flex items-center text-sm">
                                        View Details
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
