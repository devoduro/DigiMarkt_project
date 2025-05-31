@extends('layouts.admin')

@section('title', isset($deliverable) ? 'Edit Deliverable' : 'Create Deliverable')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
        {{ isset($deliverable) ? 'Edit Deliverable' : 'Create Deliverable' }}
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="{{ isset($deliverable) ? route('admin.deliverables.update', $deliverable->id) : route('admin.deliverables.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($deliverable))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', isset($deliverable) ? $deliverable->title : '') }}" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                @error('title')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>{{ old('description', isset($deliverable) ? $deliverable->description : '') }}</textarea>
                @error('description')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ old('category', isset($deliverable) ? $deliverable->category : '') == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="access_level" class="block text-sm font-medium text-gray-700">Access Level</label>
                    <select name="access_level" id="access_level" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                        <option value="public" {{ old('access_level', isset($deliverable) ? $deliverable->access_level : '') == 'public' ? 'selected' : '' }}>Public</option>
                        <option value="registered" {{ old('access_level', isset($deliverable) ? $deliverable->access_level : '') == 'registered' ? 'selected' : '' }}>Registered Users</option>
                        <option value="admin" {{ old('access_level', isset($deliverable) ? $deliverable->access_level : '') == 'admin' ? 'selected' : '' }}>Admin Only</option>
                    </select>
                    @error('access_level')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">
                    {{ isset($deliverable) ? 'Replace File (leave empty to keep current file)' : 'File' }}
                </label>
                <input type="file" name="file" id="file" class="block w-full mt-1 text-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" {{ isset($deliverable) ? '' : 'required' }}>
                @error('file')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
                
                @if(isset($deliverable) && $deliverable->file_path)
                    <p class="mt-2 text-sm text-gray-600">
                        Current file: {{ $deliverable->file_name }} ({{ number_format($deliverable->file_size / 1024, 2) }} KB)
                    </p>
                @endif
            </div>

            <div class="flex items-center mb-4">
                <input type="checkbox" name="is_published" id="is_published" class="rounded border-gray-300 text-primary focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" {{ old('is_published', isset($deliverable) ? $deliverable->is_published : false) ? 'checked' : '' }}>
                <label for="is_published" class="ml-2 block text-sm text-gray-700">
                    Publish immediately
                </label>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.deliverables.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-50 hover:bg-gray-50 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary-dark hover:bg-primary-dark focus:outline-none focus:shadow-outline-primary">
                    {{ isset($deliverable) ? 'Update Deliverable' : 'Create Deliverable' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
