@extends('layouts.admin')

@section('title', 'Create Blog Post')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Create Blog Post</h1>
            <p class="text-gray-600 mt-1">Add a new news article or blog post</p>
        </div>
        <a href="{{ route('admin.blog-posts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>Back to Blog Posts
        </a>
    </div>

    <!-- Form -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6">
                    <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data" id="blogPostForm">
                        @csrf
                        
                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Excerpt -->
                        <div class="mb-6">
                            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('excerpt') border-red-500 @enderror" 
                                      id="excerpt" name="excerpt" rows="3" 
                                      placeholder="Brief summary of the post (optional - will be auto-generated if left empty)">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-6">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-500 @enderror" 
                                      id="content" name="content" rows="15" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Featured Image -->
                        <div class="mb-6">
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                            <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('featured_image') border-red-500 @enderror" 
                                   id="featured_image" name="featured_image" accept="image/*" onchange="previewImage(this)">
                            @error('featured_image')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                            <div class="text-gray-500 text-sm mt-1">Upload an image (JPEG, PNG, JPG, GIF). Max size: 2MB</div>
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-4 hidden">
                                <div class="relative inline-block">
                                    <img id="previewImg" src="" alt="Preview" class="max-w-full h-48 object-cover rounded-lg border border-gray-300 shadow-sm">
                                    <button type="button" onclick="removeImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-sm text-gray-600 mt-2">Click the X to remove the image</p>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="News" {{ old('category') == 'News' ? 'selected' : '' }}>News</option>
                                <option value="Updates" {{ old('category') == 'Updates' ? 'selected' : '' }}>Updates</option>
                                <option value="Events" {{ old('category') == 'Events' ? 'selected' : '' }}>Events</option>
                                <option value="Announcements" {{ old('category') == 'Announcements' ? 'selected' : '' }}>Announcements</option>
                            </select>
                            @error('category')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Featured -->
                        <div class="mb-6">
                            <div class="flex items-center">
                                <input class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" type="checkbox" id="is_featured" name="is_featured" value="1" 
                                       {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="ml-2 block text-sm text-gray-900" for="is_featured">
                                    <i class="fas fa-star text-yellow-500 mr-1"></i>Featured Post
                                </label>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Featured posts appear prominently on the homepage</p>
                        </div>

                        <!-- Published Date -->
                        <div class="mb-6">
                            <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Publish Date</label>
                            <input type="datetime-local" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('published_at') border-red-500 @enderror" 
                                   id="published_at" name="published_at" value="{{ old('published_at') }}">
                            @error('published_at')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                            <p class="text-gray-500 text-sm mt-1">Leave empty to use current date/time when publishing</p>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex flex-wrap gap-3">
                            <button type="submit" name="is_published" value="1" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-check mr-2"></i>Publish Now
                            </button>
                            <button type="submit" name="is_published" value="0" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-save mr-2"></i>Save as Draft
                            </button>
                            <a href="{{ route('admin.blog-posts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 font-medium rounded-lg transition-colors duration-200">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <!-- Tips -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>Writing Tips
                    </h3>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                            <span class="text-sm text-gray-700">Use clear, engaging titles</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                            <span class="text-sm text-gray-700">Add relevant featured images</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                            <span class="text-sm text-gray-700">Write compelling excerpts</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                            <span class="text-sm text-gray-700">Preview before publishing</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-resize textarea
document.getElementById('content').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Image preview functionality
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const input = document.getElementById('featured_image');
    const preview = document.getElementById('imagePreview');
    
    input.value = '';
    preview.classList.add('hidden');
}
</script>
@endsection
