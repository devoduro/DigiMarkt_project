@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Edit Gallery</h3>
        <a href="{{ route('admin.galleries.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Back to Galleries
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Gallery Title *</label>
                        <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary" value="{{ old('title', $gallery->title) }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Thumbnail Image</label>
                        <div class="mt-1 flex items-center">
                            <div class="h-32 w-32 rounded-md overflow-hidden bg-gray-100">
                                <img src="{{ asset('storage/' . $gallery->thumbnail_path) }}" alt="Thumbnail" class="h-full w-full object-cover">
                            </div>
                            <input type="file" name="thumbnail" id="thumbnail" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Leave empty to keep the current thumbnail</p>
                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="featured" class="rounded border-gray-300 text-primary focus:ring-primary" value="1" {{ old('featured', $gallery->is_featured) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600">Feature this gallery on the home page</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Gallery
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Gallery Images Section -->
    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h4 class="text-lg font-medium text-gray-700 mb-4">Gallery Images</h4>
                
                <!-- Add New Image Form -->
                <form action="{{ route('admin.galleries.images.store', $gallery) }}" method="POST" enctype="multipart/form-data" class="mb-8 p-4 bg-gray-50 rounded-lg">
                    @csrf
                    <h5 class="font-medium text-gray-700 mb-4">Add New Image</h5>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="col-span-1">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image *</label>
                            <input type="file" name="image" id="image" class="w-full bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" required>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-span-1 md:col-span-2">
                            <label for="caption" class="block text-sm font-medium text-gray-700 mb-2">Caption</label>
                            <input type="text" name="caption" id="caption" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                            @error('caption')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Add Image
                        </button>
                    </div>
                </form>
                
                <!-- Existing Images -->
                @if($gallery->images->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($gallery->images as $image)
                            <div class="bg-white rounded-lg shadow overflow-hidden">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery image" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <p class="text-gray-700 mb-2">{{ $image->caption ?? 'No caption' }}</p>
                                    <div class="flex justify-end">
                                        <form action="{{ route('admin.galleries.images.destroy', [$gallery, $image]) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this image?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-gray-500">No images in this gallery yet. Add some images above.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection