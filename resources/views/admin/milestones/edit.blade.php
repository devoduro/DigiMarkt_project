@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Edit Milestone</h3>
        <a href="{{ route('admin.milestones.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Milestones
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="p-6 bg-white">
                <form action="{{ route('admin.milestones.update', $milestone) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
                            <input type="text" name="title" id="title" class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 @error('title') border-red-500 @enderror" value="{{ old('title', $milestone->title) }}" required placeholder="Enter milestone title">
                            @error('title')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date *</label>
                            <input type="date" name="date" id="date" class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 @error('date') border-red-500 @enderror" value="{{ old('date', $milestone->date) }}" required>
                            @error('date')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status *</label>
                            <div class="relative">
                                <select name="status" id="status" class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 appearance-none @error('status') border-red-500 @enderror" required>
                                    <option value="">Select Status</option>
                                    <option value="Upcoming" {{ old('status', $milestone->status) == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    <option value="In Progress" {{ old('status', $milestone->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ old('status', $milestone->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="Delayed" {{ old('status', $milestone->status) == 'Delayed' ? 'selected' : '' }}>Delayed</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            @error('status')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="completion_percentage" class="block text-gray-700 text-sm font-bold mb-2">Completion Percentage *</label>
                            <div class="flex items-center">
                                <input type="range" name="completion_percentage" id="completion_percentage" min="0" max="100" step="5" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @error('completion_percentage') border-red-500 @enderror" value="{{ old('completion_percentage', $milestone->completion_percentage) }}" required oninput="updateCompletionValue(this.value)">
                                <span id="completion_value" class="ml-4 bg-gray-100 text-gray-800 text-sm font-semibold px-3 py-1 rounded-full min-w-[60px] text-center">{{ old('completion_percentage', $milestone->completion_percentage) }}%</span>
                            </div>
                            @error('completion_percentage')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-6 mt-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description *</label>
                        <textarea name="description" id="description" rows="5" class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 @error('description') border-red-500 @enderror" required placeholder="Enter milestone description">{{ old('description', $milestone->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6 mt-4">
                        <div class="flex items-center bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <input type="checkbox" name="featured" id="featured" class="w-5 h-5 text-primary focus:ring-primary rounded transition duration-200 @error('featured') border-red-500 @enderror" {{ old('featured', $milestone->featured) ? 'checked' : '' }}>
                            <label for="featured" class="ml-3 text-gray-700 font-medium">Featured on Homepage</label>
                            <div class="ml-2 text-gray-500 text-sm">(Featured milestones will be highlighted on the homepage)</div>
                        </div>
                        @error('featured')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-end mt-8 border-t border-gray-200 pt-6">
                        <a href="{{ route('admin.milestones.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 px-6 rounded-lg mr-4 transition duration-300 ease-in-out">
                            Cancel
                        </a>
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                            <i class="fas fa-save mr-2"></i> Update Milestone
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateCompletionValue(val) {
        document.getElementById('completion_value').innerText = val + '%';
        
        // Update color based on value
        const value = parseInt(val);
        let color = 'gray';
        
        if (value < 25) color = 'blue';
        else if (value < 50) color = 'yellow';
        else if (value < 75) color = 'orange';
        else color = 'green';
        
        // Remove all color classes and add the appropriate one
        const element = document.getElementById('completion_value');
        element.className = element.className.replace(/bg-\w+-\d+/g, '');
        element.className += ` bg-${color}-100 text-${color}-800`;
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        const initialValue = document.getElementById('completion_percentage').value;
        updateCompletionValue(initialValue);
    });
</script>

@endsection
