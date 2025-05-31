@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Project Activities</h3>
        <a href="{{ route('admin.activities.create') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i> Add New Activity
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if($activities->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Images</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activities as $activity)
                                    <tr>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{ $activity->title }}</div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $activity->date }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
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
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <form action="{{ route('admin.activities.toggle-featured', $activity) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-{{ $activity->featured ? 'green' : 'gray' }}-500 hover:text-{{ $activity->featured ? 'green' : 'gray' }}-700">
                                                    <i class="fas fa-{{ $activity->featured ? 'star' : 'star text-gray-400' }}"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $activity->images->count() }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $activity->creator->name ?? 'Unknown' }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200 text-sm leading-5 font-medium">
                                            <a href="{{ route('admin.activities.show', $activity) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.activities.edit', $activity) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this activity?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $activities->links() }}
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500 text-lg">No project activities found.</p>
                        <a href="{{ route('admin.activities.create') }}" class="mt-4 inline-block bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-plus mr-2"></i> Add Your First Activity
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
