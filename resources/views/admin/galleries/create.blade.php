@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Create New Gallery</h3>
        <a href="{{ route('admin.galleries.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Back to Galleries
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" id="galleryForm">
                    @csrf

                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Gallery Title</label>
                        <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description (Optional)</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Thumbnail Image</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="w-full" accept="image/jpeg,image/png,image/jpg,image/gif" required>
                        <p class="text-gray-500 text-xs mt-1">This will be the main image displayed for the gallery. Max size: 2MB</p>
                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md" id="image-upload-container">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary-dark focus-within:outline-none">
                                        <span>Upload multiple images</span>
                                        <input id="images" name="images[]" type="file" class="sr-only" multiple accept="image/jpeg,image/png,image/jpg,image/gif" required>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB each</p>
                            </div>
                        </div>
                        <div id="image-preview-container" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>
                        <div id="image-error" class="text-red-500 text-xs mt-1 hidden">Please select at least one image for the gallery</div>
                        @error('images')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @error('images.*')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="featured" value="1" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" {{ old('is_featured') ? 'checked' : '' }}>
                            <label for="featured" class="ml-2 block text-sm text-gray-700">Feature this gallery on the home page</label>
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" id="submitBtn" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create Gallery
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('images').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = '';
        
        const imageError = document.getElementById('image-error');
        if (event.target.files.length > 0) {
            imageError.classList.add('hidden');
        }
        
        Array.from(event.target.files).forEach((file, index) => {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const previewDiv = document.createElement('div');
                previewDiv.className = 'relative';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'h-32 w-full object-cover rounded';
                previewDiv.appendChild(img);
                
                const captionInput = document.createElement('input');
                captionInput.type = 'text';
                captionInput.name = `captions[${index}]`;
                captionInput.placeholder = 'Add caption (optional)';
                captionInput.className = 'mt-1 w-full text-sm px-2 py-1 border border-gray-300 rounded';
                previewDiv.appendChild(captionInput);
                
                previewContainer.appendChild(previewDiv);
            }
            
            reader.readAsDataURL(file);
        });
    });
    
    // Thumbnail preview
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.className = 'mt-2 h-32 w-auto rounded';
                preview.id = 'thumbnail-preview';
                
                const existingPreview = document.getElementById('thumbnail-preview');
                if (existingPreview) {
                    existingPreview.remove();
                }
                
                document.getElementById('thumbnail').parentNode.appendChild(preview);
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Form validation
    document.getElementById('galleryForm').addEventListener('submit', function(event) {
        const imagesInput = document.getElementById('images');
        const thumbnailInput = document.getElementById('thumbnail');
        const imageError = document.getElementById('image-error');
        
        let isValid = true;
        
        // Check if images are selected
        if (imagesInput.files.length === 0) {
            imageError.classList.remove('hidden');
            isValid = false;
        } else {
            imageError.classList.add('hidden');
        }
        
        // Check if thumbnail is selected
        if (thumbnailInput.files.length === 0) {
            isValid = false;
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>
@endsection
@endsection