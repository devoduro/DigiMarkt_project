@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <div class="flex space-x-2">
            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full flex items-center">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                System Status: Online
            </span>
            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Last Updated: {{ now()->format('M d, H:i') }}</span>
        </div>
    </div>
    
    <!-- Project Info Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 mb-8">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Project Information</h2>
                <span class="px-3 py-1 rounded-full text-sm font-medium {{ $projectStats['status'] === 'In Progress' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                    {{ $projectStats['status'] }}
                </span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Project Name</h3>
                    <p class="text-lg font-semibold text-gray-800">{{ $projectStats['name'] }}</p>
                    <h3 class="text-sm font-medium text-gray-500 mt-3">Project Number</h3>
                    <p class="text-lg font-semibold text-gray-800">{{ $projectStats['number'] }}</p>
                </div>
                
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Timeline</h3>
                    <p class="text-base text-gray-800">
                        <span class="font-medium">Start:</span> {{ \Carbon\Carbon::parse($projectStats['start_date'])->format('M d, Y') }}<br>
                        <span class="font-medium">End:</span> {{ \Carbon\Carbon::parse($projectStats['end_date'])->format('M d, Y') }}
                    </p>
                </div>
                
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Completion</h3>
                    <div class="mt-2">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary h-2.5 rounded-full" style="width: {{ $projectStats['completion'] }}%"></div>
                        </div>
                        <p class="mt-1 text-sm font-medium text-gray-700">{{ $projectStats['completion'] }}% Complete</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Metrics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Users Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Users</h2>
                    <div class="p-2 rounded-lg bg-indigo-50">
                        <svg class="h-6 w-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</p>
                </div>
                <div class="mt-1 text-xs text-gray-500">Registered accounts</div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <a href="{{ route('admin.users.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium flex items-center justify-between">
                    Manage users
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Documents Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Documents</h2>
                    <div class="p-2 rounded-lg bg-blue-50">
                        <svg class="h-6 w-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalDocuments }}</p>
                </div>
                <div class="mt-1 text-xs text-gray-500">Total documents</div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <a href="{{ route('admin.deliverables.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center justify-between">
                    Manage documents
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Downloads Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Downloads</h2>
                    <div class="p-2 rounded-lg bg-green-50">
                        <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalDownloads }}</p>
                </div>
                <div class="mt-1 text-xs text-gray-500">Total downloads</div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <a href="{{ route('admin.dashboard') }}" class="text-green-600 hover:text-green-800 text-sm font-medium flex items-center justify-between">
                    View download stats
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- Visitors Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Visitors</h2>
                    <div class="p-2 rounded-lg bg-purple-50">
                        <svg class="h-6 w-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalVisitors }}</p>
                </div>
                <div class="mt-1 text-xs text-gray-500">Total unique visitors</div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="flex justify-between text-sm">
                    <span class="text-purple-600">Today: {{ $todayVisitors }}</span>
                    <span class="text-purple-600">This week: {{ $weekVisitors }}</span>
                    <span class="text-purple-600">This month: {{ $monthVisitors }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Downloads Chart -->
        <div class="bg-white rounded-xl shadow-md p-6 col-span-2">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Download Trends</h2>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Weekly</button>
                    <button class="px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Monthly</button>
                    <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Yearly</button>
                </div>
            </div>
            <div class="h-64 w-full">
                <!-- Chart Placeholder - In production, use a real chart library -->
                <div class="relative h-full w-full bg-gray-50 rounded-lg overflow-hidden">
                    <div class="absolute bottom-0 left-0 right-0 flex justify-between items-end h-full p-4">
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 30%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 45%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 25%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 50%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 60%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 40%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 70%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 80%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 65%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 75%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 90%"></div>
                        <div class="w-1/12 bg-blue-500 rounded-t-md" style="height: 85%"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 flex justify-between text-xs text-gray-500 px-4 pb-1">
                        <div>Jan</div>
                        <div>Feb</div>
                        <div>Mar</div>
                        <div>Apr</div>
                        <div>May</div>
                        <div>Jun</div>
                        <div>Jul</div>
                        <div>Aug</div>
                        <div>Sep</div>
                        <div>Oct</div>
                        <div>Nov</div>
                        <div>Dec</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Distribution -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Category Distribution</h2>
            <div class="h-64 flex items-center justify-center">
                <!-- Donut Chart Placeholder - In production, use a real chart library -->
                <div class="relative h-48 w-48 rounded-full border-8 border-transparent" style="background: conic-gradient(#4f46e5 0% 25%, #3b82f6 25% 45%, #10b981 45% 65%, #f59e0b 65% 85%, #ef4444 85% 100%)">
                    <div class="absolute inset-0 rounded-full bg-white m-3 flex items-center justify-center">
                        <span class="text-lg font-bold text-gray-700">{{ $totalDocuments ?? 18 }}</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 mt-4">
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-indigo-600 rounded-full mr-2"></span>
                    <span class="text-xs text-gray-600">Marketing (25%)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                    <span class="text-xs text-gray-600">SEO (20%)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                    <span class="text-xs text-gray-600">Social Media (20%)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></span>
                    <span class="text-xs text-gray-600">Content (20%)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                    <span class="text-xs text-gray-600">Other (15%)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Milestones & Deliverables Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Milestones Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Project Milestones</h3>
                <div class="flex items-center">
                    <span class="text-sm text-gray-600 mr-2">{{ $completedMilestones }}/{{ $totalMilestones }} Completed</span>
                    <div class="w-24 bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary h-2.5 rounded-full" style="width: {{ $totalMilestones > 0 ? ($completedMilestones / $totalMilestones) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
            <div class="divide-y divide-gray-100">
                @if(isset($upcomingMilestones) && $upcomingMilestones->count() > 0)
                    @foreach($upcomingMilestones as $milestone)
                        <div class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-md bg-blue-100 flex items-center justify-center text-blue-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 flex-grow">
                                    <div class="text-sm font-medium text-gray-900">{{ $milestone->title }}</div>
                                    <div class="text-xs text-gray-500">Date: {{ \Carbon\Carbon::parse($milestone->date)->format('M d, Y') }}</div>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full {{ $milestone->status === 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $milestone->status }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="px-6 py-4 text-center text-gray-500">No upcoming milestones</div>
                @endif
            </div>
            <div class="bg-gray-50 px-6 py-3">
                <a href="{{ route('admin.milestones.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center justify-between">
                    View all milestones
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Deliverables Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Deliverables</h3>
                <div class="flex items-center">
                    <span class="text-sm text-gray-600 mr-2">{{ $completedDeliverables }}/{{ $totalDeliverables }} Completed</span>
                    <div class="w-24 bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary h-2.5 rounded-full" style="width: {{ $totalDeliverables > 0 ? ($completedDeliverables / $totalDeliverables) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
            <div class="divide-y divide-gray-100 max-h-80 overflow-y-auto">
                @if(isset($recentDeliverables) && count($recentDeliverables) > 0)
                    @foreach($recentDeliverables as $deliverable)
                        <div class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-md bg-green-100 flex items-center justify-center text-green-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 flex-grow">
                                    <div class="text-sm font-medium text-gray-900">{{ $deliverable->title }}</div>
                                    <div class="text-xs text-gray-500">Created: {{ \Carbon\Carbon::parse($deliverable->created_at)->format('M d, Y') }}</div>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full {{ $deliverable->completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $deliverable->completed ? 'Completed' : 'In Progress' }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Sample data when no deliverables are available -->
                    <div class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md bg-green-100 flex items-center justify-center text-green-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="text-sm font-medium text-gray-900">Market Analysis Report</div>
                                <div class="text-xs text-gray-500">Due: Aug 15, 2025</div>
                            </div>
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md bg-green-100 flex items-center justify-center text-green-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="text-sm font-medium text-gray-900">Campaign Strategy Document</div>
                                <div class="text-xs text-gray-500">Due: Sep 1, 2025</div>
                            </div>
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="bg-gray-50 px-6 py-3">
                <a href="{{ route('admin.deliverables.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium flex items-center justify-between">
                    View all deliverables
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Announcements Section -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Announcements</h3>
            <a href="#" class="text-sm font-medium text-primary hover:text-primary-dark">Manage Announcements</a>
        </div>
        <div class="divide-y divide-gray-100">
            @if(isset($announcements) && $announcements->count() > 0)
                @foreach($announcements as $announcement)
                    <div class="px-6 py-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="flex justify-between">
                                    <h4 class="text-base font-medium text-gray-900">{{ $announcement->title }}</h4>
                                    <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($announcement->publish_date)->format('M d, Y') }}</span>
                                </div>
                                <div class="mt-1 text-sm text-gray-600">
                                    {{ Str::limit($announcement->content, 150) }}
                                </div>
                                @if(strlen($announcement->content) > 150)
                                    <a href="#" class="text-xs text-primary hover:text-primary-dark mt-1 inline-block">Read more</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Sample data when no announcements are available -->
                <div class="px-6 py-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                            </svg>
                        </div>
                        <div class="ml-4 flex-grow">
                            <div class="flex justify-between">
                                <h4 class="text-base font-medium text-gray-900">New Marketing Campaign Launch</h4>
                                <span class="text-xs text-gray-500">Jul 1, 2025</span>
                            </div>
                            <div class="mt-1 text-sm text-gray-600">
                                We're excited to announce the launch of our new digital marketing campaign next month. All team members should prepare their materials by July 15th.
                            </div>
                            <a href="#" class="text-xs text-primary hover:text-primary-dark mt-1 inline-block">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                            </svg>
                        </div>
                        <div class="ml-4 flex-grow">
                            <div class="flex justify-between">
                                <h4 class="text-base font-medium text-gray-900">Website Maintenance Notice</h4>
                                <span class="text-xs text-gray-500">Jun 28, 2025</span>
                            </div>
                            <div class="mt-1 text-sm text-gray-600">
                                The website will undergo scheduled maintenance on July 5th from 2AM to 5AM EST. Please save any work in progress before this time.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Visitor Statistics Chart -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800">Visitor Statistics</h3>
            </div>
            <div class="p-6">
                <canvas id="visitorChart" height="300"></canvas>
            </div>
        </div>

        <!-- Download Statistics Chart -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800">Download Statistics</h3>
            </div>
            <div class="p-6">
                <canvas id="downloadChart" height="300"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Users -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">Recent Users</h2>
                <a href="{{ route('admin.users.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">View All</a>
            </div>
            <div class="divide-y divide-gray-100">
                @if(isset($recentUsers) && $recentUsers->count() > 0)
                    @foreach($recentUsers as $user)
                    <div class="px-6 py-4 flex items-center">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">
                            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                        </div>
                        <div class="ml-4 flex-grow">
                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                        </div>
                        <div class="text-xs text-gray-500">{{ $user->created_at->format('M d, Y') }}</div>
                    </div>
                    @endforeach
                @else
                    <!-- Sample data when no users are available -->
                    <div class="px-6 py-4 flex items-center">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">J</div>
                        <div class="ml-4 flex-grow">
                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                            <div class="text-sm text-gray-500">john@example.com</div>
                        </div>
                        <div class="text-xs text-gray-500">May 28, 2025</div>
                    </div>
                    <div class="px-6 py-4 flex items-center">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">J</div>
                        <div class="ml-4 flex-grow">
                            <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                            <div class="text-sm text-gray-500">jane@example.com</div>
                        </div>
                        <div class="text-xs text-gray-500">May 27, 2025</div>
                    </div>
                    <div class="px-6 py-4 flex items-center">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">R</div>
                        <div class="ml-4 flex-grow">
                            <div class="text-sm font-medium text-gray-900">Robert Johnson</div>
                            <div class="text-sm text-gray-500">robert@example.com</div>
                        </div>
                        <div class="text-xs text-gray-500">May 26, 2025</div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Downloads -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">Recent Downloads</h2>
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">View All</a>
            </div>
            <div class="divide-y divide-gray-100">
                @if(isset($recentDownloads) && $recentDownloads->count() > 0)
                    @foreach($recentDownloads as $download)
                    <div class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="text-sm font-medium text-gray-900">{{ $download->document->title ?? 'Document Title' }}</div>
                                <div class="text-xs text-gray-500">{{ $download->user->email ?? 'user@example.com' }}</div>
                            </div>
                            <div class="text-xs text-gray-500">{{ $download->created_at->format('M d, Y') ?? 'May 30, 2025' }}</div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Sample data when no downloads are available -->
                    <div class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="text-sm font-medium text-gray-900">Digital Marketing Strategy</div>
                                <div class="text-xs text-gray-500">john@example.com</div>
                            </div>
                            <div class="text-xs text-gray-500">May 30, 2025</div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="text-sm font-medium text-gray-900">SEO Implementation Guide</div>
                                <div class="text-xs text-gray-500">jane@example.com</div>
                            </div>
                            <div class="text-xs text-gray-500">May 29, 2025</div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="text-sm font-medium text-gray-900">Social Media Campaign Plan</div>
                                <div class="text-xs text-gray-500">robert@example.com</div>
                            </div>
                            <div class="text-xs text-gray-500">May 28, 2025</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Visitor Statistics Chart
        const visitorCtx = document.getElementById('visitorChart').getContext('2d');
        const visitorChart = new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Monthly Visitors',
                    data: [{{ implode(', ', $monthlyVisitorData) }}],
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(200, 200, 200, 0.15)',
                        },
                        ticks: {
                            font: {
                                size: 12,
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        // Download Statistics Chart
        const downloadCtx = document.getElementById('downloadChart').getContext('2d');
        const downloadChart = new Chart(downloadCtx, {
            type: 'bar',
            data: {
                labels: [{{ implode(', ', array_map(function($key) { return "'$key'"; }, array_keys($downloadCategories))) }}],
                datasets: [{
                    label: 'Downloads by Category',
                    data: [{{ implode(', ', array_values($downloadCategories)) }}],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.7)',
                        'rgba(16, 185, 129, 0.7)',
                        'rgba(245, 158, 11, 0.7)',
                        'rgba(139, 92, 246, 0.7)',
                        'rgba(239, 68, 68, 0.7)'
                    ],
                    borderWidth: 0,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(200, 200, 200, 0.15)',
                        },
                        ticks: {
                            font: {
                                size: 12,
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
