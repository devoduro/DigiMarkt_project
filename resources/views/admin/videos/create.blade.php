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
                                <option value="upload" {{ old('video_type', 'upload') == 'upload' ? 'selected' : '' }}>Upload File</option>
                            </select>
                        </div>
                        
                        <div class="video-url-group">
                            <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">Video URL (YouTube/Vimeo)</label>
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="video_url" name="video_url" value="{{ old('video_url') }}" 
                                   placeholder="e.g., https://www.youtube.com/watch?v=XXXXXXXXXXX">
                            <p class="mt-1 text-sm text-gray-500">Enter the full URL of the YouTube or Vimeo video</p>
                        </div>
                        
                        <div class="video-file-group">
                            <label for="video_file" class="block text-sm font-medium text-gray-700 mb-1">Video File</label>
                            
                            <div class="video-upload-container border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors cursor-pointer bg-gray-50" id="video-dropzone">
                                <input type="file" class="hidden" id="video_file" name="video_file" accept="video/mp4,video/mov,video/avi,video/wmv">
                                
                                <!-- Upload Icon State -->
                                <div class="video-upload-placeholder">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H8m36-12h-4m-8-4v4m0 0v4m0-4h12M4 16h4m4 0h12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-2 text-sm font-medium text-gray-900">Drag and drop your video here</p>
                                    <p class="mt-1 text-xs text-gray-500">Or click to browse</p>
                                    <button type="button" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="browse-video-btn">
                                        Browse files
                                    </button>
                                </div>
                                
                                <!-- Preview State -->
                                <div class="video-preview hidden flex flex-col items-center">
                                    <div class="relative w-full max-w-md aspect-video bg-black rounded-lg overflow-hidden mb-3">
                                        <video class="w-full h-full object-contain" id="video-preview" controls></video>
                                    </div>
                                    <div class="flex items-center justify-between w-full max-w-md">
                                        <div class="flex-1 mr-4">
                                            <p class="text-sm font-medium text-gray-900 truncate" id="video-name"></p>
                                            <p class="text-xs text-gray-500" id="video-size"></p>
                                        </div>
                                        <button type="button" class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="remove-video-btn">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Upload Progress -->
                                <div class="upload-progress hidden w-full max-w-md mx-auto mt-4">
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700">Uploading...</span>
                                        <span class="text-sm font-medium text-gray-700" id="upload-percentage">0%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-blue-600 h-2.5 rounded-full" id="upload-progress-bar" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                <span>Max file size: 100MB. Supported formats: MP4, MOV, AVI, WMV</span>
                            </div>
                            
                            <!-- Error message container -->
                            <div class="hidden mt-2 text-sm text-red-600" id="video-upload-error"></div>
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
        
        // Initialize video type on page load
        const initialVideoType = $('#video_type').val() || 'upload';
        $('#video_type').val(initialVideoType).trigger('change');
        
        // Video upload functionality
        const videoDropzone = document.getElementById('video-dropzone');
        const videoInput = document.getElementById('video_file');
        const browseBtn = document.getElementById('browse-video-btn');
        const removeBtn = document.getElementById('remove-video-btn');
        const videoPreview = document.getElementById('video-preview');
        const videoName = document.getElementById('video-name');
        const videoSize = document.getElementById('video-size');
        const uploadPlaceholder = document.querySelector('.video-upload-placeholder');
        const previewContainer = document.querySelector('.video-preview');
        const errorContainer = document.getElementById('video-upload-error');
        
        // Make sure all elements exist before adding event listeners
        if (!videoDropzone || !videoInput || !browseBtn || !removeBtn || !videoPreview || 
            !videoName || !videoSize || !uploadPlaceholder || !previewContainer || !errorContainer) {
            console.error('One or more video upload elements not found');
        }
        
        // Handle click on dropzone
        if (videoDropzone) {
            videoDropzone.addEventListener('click', function(e) {
                // Only trigger file input if not clicking the remove button or browse button
                if (e.target !== removeBtn && !removeBtn.contains(e.target) && 
                    e.target !== browseBtn && !browseBtn.contains(e.target)) {
                    videoInput.click();
                }
                e.preventDefault(); // Prevent form submission
            });
        }
        
        // Handle click on browse button
        if (browseBtn) {
            browseBtn.addEventListener('click', function(e) {
                videoInput.click();
                e.preventDefault(); // Prevent event bubbling and form submission
                e.stopPropagation();
            });
        }
        
        // Handle drag and drop events
        if (videoDropzone) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                videoDropzone.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                videoDropzone.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                videoDropzone.addEventListener(eventName, unhighlight, false);
            });
        }
        
        function highlight() {
            videoDropzone.classList.add('border-blue-500', 'bg-blue-50');
        }
        
        function unhighlight() {
            videoDropzone.classList.remove('border-blue-500', 'bg-blue-50');
        }
        
        // Handle file drop
        if (videoDropzone) {
            videoDropzone.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                if (dt.files && dt.files.length > 0) {
                    const file = dt.files[0];
                    handleVideoFile(file);
                }
            }
        }
        
        // Handle file selection via input
        if (videoInput) {
            videoInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    handleVideoFile(this.files[0]);
                }
            });
        }
        
        // Handle remove button click
        if (removeBtn) {
            removeBtn.addEventListener('click', function(e) {
                resetVideoUpload();
                e.preventDefault(); // Prevent form submission
                e.stopPropagation();
            });
        }
        
        function handleVideoFile(file) {
            if (!file) return;
            
            // Reset any previous errors
            if (errorContainer) {
                errorContainer.classList.add('hidden');
                errorContainer.textContent = '';
            }
            
            // Validate file type
            const acceptedTypes = ['video/mp4', 'video/quicktime', 'video/x-msvideo', 'video/x-ms-wmv'];
            if (!acceptedTypes.includes(file.type)) {
                showError('Invalid file type. Please upload MP4, MOV, AVI, or WMV files only.');
                return;
            }
            
            // Validate file size (100MB max)
            const maxSize = 100 * 1024 * 1024; // 100MB in bytes
            if (file.size > maxSize) {
                showError('File is too large. Maximum size is 100MB.');
                return;
            }
            
            // Update UI to show preview
            if (uploadPlaceholder && previewContainer) {
                uploadPlaceholder.classList.add('hidden');
                previewContainer.classList.remove('hidden');
            }
            
            // Set video source and show preview
            if (videoPreview) {
                const objectUrl = URL.createObjectURL(file);
                videoPreview.src = objectUrl;
            }
            
            // Set file info
            if (videoName && videoSize) {
                videoName.textContent = file.name;
                videoSize.textContent = formatFileSize(file.size);
            }
            
            // Store the file in the input
            try {
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                videoInput.files = dataTransfer.files;
            } catch (e) {
                console.error('Error setting file input:', e);
            }
        }
        
        function resetVideoUpload() {
            // Clear the file input
            if (videoInput) {
                videoInput.value = '';
            }
            
            // Reset the UI
            if (uploadPlaceholder && previewContainer) {
                uploadPlaceholder.classList.remove('hidden');
                previewContainer.classList.add('hidden');
            }
            
            if (videoPreview) {
                videoPreview.src = '';
            }
            
            if (videoName) {
                videoName.textContent = '';
            }
            
            if (videoSize) {
                videoSize.textContent = '';
            }
            
            // Hide error message if any
            if (errorContainer) {
                errorContainer.classList.add('hidden');
            }
        }
        
        function showError(message) {
            if (errorContainer) {
                errorContainer.textContent = message;
                errorContainer.classList.remove('hidden');
            }
            resetVideoUpload();
        }
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
        
        // Handle form submission
        $('form').on('submit', function(e) {
            const videoType = $('#video_type').val();
            
            if (videoType === 'upload' && !videoInput.files.length) {
                e.preventDefault();
                showError('Please select a video file to upload.');
            }
        });
    });
</script>
@endsection
