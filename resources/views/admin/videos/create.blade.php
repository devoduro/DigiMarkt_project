@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2 md:mb-0">Add New Video</h1>
    </div>
    
    <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex text-sm text-gray-500 overflow-x-auto whitespace-nowrap">
            <li class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('admin.videos.index') }}" class="hover:text-blue-600">Videos</a>
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-gray-700 font-medium" aria-current="page">Add New</span>
            </li>
        </ol>
    </nav>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="bg-gray-50 px-4 py-3 border-b border-gray-200 flex items-center">
            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium text-gray-700">Video Details</span>
        </div>
        <div class="p-5">
            @if ($errors->any())
                <div class="bg-red-50 text-red-700 p-4 rounded-md mb-6 border border-red-200">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-5">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                        
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                        </div>
                        
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="category" name="category">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Duration (e.g., "2:30")</label>
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="duration" name="duration" value="{{ old('duration') }}">
                        </div>
                    </div>
                    
                    <div class="space-y-5">
                        <div>
                            <label for="video_type" class="block text-sm font-medium text-gray-700 mb-1">Video Type <span class="text-red-500">*</span></label>
                            <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="video_type" name="video_type" required>
                                <option value="">Select Type</option>
                                <option value="youtube" {{ old('video_type') == 'youtube' ? 'selected' : '' }}>YouTube</option>
                                <option value="vimeo" {{ old('video_type') == 'vimeo' ? 'selected' : '' }}>Vimeo</option>
                                <option value="upload" {{ old('video_type') == 'upload' ? 'selected' : '' }}>Upload File</option>
                            </select>
                        </div>
                        
                        <div class="video-url-group">
                            <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">Video URL (YouTube/Vimeo)</label>
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="video_url" name="video_url" value="{{ old('video_url') }}" 
                                   placeholder="e.g., https://www.youtube.com/watch?v=XXXXXXXXXXX">
                            <p class="mt-1 text-sm text-gray-500">Enter the full URL of the YouTube or Vimeo video</p>
                        </div>
                        
                        <div class="video-file-group hidden">
                            <label for="video_file" class="block text-sm font-medium text-gray-700 mb-1">Video File</label>
                            <input type="file" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" id="video_file" name="video_file" accept="video/mp4,video/mov,video/avi,video/wmv">
                            <p class="mt-1 text-sm text-gray-500">Max file size: 100MB. Supported formats: MP4, MOV, AVI, WMV</p>
                        </div>
                        
                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Thumbnail Image</label>
                            <input type="file" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" id="thumbnail" name="thumbnail" accept="image/*">
                            <p class="mt-1 text-sm text-gray-500">Recommended size: 1280x720px (16:9 ratio)</p>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Featured Video</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" id="published" name="published" value="1" {{ old('published', '1') == '1' ? 'checked' : '' }}>
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Published</span>
                                </label>
                            </div>
                        </div>
                        
                        <div>
                            <label for="publish_date" class="block text-sm font-medium text-gray-700 mb-1">Publish Date</label>
                            <input type="date" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="publish_date" name="publish_date" value="{{ old('publish_date') }}">
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end mt-8 space-x-3">
                    <a href="{{ route('admin.videos.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancel</a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save Video</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Toggle video URL/file input based on selected type
        $('#video_type').change(function() {
            const selectedType = $(this).val();
            
            if (selectedType === 'youtube' || selectedType === 'vimeo') {
                $('.video-url-group').removeClass('hidden');
                $('.video-file-group').addClass('hidden');
                $('#video_url').attr('required', true);
                $('#video_file').attr('required', false);
            } else if (selectedType === 'upload') {
                $('.video-url-group').addClass('hidden');
                $('.video-file-group').removeClass('hidden');
                $('#video_url').attr('required', false);
                $('#video_file').attr('required', true);
            } else {
                $('.video-url-group').addClass('hidden');
                $('.video-file-group').addClass('hidden');
                $('#video_url').attr('required', false);
                $('#video_file').attr('required', false);
            }
        });
        
        // Trigger change event on page load to set initial state
        $('#video_type').trigger('change');
    });
</script>
@endsection
