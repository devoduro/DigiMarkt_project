@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Project Activity Details</h3>
        <div>
            <a href="{{ route('admin.activities.edit', $activity) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.activities.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-arrow-left mr-2"></i> Back to Activities
            </a>
        </div>
    </div>

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Title</h4>
                            <p class="text-gray-600">{{ $activity->title }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Date</h4>
                            <p class="text-gray-600">{{ $activity->date }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Status</h4>
                            @php
                                $statusColor = [
                                    'Upcoming' => 'blue',
                                    'In Progress' => 'yellow',
                                    'Completed' => 'green'
                                ][$activity->status] ?? 'gray';
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800">
                                {{ $activity->status }}
                            </span>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Description</h4>
                            <div class="text-gray-600 prose max-w-none">
                                {!! nl2br(e($activity->description)) !!}
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Featured</h4>
                            <p class="text-gray-600">
                                @if($activity->featured)
                                    <span class="text-green-500"><i class="fas fa-check-circle mr-1"></i> Yes</span>
                                @else
                                    <span class="text-red-500"><i class="fas fa-times-circle mr-1"></i> No</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <div>
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Created By</h4>
                            <p class="text-gray-600">{{ $activity->creator->name ?? 'Unknown' }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Created At</h4>
                            <p class="text-gray-600">{{ $activity->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Last Updated</h4>
                            <p class="text-gray-600">{{ $activity->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Activity Images -->
                @if($activity->images->count() > 0)
                    <div class="mt-8">
                        <h4 class="text-xl font-medium text-gray-700 mb-4">Activity Images</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($activity->images as $image)
                                <div class="border rounded p-4 {{ $image->is_primary ? 'ring-2 ring-green-500' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Activity Image" class="w-full h-40 object-cover mb-2">
                                    @if($image->is_primary)
                                        <div class="text-green-500 text-sm font-medium mb-2">
                                            <i class="fas fa-check-circle mr-1"></i> Primary Image
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <div class="flex justify-end mt-8">
                    <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this activity?')">
                            <i class="fas fa-trash mr-2"></i> Delete Activity
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
