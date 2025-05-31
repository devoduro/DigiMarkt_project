@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Edit Milestone</h3>
        <a href="{{ route('admin.milestones.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Back to Milestones
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.milestones.update', $milestone) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" value="{{ old('title', $milestone->title) }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date *</label>
                        <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('date') border-red-500 @enderror" value="{{ old('date', $milestone->date) }}" required>
                        @error('date')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status *</label>
                        <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror" required>
                            <option value="">Select Status</option>
                            <option value="Upcoming" {{ old('status', $milestone->status) == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="In Progress" {{ old('status', $milestone->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ old('status', $milestone->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Delayed" {{ old('status', $milestone->status) == 'Delayed' ? 'selected' : '' }}>Delayed</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description *</label>
                        <textarea name="description" id="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" required>{{ old('description', $milestone->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="featured" id="featured" class="mr-2 leading-tight @error('featured') border-red-500 @enderror" {{ old('featured', $milestone->featured) ? 'checked' : '' }}>
                            <label for="featured" class="text-gray-700 text-sm font-bold">Featured on Homepage</label>
                        </div>
                        @error('featured')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('admin.milestones.deliverables.index', $milestone) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            <i class="fas fa-tasks mr-2"></i> Manage Deliverables
                        </a>
                        
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Milestone
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
