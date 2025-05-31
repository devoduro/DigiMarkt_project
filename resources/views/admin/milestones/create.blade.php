@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Add New Milestone</h3>
        <a href="{{ route('admin.milestones.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Back to Milestones
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.milestones.store') }}" method="POST">
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
                            <option value="Delayed" {{ old('status') == 'Delayed' ? 'selected' : '' }}>Delayed</option>
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
                            <input type="checkbox" name="featured" id="featured" class="mr-2 leading-tight @error('featured') border-red-500 @enderror" {{ old('featured') ? 'checked' : '' }}>
                            <label for="featured" class="text-gray-700 text-sm font-bold">Featured on Homepage</label>
                        </div>
                        @error('featured')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-700 mb-4">Initial Deliverables</h4>
                        <p class="text-sm text-gray-500 mb-4">You can add more deliverables after creating the milestone.</p>
                        
                        <div id="deliverables-container">
                            <div class="deliverable-item border rounded p-4 mb-4">
                                <div class="mb-3">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Deliverable Title *</label>
                                    <input type="text" name="deliverables[0][title]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-3">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                    <textarea name="deliverables[0][description]" rows="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="deliverables[0][completed]" id="deliverable-0-completed" class="mr-2 leading-tight">
                                    <label for="deliverable-0-completed" class="text-gray-700 text-sm font-bold">Completed</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" id="add-deliverable" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <i class="fas fa-plus mr-2"></i> Add Another Deliverable
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create Milestone
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('deliverables-container');
        const addButton = document.getElementById('add-deliverable');
        let deliverableCount = 1;
        
        addButton.addEventListener('click', function() {
            const newDeliverable = document.createElement('div');
            newDeliverable.className = 'deliverable-item border rounded p-4 mb-4';
            newDeliverable.innerHTML = `
                <div class="flex justify-between items-center mb-3">
                    <h5 class="font-medium text-gray-700">New Deliverable</h5>
                    <button type="button" class="remove-deliverable text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deliverable Title *</label>
                    <input type="text" name="deliverables[${deliverableCount}][title]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea name="deliverables[${deliverableCount}][description]" rows="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="deliverables[${deliverableCount}][completed]" id="deliverable-${deliverableCount}-completed" class="mr-2 leading-tight">
                    <label for="deliverable-${deliverableCount}-completed" class="text-gray-700 text-sm font-bold">Completed</label>
                </div>
            `;
            
            container.appendChild(newDeliverable);
            deliverableCount++;
            
            // Add event listener to the remove button
            const removeButton = newDeliverable.querySelector('.remove-deliverable');
            removeButton.addEventListener('click', function() {
                container.removeChild(newDeliverable);
            });
        });
    });
</script>
@endpush
@endsection
