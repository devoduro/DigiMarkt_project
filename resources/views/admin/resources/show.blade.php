@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Resource Details</h3>
        <div>
            <a href="{{ route('admin.resources.edit', $resource) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.resources.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-arrow-left mr-2"></i> Back to Resources
            </a>
        </div>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Title</h4>
                            <p class="text-gray-600">{{ $resource->title }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Category</h4>
                            <p class="text-gray-600">{{ $resource->category }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Description</h4>
                            <div class="text-gray-600 prose max-w-none">
                                {!! nl2br(e($resource->description)) !!}
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Access Level</h4>
                            @php
                                $accessColor = [
                                    'public' => 'green',
                                    'registered' => 'blue',
                                    'admin' => 'red'
                                ][$resource->access_level] ?? 'gray';
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $accessColor }}-100 text-{{ $accessColor }}-800">
                                {{ ucfirst($resource->access_level) }}
                            </span>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Status</h4>
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <span class="font-medium text-gray-700">Featured:</span>
                                    @if($resource->is_featured)
                                        <span class="text-green-500 ml-2"><i class="fas fa-check-circle mr-1"></i> Yes</span>
                                    @else
                                        <span class="text-red-500 ml-2"><i class="fas fa-times-circle mr-1"></i> No</span>
                                    @endif
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Published:</span>
                                    @if($resource->is_published)
                                        <span class="text-green-500 ml-2"><i class="fas fa-check-circle mr-1"></i> Yes</span>
                                    @else
                                        <span class="text-red-500 ml-2"><i class="fas fa-times-circle mr-1"></i> No</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        @if($resource->file_path)
                            <div class="mb-6">
                                <h4 class="text-lg font-medium text-gray-700 mb-2">Resource File</h4>
                                <div class="flex items-center">
                                    <i class="fas fa-file-alt text-gray-500 mr-2"></i>
                                    <span class="text-gray-600">{{ $resource->file_name }}</span>
                                    <a href="{{ route('admin.resources.download', $resource) }}" class="ml-3 text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-download mr-1"></i> Download
                                    </a>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Downloaded {{ $resource->download_count }} times</p>
                            </div>
                        @endif
                    </div>
                    
                    <div>
                        @if($resource->thumbnail_path)
                            <div class="mb-6">
                                <h4 class="text-lg font-medium text-gray-700 mb-2">Thumbnail</h4>
                                <img src="{{ asset('storage/' . $resource->thumbnail_path) }}" alt="Resource Thumbnail" class="w-full h-auto rounded">
                            </div>
                        @endif
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Created By</h4>
                            <p class="text-gray-600">{{ $resource->creator->name ?? 'Unknown' }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Created At</h4>
                            <p class="text-gray-600">{{ $resource->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Last Updated</h4>
                            <p class="text-gray-600">{{ $resource->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end mt-8">
                    <form action="{{ route('admin.resources.destroy', $resource) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this resource?')">
                            <i class="fas fa-trash mr-2"></i> Delete Resource
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
