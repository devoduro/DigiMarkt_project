@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Blog Post</h1>
            <p class="text-gray-600 mt-1">Update "{{ $blogPost->title }}"</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.blog-posts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back to Blog Posts
            </a>
            @if($blogPost->is_published)
                <a href="{{ route('news.show', $blogPost) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <i class="fas fa-external-link-alt mr-2"></i>View Live
                </a>
            @endif
        </div>
    </div>

    <!-- Form -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6">
                    <form action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" 
                                   id="title" name="title" value="{{ old('title', $blogPost->title) }}" required>
                            @error('title')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Excerpt -->
                        <div class="mb-6">
                            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('excerpt') border-red-500 @enderror" 
                                      id="excerpt" name="excerpt" rows="3" 
                                      placeholder="Brief summary of the post (optional - will be auto-generated if left empty)">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-6">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-500 @enderror" 
                                      id="content" name="content" rows="15" required>{{ old('content', $blogPost->content) }}</textarea>
                            @error('content')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Current Featured Image -->
                        @if($blogPost->featured_image)
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Featured Image</label>
                                <div class="relative inline-block">
                                    <img src="{{ asset('storage/' . $blogPost->featured_image) }}" 
                                         alt="Current Featured Image" 
                                         class="w-48 h-32 object-cover rounded-lg border border-gray-300 shadow-sm">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                                        <button type="button" onclick="document.getElementById('imageModal').classList.remove('hidden')" 
                                                class="opacity-0 hover:opacity-100 bg-white text-gray-700 px-3 py-1 rounded-md text-sm font-medium transition-opacity duration-200">
                                            <i class="fas fa-search-plus mr-1"></i>View Full Size
                                        </button>
                                    </div>
                                </div>
                                <p class="text-gray-500 text-sm mt-2">Upload a new image to replace the current one</p>
                            </div>
                        @endif

                        <!-- Featured Image Upload -->
                        <div class="mb-6">
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $blogPost->featured_image ? 'Replace Featured Image' : 'Featured Image' }}
                            </label>
                            <div class="relative">
                                <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('featured_image') border-red-500 @enderror" 
                                       id="featured_image" name="featured_image" accept="image/*" onchange="previewImage(this)">
                                @error('featured_image')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <div class="text-gray-500 text-sm mt-1">Upload an image (JPEG, PNG, JPG, GIF). Max size: 2MB</div>
                            </div>
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-3 hidden">
                                <img id="previewImg" class="w-48 h-32 object-cover rounded-lg border border-gray-300 shadow-sm">
                                <p class="text-gray-500 text-sm mt-1">New image preview</p>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="News" {{ old('category', $blogPost->category) == 'News' ? 'selected' : '' }}>News</option>
                                <option value="Updates" {{ old('category', $blogPost->category) == 'Updates' ? 'selected' : '' }}>Updates</option>
                                <option value="Events" {{ old('category', $blogPost->category) == 'Events' ? 'selected' : '' }}>Events</option>
                                <option value="Announcements" {{ old('category', $blogPost->category) == 'Announcements' ? 'selected' : '' }}>Announcements</option>
                            </select>
                            @error('category')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Featured -->
                        <div class="mb-6">
                            <div class="flex items-center">
                                <input class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" type="checkbox" id="is_featured" name="is_featured" value="1" 
                                       {{ old('is_featured', $blogPost->is_featured) ? 'checked' : '' }}>
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
                                   id="published_at" name="published_at" 
                                   value="{{ old('published_at', $blogPost->published_at ? $blogPost->published_at->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                            <p class="text-gray-500 text-sm mt-1">Leave empty to use current date/time when publishing</p>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex flex-wrap gap-3">
                            <button type="submit" name="is_published" value="1" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-check mr-2"></i>{{ $blogPost->is_published ? 'Update & Keep Published' : 'Update & Publish' }}
                            </button>
                            <button type="submit" name="is_published" value="0" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-save mr-2"></i>{{ $blogPost->is_published ? 'Update & Unpublish' : 'Update as Draft' }}
                            </button>
                            <a href="{{ route('admin.blog-posts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 font-medium rounded-lg transition-colors duration-200">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <!-- Post Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>Post Information
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="text-center">
                            <p class="text-sm font-medium text-gray-500 mb-1">Status</p>
                            @if($blogPost->is_published)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>Published
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-edit mr-1"></i>Draft
                                </span>
                            @endif
                        </div>
                        <div class="text-center">
                            <p class="text-sm font-medium text-gray-500 mb-1">Featured</p>
                            @if($blogPost->is_featured)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-star mr-1"></i>Yes
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    No
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-500">Created:</span>
                            <span class="text-sm text-gray-900">{{ $blogPost->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-500">Updated:</span>
                            <span class="text-sm text-gray-900">{{ $blogPost->updated_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-500">Author:</span>
                            <span class="text-sm text-gray-900">{{ $blogPost->creator->name }}</span>
                        </div>
                        @if($blogPost->published_at)
                            <div class="flex justify-between">
                                <span class="text-sm font-medium text-gray-500">Published:</span>
                                <span class="text-sm text-gray-900">{{ $blogPost->published_at->format('M d, Y H:i') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        <i class="fas fa-bolt text-yellow-500 mr-2"></i>Quick Actions
                    </h3>
                </div>
                <div class="p-6 space-y-3">
                    @if($blogPost->is_published)
                        <a href="{{ route('news.show', $blogPost) }}" target="_blank" class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <i class="fas fa-external-link-alt mr-2"></i>View Live Post
                        </a>
                    @endif
                    
                    <form action="{{ route('admin.blog-posts.toggle-featured', $blogPost) }}" method="POST" class="w-full">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-lg transition-colors duration-200">
                            <i class="fas fa-star mr-2"></i>{{ $blogPost->is_featured ? 'Remove from Featured' : 'Mark as Featured' }}
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.blog-posts.destroy', $blogPost) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this blog post? This action cannot be undone.')" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <i class="fas fa-trash mr-2"></i>Delete Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
@if($blogPost->featured_image)
<div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
    <div class="relative max-w-4xl max-h-full p-4">
        <img src="{{ asset('storage/' . $blogPost->featured_image) }}" 
             alt="{{ $blogPost->title }}" 
             class="max-w-full max-h-full object-contain rounded-lg">
        <button onclick="document.getElementById('imageModal').classList.add('hidden')" 
                class="absolute top-4 right-4 bg-white text-gray-700 rounded-full p-2 hover:bg-gray-100 transition-colors duration-200">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

<script>
// Auto-resize textarea
document.getElementById('content').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Image preview function
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}

// Close modal when clicking outside
document.getElementById('imageModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        this.classList.add('hidden');
    }
});
</script>
@endsection
