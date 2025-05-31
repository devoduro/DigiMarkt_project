@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Milestone Deliverables</h3>
        <div>
            <a href="{{ route('admin.milestones.deliverables.create', $milestone) }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded mr-2">
                <i class="fas fa-plus mr-2"></i> Add Deliverable
            </a>
            <a href="{{ route('admin.milestones.show', $milestone) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-arrow-left mr-2"></i> Back to Milestone
            </a>
        </div>
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

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="mt-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @php
                    $totalDeliverables = $milestone->deliverables->count();
                    $completedDeliverables = $milestone->deliverables->where('completed', true)->count();
                    $progressPercentage = $totalDeliverables > 0 ? round(($completedDeliverables / $totalDeliverables) * 100) : 0;
                @endphp
                
                <div class="mb-6">
                    <h4 class="text-lg font-medium text-gray-700 mb-2">Progress</h4>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-blue-600 h-4 rounded-full" style="width: {{ $progressPercentage }}%"></div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <span class="text-sm text-gray-600">{{ $completedDeliverables }} of {{ $totalDeliverables }} completed</span>
                        <span class="text-sm font-medium">{{ $progressPercentage }}%</span>
                    </div>
                </div>
                
                @if($milestone->deliverables->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($milestone->deliverables as $deliverable)
                                    <tr class="{{ $deliverable->completed ? 'bg-green-50' : '' }}">
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 font-medium text-gray-900">{{ $deliverable->title }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ Str::limit($deliverable->description, 100) }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <form action="{{ route('admin.milestones.deliverables.toggle-completed', [$milestone, $deliverable]) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-{{ $deliverable->completed ? 'green' : 'gray' }}-500 hover:text-{{ $deliverable->completed ? 'green' : 'gray' }}-700">
                                                    <i class="fas fa-{{ $deliverable->completed ? 'check-circle' : 'circle' }}"></i>
                                                    {{ $deliverable->completed ? 'Completed' : 'Mark Complete' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $deliverable->creator->name ?? 'Unknown' }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200 text-sm leading-5 font-medium">
                                            <a href="{{ route('admin.milestones.deliverables.edit', [$milestone, $deliverable]) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.milestones.deliverables.destroy', [$milestone, $deliverable]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this deliverable?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500 text-lg">No deliverables found for this milestone.</p>
                        <a href="{{ route('admin.milestones.deliverables.create', $milestone) }}" class="mt-4 inline-block bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-plus mr-2"></i> Add Your First Deliverable
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
