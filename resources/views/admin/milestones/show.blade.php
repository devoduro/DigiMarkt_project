@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Milestone Details</h3>
        <div>
            <a href="{{ route('admin.milestones.edit', $milestone) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.milestones.deliverables.index', $milestone) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                <i class="fas fa-tasks mr-2"></i> Deliverables
            </a>
            <a href="{{ route('admin.milestones.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-arrow-left mr-2"></i> Back
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
                            <p class="text-gray-600">{{ $milestone->title }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Date</h4>
                            <p class="text-gray-600">{{ $milestone->date }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Status</h4>
                            @php
                                $statusColor = [
                                    'Upcoming' => 'blue',
                                    'In Progress' => 'yellow',
                                    'Completed' => 'green',
                                    'Delayed' => 'red'
                                ][$milestone->status] ?? 'gray';
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800">
                                {{ $milestone->status }}
                            </span>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Description</h4>
                            <div class="text-gray-600 prose max-w-none">
                                {!! nl2br(e($milestone->description)) !!}
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Featured</h4>
                            <p class="text-gray-600">
                                @if($milestone->featured)
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
                            <p class="text-gray-600">{{ $milestone->creator->name ?? 'Unknown' }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Created At</h4>
                            <p class="text-gray-600">{{ $milestone->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Last Updated</h4>
                            <p class="text-gray-600">{{ $milestone->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Deliverables Progress</h4>
                            @php
                                $totalDeliverables = $milestone->deliverables->count();
                                $completedDeliverables = $milestone->deliverables->where('completed', true)->count();
                                $progressPercentage = $totalDeliverables > 0 ? round(($completedDeliverables / $totalDeliverables) * 100) : 0;
                            @endphp
                            <div class="text-gray-600">
                                <div class="flex items-center">
                                    <span class="mr-2">{{ $progressPercentage }}%</span>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $progressPercentage }}%"></div>
                                    </div>
                                </div>
                                <p class="mt-1 text-sm">{{ $completedDeliverables }} of {{ $totalDeliverables }} deliverables completed</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Deliverables -->
                @if($milestone->deliverables->count() > 0)
                    <div class="mt-8">
                        <h4 class="text-xl font-medium text-gray-700 mb-4">Deliverables</h4>
                        <div class="space-y-4">
                            @foreach($milestone->deliverables as $deliverable)
                                <div class="border rounded p-4 {{ $deliverable->completed ? 'bg-green-50' : '' }}">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h5 class="font-medium text-gray-800 mb-1">{{ $deliverable->title }}</h5>
                                            @if($deliverable->description)
                                                <p class="text-gray-600 text-sm">{{ $deliverable->description }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            @if($deliverable->completed)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    <i class="fas fa-check-circle mr-1"></i> Completed
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    <i class="fas fa-clock mr-1"></i> Pending
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <div class="flex justify-end mt-8">
                    <form action="{{ route('admin.milestones.destroy', $milestone) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this milestone?')">
                            <i class="fas fa-trash mr-2"></i> Delete Milestone
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
