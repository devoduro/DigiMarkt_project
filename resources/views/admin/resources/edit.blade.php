@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Edit Resource</h3>
        <a href="{{ route('admin.resources.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Back to Resources
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.resources.update', $resource) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" value="{{ old('title', $resource->title) }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category *</label>
                        <input type="text" name="category" id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category') border-red-500 @enderror" value="{{ old('category', $resource->category) }}" required>
                        @error('category')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description', $resource->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="thumbnail" class="block text-gray-700 text-sm font-bold mb-2">Thumbnail Image</label>
                        @if($resource->thumbnail_path)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $resource->thumbnail_path) }}" alt="Current Thumbnail" class="h-32 w-auto">
                                <p class="text-sm text-gray-500 mt-1">Current thumbnail</p>
                            </div>
                        @endif
                        <input type="file" name="thumbnail" id="thumbnail" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('thumbnail') border-red-500 @enderror">
                        <p class="text-gray-500 text-xs mt-1">Recommended size: 300x200 pixels. Max file size: 2MB. Leave empty to keep current thumbnail.</p>
                        @error('thumbnail')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Resource File</label>
                        @if($resource->file_path)
                            <div class="mb-2">
                                <p class="text-sm">Current file: <span class="font-medium">{{ $resource->file_name }}</span></p>
                            </div>
                        @endif
                        <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('file') border-red-500 @enderror">
                        <p class="text-gray-500 text-xs mt-1">Allowed file types: PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX, ZIP. Max file size: 10MB. Leave empty to keep current file.</p>
                        @error('file')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="access_level" class="block text-gray-700 text-sm font-bold mb-2">Access Level *</label>
                        <select name="access_level" id="access_level" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('access_level') border-red-500 @enderror" required>
                            <option value="public" {{ old('access_level', $resource->access_level) == 'public' ? 'selected' : '' }}>Public (Anyone can access)</option>
                            <option value="registered" {{ old('access_level', $resource->access_level) == 'registered' ? 'selected' : '' }}>Registered Users Only</option>
                            <option value="admin" {{ old('access_level', $resource->access_level) == 'admin' ? 'selected' : '' }}>Admin Only</option>
                        </select>
                        @error('access_level')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" class="mr-2 leading-tight @error('is_featured') border-red-500 @enderror" {{ old('is_featured', $resource->is_featured) ? 'checked' : '' }}>
                            <label for="is_featured" class="text-gray-700 text-sm font-bold">Featured on Homepage</label>
                        </div>
                        @error('is_featured')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_published" id="is_published" class="mr-2 leading-tight @error('is_published') border-red-500 @enderror" {{ old('is_published', $resource->is_published) ? 'checked' : '' }}>
                            <label for="is_published" class="text-gray-700 text-sm font-bold">Published (Visible to users)</label>
                        </div>
                        @error('is_published')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Resource
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
