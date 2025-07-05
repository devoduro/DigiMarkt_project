@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="text-2xl font-semibold text-gray-800 mt-4">View Video</h1>
    <nav class="flex py-3 mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{ route('admin.videos.index') }}" class="ml-1 text-sm font-medium text-blue-600 hover:text-blue-800 md:ml-2">Videos</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">View Video</span>
                </div>
            </li>
        </ol>
    </nav>
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="bg-gray-50 px-6 py-4 border-b flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                    </svg>
                    <span class="font-medium text-gray-700">Video Preview</span>
                </div>
                <div class="p-6">
                    <div class="relative mb-6 rounded-lg overflow-hidden aspect-w-16 aspect-h-9">
                        @if($video->video_type == 'youtube' || $video->video_type == 'vimeo')
                            <iframe src="{{ $video->embed_url }}" class="absolute inset-0 w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @elseif($video->video_type == 'upload' && $video->video_file)
                            <video controls class="absolute inset-0 w-full h-full">
                                <source src="{{ asset('storage/' . $video->video_file) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <div class="absolute inset-0 w-full h-full flex items-center justify-center bg-yellow-50 border border-yellow-200 rounded-lg">
                                <div class="text-center p-4">
                                    <svg class="w-12 h-12 text-yellow-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    <p class="text-yellow-700">No video available for preview.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <h2 class="text-xl font-bold text-gray-800 mb-3">{{ $video->title }}</h2>
                    
                    <div class="flex flex-wrap items-center text-gray-500 mb-4 space-x-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $video->created_at->format('M d, Y') }}
                        </span>
                        @if($video->duration)
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $video->duration }}
                            </span>
                        @endif
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $video->views }} views
                        </span>
                    </div>
                    
                    @if($video->description)
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Description</h3>
                            <div class="prose max-w-none text-gray-600">
                                {{ $video->description }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="lg:col-span-4">
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="bg-gray-50 px-6 py-4 border-b flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium text-gray-700">Video Details</span>
                </div>
                <div class="p-6">
                    <div class="divide-y divide-gray-200">
                        <div class="py-3 flex justify-between">
                            <span class="text-sm font-medium text-gray-500">ID</span>
                            <span class="text-sm text-gray-900">{{ $video->id }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-sm font-medium text-gray-500">Type</span>
                            <span class="text-sm text-gray-900">{{ ucfirst($video->video_type) }}</span>
                        </div>
                        @if($video->category)
                            <div class="py-3 flex justify-between">
                                <span class="text-sm font-medium text-gray-500">Category</span>
                                <span class="text-sm text-gray-900">{{ $video->category }}</span>
                            </div>
                        @endif
                        <div class="py-3 flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500">Featured</span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $video->featured ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $video->featured ? 'Yes' : 'No' }}
                            </span>
                        </div>
                        <div class="py-3 flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500">Published</span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $video->published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $video->published ? 'Yes' : 'No' }}
                            </span>
                        </div>
                        @if($video->publish_date)
                            <div class="py-3 flex justify-between">
                                <span class="text-sm font-medium text-gray-500">Publish Date</span>
                                <span class="text-sm text-gray-900">{{ $video->publish_date->format('M d, Y') }}</span>
                            </div>
                        @endif
                        <div class="py-3 flex justify-between">
                            <span class="text-sm font-medium text-gray-500">Created At</span>
                            <span class="text-sm text-gray-900">{{ $video->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-sm font-medium text-gray-500">Updated At</span>
                            <span class="text-sm text-gray-900">{{ $video->updated_at->format('M d, Y H:i') }}</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-6 space-x-2">
                        <a href="{{ route('admin.videos.edit', $video->id) }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 flex-1">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="inline-block flex-1 delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="bg-gray-50 px-6 py-4 border-b flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium text-gray-700">Thumbnail</span>
                </div>
                <div class="p-6 text-center">
                    @if($video->thumbnail)
                        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" class="rounded-lg shadow-sm max-w-full mx-auto">
                    @else
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 flex items-center justify-center rounded-md">
                            <svg class="w-8 h-8 text-blue-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm text-blue-700">No thumbnail available.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Confirm delete
        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this video? This action cannot be undone.')) {
                this.submit();
            }
        });
    });
</script>
@endsection
