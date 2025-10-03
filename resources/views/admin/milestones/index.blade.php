@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h3 class="text-3xl font-medium text-gray-700">Project Milestones</h3>
            <p class="text-gray-500 mt-1">Track and manage your project timeline and progress</p>
        </div>
        <a href="{{ route('admin.milestones.create') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Milestone
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 p-4 my-4 rounded-lg shadow-md animate__animated animate__fadeIn" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="mt-8">
        <!-- Milestone Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @php
                $upcomingCount = isset($milestones) ? $milestones->where('status', 'Upcoming')->count() : 0;
                $inProgressCount = isset($milestones) ? $milestones->where('status', 'In Progress')->count() : 0;
                $completedCount = isset($milestones) ? $milestones->where('status', 'Completed')->count() : 0;
                $delayedCount = isset($milestones) ? $milestones->where('status', 'Delayed')->count() : 0;
                $totalCount = $upcomingCount + $inProgressCount + $completedCount + $delayedCount;
                $completionRate = $totalCount > 0 ? round(($completedCount / $totalCount) * 100) : 0;
            @endphp
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-blue-600 bg-blue-50 rounded-full px-2 py-1">{{ round(($upcomingCount / ($totalCount ?: 1)) * 100) }}%</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $upcomingCount }}</h3>
                    <p class="text-sm font-medium text-gray-500 uppercase mt-1">Upcoming</p>
                </div>
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-1"></div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="bg-yellow-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-yellow-600 bg-yellow-50 rounded-full px-2 py-1">{{ round(($inProgressCount / ($totalCount ?: 1)) * 100) }}%</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $inProgressCount }}</h3>
                    <p class="text-sm font-medium text-gray-500 uppercase mt-1">In Progress</p>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 h-1"></div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-green-600 bg-green-50 rounded-full px-2 py-1">{{ round(($completedCount / ($totalCount ?: 1)) * 100) }}%</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $completedCount }}</h3>
                    <p class="text-sm font-medium text-gray-500 uppercase mt-1">Completed</p>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 h-1"></div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="bg-red-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-red-600 bg-red-50 rounded-full px-2 py-1">{{ round(($delayedCount / ($totalCount ?: 1)) * 100) }}%</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $delayedCount }}</h3>
                    <p class="text-sm font-medium text-gray-500 uppercase mt-1">Delayed</p>
                </div>
                <div class="bg-gradient-to-r from-red-500 to-red-600 h-1"></div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-xl">
            <div class="p-6 bg-white">
                @if(isset($milestones) && $milestones->count() > 0)
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                        <div class="mb-4 sm:mb-0">
                            <h2 class="text-lg font-medium text-gray-700">All Milestones</h2>
                            <p class="text-sm text-gray-500">{{ $milestones->total() }} total milestones</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="relative">
                                <input type="text" placeholder="Search milestones..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                <div class="absolute left-3 top-2.5">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <select class="border border-gray-300 rounded-lg py-2 px-4 focus:ring-primary focus:border-primary text-sm">
                                <option value="all">All Status</option>
                                <option value="Upcoming">Upcoming</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                                <option value="Delayed">Delayed</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg overflow-hidden">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Progress</th>
                                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Featured</th>
                                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created By</th>
                                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($milestones as $milestone)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="py-4 px-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $milestone->title }}</div>
                                            @if($milestone->description)
                                                <div class="text-xs text-gray-500 mt-1 truncate max-w-xs">{{ Str::limit($milestone->description, 60) }}</div>
                                            @endif
                                        </td>
                                        <td class="py-4 px-4">
                                            <div class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($milestone->date)->format('M d, Y') }}</div>
                                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($milestone->date)->diffForHumans() }}</div>
                                        </td>
                                        <td class="py-4 px-4">
                                            @php
                                                $statusColor = [
                                                    'Upcoming' => 'blue',
                                                    'In Progress' => 'yellow',
                                                    'Completed' => 'green',
                                                    'Delayed' => 'red'
                                                ][$milestone->status] ?? 'gray';
                                                
                                                $statusIcon = [
                                                    'Upcoming' => 'calendar',
                                                    'In Progress' => 'clock',
                                                    'Completed' => 'check-circle',
                                                    'Delayed' => 'exclamation-circle'
                                                ][$milestone->status] ?? 'circle';
                                            @endphp
                                            <span class="px-3 py-1 inline-flex items-center text-xs font-medium rounded-full bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    @if($statusIcon == 'calendar')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    @elseif($statusIcon == 'clock')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    @elseif($statusIcon == 'check-circle')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    @elseif($statusIcon == 'exclamation-circle')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                    @else
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    @endif
                                                </svg>
                                                {{ $milestone->status }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                @php
                                                    $progressColor = [
                                                        'Upcoming' => 'blue',
                                                        'In Progress' => 'yellow',
                                                        'Completed' => 'green',
                                                        'Delayed' => 'red'
                                                    ][$milestone->status] ?? 'gray';
                                                @endphp
                                                <div class="bg-{{ $progressColor }}-500 h-2 rounded-full" style="width: {{ $milestone->completion_percentage }}%"></div>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-1 text-right">{{ $milestone->completion_percentage }}%</div>
                                        </td>
                                        <td class="py-4 px-4">
                                            <form action="{{ route('admin.milestones.toggle-featured', $milestone) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-{{ $milestone->featured ? 'yellow' : 'gray' }}-500 hover:text-{{ $milestone->featured ? 'yellow' : 'gray' }}-700 transition-colors duration-200">
                                                    <svg class="w-5 h-5" fill="{{ $milestone->featured ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $milestone->featured ? '0' : '1.5' }}" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-4 px-4">
                                            <div class="text-sm text-gray-700 flex items-center">
                                                <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs font-medium text-gray-600 mr-2">
                                                    {{ substr($milestone->creator->name ?? 'U', 0, 1) }}
                                                </div>
                                                <span>{{ $milestone->creator->name ?? 'Unknown' }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4 text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.milestones.show', $milestone) }}" class="text-blue-600 hover:text-blue-900 bg-blue-100 hover:bg-blue-200 p-2 rounded-full transition-colors duration-200" title="View">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.milestones.edit', $milestone) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 hover:bg-indigo-200 p-2 rounded-full transition-colors duration-200" title="Edit">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('admin.milestones.destroy', $milestone) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 p-2 rounded-full transition-colors duration-200" onclick="return confirm('Are you sure you want to delete this milestone?')" title="Delete">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $milestones->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="bg-gray-100 inline-flex p-6 rounded-full mb-6">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">No Milestones Yet</h3>
                        <p class="text-gray-500 mb-8 max-w-md mx-auto">Get started by creating your first project milestone to track your progress and keep your team aligned.</p>
                        <a href="{{ route('admin.milestones.create') }}" class="inline-flex items-center justify-center bg-primary hover:bg-primary-dark text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Your First Milestone
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
