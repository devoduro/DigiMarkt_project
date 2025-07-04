@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Create Project Activity</h3>
        <a href="{{ route('admin.activities.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Back to Activities
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date *</label>
                        <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('date') border-red-500 @enderror" value="{{ old('date') }}" required>
                        @error('date')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status *</label>
                        <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror" required>
                            <option value="">Select Status</option>
                            <option value="Upcoming" {{ old('status') == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description *</label>
                        <textarea name="description" id="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center">
                            <!-- Hidden input ensures a value is always sent, even when checkbox is unchecked -->
                            <input type="hidden" name="featured" value="0">
                            <input type="checkbox" name="featured" id="featured" value="1" class="mr-2 leading-tight @error('featured') border-red-500 @enderror" {{ old('featured') ? 'checked' : '' }}>
                            <label for="featured" class="text-gray-700 text-sm font-bold">Featured on Homepage</label>
                        </div>
                        @error('featured')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Images</label>
                        <div class="mt-2" id="image-container">
                            <div class="image-upload-group mb-4 p-4 border rounded">
                                <div class="mb-2">
                                    <label class="block text-gray-700 text-sm mb-2">Image</label>
                                    <input type="file" name="images[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-2">
                                    <label class="block text-gray-700 text-sm mb-2">Caption</label>
                                    <input type="text" name="captions[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-image" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-sm">
                            <i class="fas fa-plus mr-1"></i> Add Another Image
                        </button>
                    </div>
                    
                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create Activity
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addImageBtn = document.getElementById('add-image');
        const imageContainer = document.getElementById('image-container');
        
        addImageBtn.addEventListener('click', function() {
            const imageGroup = document.createElement('div');
            imageGroup.className = 'image-upload-group mb-4 p-4 border rounded';
            
            imageGroup.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-700 text-sm font-bold">Additional Image</span>
                    <button type="button" class="remove-image text-red-500 hover:text-red-700">
                        <i class="fas fa-times"></i> Remove
                    </button>
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm mb-2">Image</label>
                    <input type="file" name="images[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm mb-2">Caption</label>
                    <input type="text" name="captions[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            `;
            
            imageContainer.appendChild(imageGroup);
            
            // Add event listener to the remove button
            const removeBtn = imageGroup.querySelector('.remove-image');
            removeBtn.addEventListener('click', function() {
                imageContainer.removeChild(imageGroup);
            });
        });
    });
</script>
@endsection
@endsection
