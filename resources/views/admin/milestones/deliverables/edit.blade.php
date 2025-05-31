@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Edit Deliverable</h3>
        <a href="{{ route('admin.milestones.deliverables.index', $milestone) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Back to Deliverables
        </a>
    </div>

    <div class="mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <h4 class="text-xl font-medium text-gray-700">{{ $milestone->title }}</h4>
            <div class="flex items-center mt-2">
                @php
                    $statusColor = [
                        'Upcoming' => 'blue',
                        'In Progress' => 'yellow',
                        'Completed' => 'green',
                        'Delayed' => 'red'
                    ][$milestone->status] ?? 'gray';
                @endphp
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800 mr-3">
                    {{ $milestone->status }}
                </span>
                <span class="text-gray-600 text-sm">{{ $milestone->date }}</span>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.milestones.deliverables.update', [$milestone, $deliverable]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" value="{{ old('title', $deliverable->title) }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description', $deliverable->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="completed" id="completed" class="mr-2 leading-tight @error('completed') border-red-500 @enderror" {{ old('completed', $deliverable->completed) ? 'checked' : '' }}>
                            <label for="completed" class="text-gray-700 text-sm font-bold">Mark as Completed</label>
                        </div>
                        @error('completed')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between mt-6">
                        <form action="{{ route('admin.milestones.deliverables.destroy', [$milestone, $deliverable]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this deliverable?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <i class="fas fa-trash mr-2"></i> Delete
                            </button>
                        </form>
                        
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Deliverable
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
