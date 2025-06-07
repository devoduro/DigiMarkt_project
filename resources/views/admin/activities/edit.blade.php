@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Edit Project Activity</h3>
        <a href="{{ route('admin.activities.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Back to Activities
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.activities.update', $activity) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" value="{{ old('title', $activity->title) }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date *</label>
                        <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('date') border-red-500 @enderror" value="{{ old('date', $activity->date) }}" required>
                        @error('date')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status *</label>
                        <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror" required>
                            <option value="">Select Status</option>
                            <option value="Upcoming" {{ old('status', $activity->status) == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="In Progress" {{ old('status', $activity->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ old('status', $activity->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description *</label>
                        <textarea name="description" id="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" required>{{ old('description', $activity->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="featured" id="featured" class="mr-2 leading-tight @error('featured') border-red-500 @enderror" {{ old('featured', $activity->featured) ? 'checked' : '' }}>
                            <label for="featured" class="text-gray-700 text-sm font-bold">Featured on Homepage</label>
                        </div>
                        @error('featured')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Current Images -->
                    @if($activity->images->count() > 0)
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-4">Current Images</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($activity->images as $image)
                                    <div class="border rounded p-4 relative">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Activity Image" class="w-full h-40 object-cover mb-2">
                                        <div class="flex justify-between items-center">
                                            <form action="{{ route('admin.activities.images.set-primary', [$activity, $image]) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-{{ $image->is_primary ? 'green' : 'gray' }}-500 hover:text-{{ $image->is_primary ? 'green' : 'gray' }}-700 mr-2">
                                                    <i class="fas fa-{{ $image->is_primary ? 'check-circle' : 'circle' }}"></i> 
                                                    {{ $image->is_primary ? 'Primary' : 'Set as Primary' }}
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.activities.images.destroy', [$activity, $image]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this image?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Activity
                        </button>
                    </div>
                </form>
                
                <!-- Add New Images (Separate Form) -->
                <div class="mt-8 mb-6">
                    <h4 class="text-lg font-medium text-gray-700 mb-4">Add New Images</h4>
                    <form action="{{ route('admin.activities.images.store', $activity) }}" method="POST" enctype="multipart/form-data" class="border rounded p-4">
                        @csrf
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image File *</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" required>
                            @error('image')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="is_primary" id="is_primary" class="mr-2 leading-tight">
                                <label for="is_primary" class="text-gray-700 text-sm font-bold">Set as Primary Image</label>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <i class="fas fa-upload mr-2"></i> Upload Image
                            </button>
                        </div>
                    </form>
                </div>
                    

            </div>
        </div>
    </div>
</div>
@endsection
