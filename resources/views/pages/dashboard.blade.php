@extends('layouts.app')

@section('content')
<div class="bg-white py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
        
        <div class="bg-gradient-to-r from-green-500 to-green-700 rounded-lg shadow-lg p-6 mb-8 text-white">
            <h2 class="text-2xl font-bold mb-2">Welcome back, {{ $user->name }}!</h2>
            <p class="text-lg">Here's your Digital Marketing Platform overview.</p>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                <h3 class="text-gray-500 text-sm font-medium">TOTAL USERS</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['totalUsers'] }}</p>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                <h3 class="text-gray-500 text-sm font-medium">TOTAL DOCUMENTS</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['totalDocuments'] }}</p>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                <h3 class="text-gray-500 text-sm font-medium">TOTAL DOWNLOADS</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['totalDownloads'] }}</p>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                <h3 class="text-gray-500 text-sm font-medium">YOUR DOWNLOADS</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['userDownloads'] }}</p>
            </div>
        </div>
        
        <!-- Recent Documents -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Documents</h2>
            
            @if($recentDocuments->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Title</th>
                                <th class="py-3 px-4 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Category</th>
                                <th class="py-3 px-4 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Downloads</th>
                                <th class="py-3 px-4 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($recentDocuments as $document)
                                <tr>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900">{{ $document->title }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-500">{{ $document->category }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-500">{{ $document->download_count }}</td>
                                    <td class="py-4 px-4 text-sm font-medium">
                                        <a href="{{ route('deliverables.show', $document->id) }}" class="text-green-600 hover:text-green-900">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">No recent documents available.</p>
            @endif
        </div>
        
        <!-- Quick Links -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Links</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('profile') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-medium">Your Profile</h3>
                        <p class="text-sm text-gray-500">Update your information</p>
                    </div>
                </a>
                
                <a href="{{ route('deliverables') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-medium">Deliverables</h3>
                        <p class="text-sm text-gray-500">Access marketing resources</p>
                    </div>
                </a>
                
                <a href="{{ route('resources') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-medium">Resources</h3>
                        <p class="text-sm text-gray-500">Browse marketing materials</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
