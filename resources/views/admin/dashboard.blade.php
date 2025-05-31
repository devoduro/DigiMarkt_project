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

    <!-- Key Metrics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Users Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Users</h2>
                    <div class="p-2 rounded-lg bg-indigo-50">
                        <svg class="h-6 w-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalUsers ?? 25 }}</p>
                    <p class="ml-2 text-sm font-medium text-green-500 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        12%
                    </p>
                </div>
                <div class="mt-1 text-xs text-gray-500">Compared to last month</div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <a href="{{ route('admin.users.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium flex items-center justify-between">
                    View all users
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
                    <p class="text-3xl font-bold text-gray-900">{{ $totalDocuments ?? 18 }}</p>
                    <p class="ml-2 text-sm font-medium text-green-500 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        8%
                    </p>
                </div>
                <div class="mt-1 text-xs text-gray-500">Compared to last month</div>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalDownloads ?? 152 }}</p>
                    <p class="ml-2 text-sm font-medium text-green-500 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        15%
                    </p>
                </div>
                <div class="mt-1 text-xs text-gray-500">Compared to last month</div>
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
        
        <!-- Activity Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Activity</h2>
                    <div class="p-2 rounded-lg bg-purple-50">
                        <svg class="h-6 w-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalDownloads ? round($totalDownloads / 30) : 5 }}</p>
                    <span class="ml-2 text-sm text-gray-600">daily avg</span>
                </div>
                <div class="mt-1 text-xs text-gray-500">Last 30 days</div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <a href="{{ route('admin.dashboard') }}" class="text-purple-600 hover:text-purple-800 text-sm font-medium flex items-center justify-between">
                    View activity
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Resource Metrics Row -->    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Resources Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Resources</h2>
                    <div class="p-2 rounded-lg bg-purple-50">
                        <svg class="h-6 w-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalResources }}</p>
                    <p class="ml-2 text-sm font-medium text-green-500 flex items-center">
                        <span class="px-2 py-0.5 bg-green-100 text-green-800 rounded-full text-xs">
                            {{ $publishedResources }} published
                        </span>
                    </p>
                </div>
                <div class="mt-1 text-xs text-gray-500">{{ $resourceDownloads }} total downloads</div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <a href="{{ route('admin.resources.index') }}" class="text-purple-600 hover:text-purple-800 text-sm font-medium flex items-center justify-between">
                    Manage resources
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- Milestones Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Milestones</h2>
                    <div class="p-2 rounded-lg bg-amber-50">
                        <svg class="h-6 w-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalMilestones }}</p>
                    <div class="ml-2 flex space-x-1">
                        <span class="px-2 py-0.5 bg-green-100 text-green-800 rounded-full text-xs">
                            {{ $completedMilestones }} completed
                        </span>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="flex justify-between text-xs text-gray-500 mb-1">
                        <span>Completion</span>
                        <span>{{ $milestoneCompletionRate }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-amber-500 h-2 rounded-full" style="width: {{ $milestoneCompletionRate }}%"></div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <a href="{{ route('admin.milestones.index') }}" class="text-amber-600 hover:text-amber-800 text-sm font-medium flex items-center justify-between">
                    Manage milestones
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- Project Activities Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Project Activities</h2>
                    <div class="p-2 rounded-lg bg-teal-50">
                        <svg class="h-6 w-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-gray-900">{{ $totalActivities }}</p>
                    <p class="ml-2 text-sm font-medium text-green-500 flex items-center">
                        <span class="px-2 py-0.5 bg-teal-100 text-teal-800 rounded-full text-xs">
                            {{ $featuredActivities }} featured
                        </span>
                    </p>
                </div>
                <div class="mt-1 text-xs text-gray-500">Latest activity: {{ $recentActivities->isNotEmpty() ? \Carbon\Carbon::parse($recentActivities->first()['date'])->format('M d, Y') : 'None' }}</div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <a href="{{ route('project.activities') }}" class="text-teal-600 hover:text-teal-800 text-sm font-medium flex items-center justify-between">
                    View activities
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden col-span-1">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">Recent Activities</h2>
                <a href="{{ route('project.activities') }}" class="text-sm text-teal-600 hover:text-teal-800 font-medium">View All</a>
            </div>
            <div class="divide-y divide-gray-100">
                @if(isset($recentActivities) && $recentActivities->count() > 0)
                    @foreach($recentActivities as $activity)
                    <div class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md overflow-hidden bg-gray-100">
                                @if($activity['image'])
                                    <img src="{{ $activity['image'] }}" alt="{{ $activity['title'] }}" class="h-10 w-10 object-cover">
                                @else
                                    <div class="h-10 w-10 flex items-center justify-center bg-teal-100 text-teal-500">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-900">{{ $activity['title'] }}</h3>
                                <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($activity['date'])->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="px-6 py-4 text-center text-gray-500 text-sm">
                        No recent activities found
                    </div>
                @endif
            </div>
        </div>

        <!-- Resource Categories -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden col-span-1">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">Resource Categories</h2>
                <a href="{{ route('admin.resources.index') }}" class="text-sm text-purple-600 hover:text-purple-800 font-medium">View All</a>
            </div>
            <div class="divide-y divide-gray-100">
                @if(isset($resourcesByCategory) && $resourcesByCategory->count() > 0)
                    @foreach($resourcesByCategory as $category)
                    <div class="px-6 py-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $category->category ?: 'Uncategorized' }}</p>
                                </div>
                            </div>
                            <div class="text-sm font-semibold text-gray-500">
                                {{ $category->count }} resources
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="px-6 py-4 text-center text-gray-500 text-sm">
                        No categories found
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Users -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden col-span-1">
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
    </div>

    <div class="grid grid-cols-1 gap-6 mb-8">
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
