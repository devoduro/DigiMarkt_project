@extends('layouts.admin')

@section('content')
    <!-- Page Header -->
    <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">User Management</h1>
                <p class="mt-1 text-sm text-gray-600">Manage system users and their permissions</p>
            </div>
            <div class="mt-4 md:mt-0">
                <button type="button" class="px-5 py-2.5 bg-primary text-white rounded-lg hover:bg-primary-dark transition-all duration-300 transform hover:scale-105 shadow-md flex items-center" 
                        onclick="document.getElementById('addUserModal').classList.remove('hidden')">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New User
                </button>
            </div>
        </div>
    </div>

    <!-- User Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 mr-4">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $users->total() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 mr-4">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Users</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $users->where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 mr-4">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">2FA Enabled</p>
                    <p class="text-2xl font-bold text-gray-900">0</p>
                    <!-- Temporarily hardcoded to debug -->
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 mr-4">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Admin Users</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $users->where('role', 'admin')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <form action="{{ route('admin.users.index') }}" method="GET" class="space-y-4">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between space-y-4 md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/3">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search Users</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input id="search" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150 ease-in-out text-sm" placeholder="Search by name or email" type="search">
                        <kbd class="hidden md:flex absolute inset-y-0 right-0 items-center pr-3 text-xs text-gray-400 pointer-events-none">
                            <span class="px-1.5 py-0.5 border border-gray-300 rounded">⌘</span>
                            <span class="px-1.5 py-0.5 border border-gray-300 rounded ml-1">K</span>
                        </kbd>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full md:w-2/3">
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <div class="relative rounded-md shadow-sm">
                            <select id="role" name="role" class="block w-full py-2.5 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150 ease-in-out text-sm appearance-none">
                                <option value="" {{ request('role') == '' ? 'selected' : '' }}>All Roles</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <div class="relative rounded-md shadow-sm">
                            <select id="status" name="status" class="block w-full py-2.5 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150 ease-in-out text-sm appearance-none">
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>All Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                        <div class="relative rounded-md shadow-sm">
                            <select id="sort" name="sort" class="block w-full py-2.5 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150 ease-in-out text-sm appearance-none">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Filters -->
            <div class="flex flex-wrap gap-2 pt-2">
                <span class="text-sm font-medium text-gray-700 mr-2 self-center">Quick Filters:</span>
                <a href="{{ route('admin.users.index', ['status' => 'active']) }}" 
                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full {{ request('status') == 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors duration-150">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Active Users
                </a>
                <a href="{{ route('admin.users.index', ['role' => 'admin']) }}" 
                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full {{ request('role') == 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors duration-150">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Admins Only
                </a>
                <a href="{{ route('admin.users.index', ['status' => 'inactive']) }}" 
                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full {{ request('status') == 'inactive' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors duration-150">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Inactive Users
                </a>
                <a href="{{ route('admin.users.index', ['sort' => 'newest']) }}" 
                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full {{ request('sort') == 'newest' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors duration-150">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Recently Added
                </a>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Filter Results
                </button>
            </div>
        </form>
    </div>

    <!-- Bulk Actions Bar -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-4 hidden" id="bulkActionsBar">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center">
                <span class="text-sm font-medium text-gray-700 mr-3">
                    <span id="selectedCount">0</span> users selected
                </span>
                <button type="button" id="clearSelection" class="text-sm text-gray-500 hover:text-gray-700">
                    Clear selection
                </button>
            </div>
            <div class="flex flex-wrap gap-2">
                <button type="button" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-150" id="bulkActivate">
                    <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Activate
                </button>
                <button type="button" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-150" id="bulkDeactivate">
                    <svg class="w-4 h-4 mr-1.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Deactivate
                </button>
                <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150" id="bulkDelete">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Delete
                </button>
            </div>
        </div>
    </div>
    
    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="pl-6 pr-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <input type="checkbox" id="selectAll" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded cursor-pointer">
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Login</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-150 ease-in-out user-row" data-user-id="{{ $user->id }}">
                        <td class="pl-6 pr-3 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <input type="checkbox" class="user-checkbox h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded cursor-pointer" data-user-id="{{ $user->id }}" {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 bg-gray-100 rounded-full flex items-center justify-center">
                                    <span class="text-lg font-medium text-gray-600">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($user->role === 'admin')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                    <svg class="w-3 h-3 mr-1 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    Admin
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <svg class="w-3 h-3 mr-1 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    User
                                </span>
                            @endif
                            @if($user->hasTwoFactorEnabled())
                                <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <svg class="w-3 h-3 mr-1 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    2FA
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-3">
                                <button type="button" onclick="document.getElementById('editUserModal-{{ $user->id }}').classList.remove('hidden')" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </button>
                                
                                @if($user->id !== auth()->id())
                                    @if($user->is_active)
                                        <form action="{{ route('admin.users.deactivate', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-red-600 hover:text-red-900 flex items-center" onclick="return confirm('Are you sure you want to deactivate this user?')">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Deactivate
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.users.activate', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-green-600 hover:text-green-900 flex items-center" onclick="return confirm('Are you sure you want to activate this user?')">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Activate
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-1">No users found</h3>
                                <p class="text-gray-500 mb-4 max-w-md text-center">
                                    @if(request('search') || request('role') || request('status'))
                                        No users match your current filters. Try adjusting your search criteria or clearing filters.
                                    @else
                                        There are no users in the system yet. Add your first user to get started.
                                    @endif
                                </p>
                                @if(request('search') || request('role') || request('status'))
                                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-150 ease-in-out">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Clear Filters
                                    </a>
                                @else
                                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-150 ease-in-out" 
                                            onclick="document.getElementById('addUserModal').classList.remove('hidden')">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add First User
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 bg-white border-t border-gray-200">
            {{ $users->withQueryString()->links('pagination::tailwind') }}
        </div>
    </div>
</div>
    <!-- Add User Modal -->
    <div id="addUserModal" class="fixed inset-0 overflow-y-auto hidden z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="document.getElementById('addUserModal').classList.add('hidden')"></div>
            
            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <!-- Modal header -->
                <div class="bg-gray-50 px-4 py-3 border-b border-gray-200 sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Add New User
                            </div>
                        </h3>
                        <button type="button" class="text-gray-400 hover:text-gray-500" onclick="document.getElementById('addUserModal').classList.add('hidden')">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal body -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <form id="addUserForm" action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="name" id="name" class="pl-10 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="John Doe" required>
                                </div>
                            </div>
                            
                            <div class="col-span-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" class="pl-10 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="john@example.com" required>
                                </div>
                            </div>
                            
                            <div class="sm:col-span-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" class="pl-10 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="••••••••" required minlength="8">
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Minimum 8 characters</p>
                            </div>
                            
                            <div class="sm:col-span-1">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="pl-10 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="••••••••" required minlength="8">
                                </div>
                            </div>
                            
                            <div class="sm:col-span-1">
                                <label for="role" class="block text-sm font-medium text-gray-700">Role <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select name="role" id="role" class="focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="sm:col-span-1">
                                <label for="is_active" class="block text-sm font-medium text-gray-700">Status</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select name="is_active" id="is_active" class="focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-span-2">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="send_welcome_email" name="send_welcome_email" type="checkbox" class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="send_welcome_email" class="font-medium text-gray-700">Send welcome email</label>
                                        <p class="text-gray-500">Send an email with login instructions to the new user</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Modal footer -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" form="addUserForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add User
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="document.getElementById('addUserModal').classList.add('hidden')">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal Template - Will be cloned for each user -->
    @foreach($users as $user)
    <div id="editUserModal-{{ $user->id }}" class="fixed inset-0 overflow-y-auto hidden z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="document.getElementById('editUserModal-{{ $user->id }}').classList.add('hidden')"></div>
            
            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <!-- Modal header -->
                <div class="bg-gray-50 px-4 py-3 border-b border-gray-200 sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit User: {{ $user->name }}
                            </div>
                        </h3>
                        <button type="button" class="text-gray-400 hover:text-gray-500" onclick="document.getElementById('editUserModal-{{ $user->id }}').classList.add('hidden')">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal body -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <form id="editUserForm-{{ $user->id }}" action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="col-span-2">
                                <label for="edit_name_{{ $user->id }}" class="block text-sm font-medium text-gray-700">Full Name <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="name" id="edit_name_{{ $user->id }}" value="{{ $user->name }}" class="pl-10 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                            </div>
                            
                            <div class="col-span-2">
                                <label for="edit_email_{{ $user->id }}" class="block text-sm font-medium text-gray-700">Email Address <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="edit_email_{{ $user->id }}" value="{{ $user->email }}" class="pl-10 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                            </div>
                            
                            <div class="col-span-2 border-t border-gray-200 pt-4 mt-2">
                                <div class="flex items-start mb-4">
                                    <div class="flex items-center h-5">
                                        <input id="change_password_{{ $user->id }}" name="change_password" type="checkbox" class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded" onchange="togglePasswordFields({{ $user->id }})">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="change_password_{{ $user->id }}" class="font-medium text-gray-700">Change password</label>
                                        <p class="text-gray-500">Update the user's password</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="password_fields_{{ $user->id }}" class="hidden col-span-2 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <label for="edit_password_{{ $user->id }}" class="block text-sm font-medium text-gray-700">New Password</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                        </div>
                                        <input type="password" name="password" id="edit_password_{{ $user->id }}" class="password-field-{{ $user->id }} pl-10 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="••••••••" minlength="8">
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Minimum 8 characters</p>
                                </div>
                                
                                <div class="sm:col-span-1">
                                    <label for="edit_password_confirmation_{{ $user->id }}" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                        </div>
                                        <input type="password" name="password_confirmation" id="edit_password_confirmation_{{ $user->id }}" class="password-field-{{ $user->id }} pl-10 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="••••••••" minlength="8">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="sm:col-span-1">
                                <label for="edit_role_{{ $user->id }}" class="block text-sm font-medium text-gray-700">Role <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select name="role" id="edit_role_{{ $user->id }}" class="focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="sm:col-span-1">
                                <label for="edit_is_active_{{ $user->id }}" class="block text-sm font-medium text-gray-700">Status</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select name="is_active" id="edit_is_active_{{ $user->id }}" class="focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                            @if($user->hasTwoFactorEnabled())
                            <div class="col-span-2 mt-2">
                                <div class="flex items-start bg-yellow-50 p-3 rounded-md border border-yellow-100">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-yellow-800">Two-Factor Authentication Enabled</h3>
                                        <p class="text-sm text-yellow-700 mt-1">This user has two-factor authentication enabled for their account.</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
                
                <!-- Modal footer -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" form="editUserForm-{{ $user->id }}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Save Changes
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="document.getElementById('editUserModal-{{ $user->id }}').classList.add('hidden')">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- JavaScript for User Modals -->
    <script>
        function togglePasswordFields(userId) {
            const checkbox = document.getElementById('change_password_' + userId);
            const passwordFields = document.getElementById('password_fields_' + userId);
            const inputs = document.querySelectorAll('.password-field-' + userId);
            
            if (checkbox.checked) {
                passwordFields.classList.remove('hidden');
                inputs.forEach(input => {
                    input.setAttribute('required', 'required');
                });
            } else {
                passwordFields.classList.add('hidden');
                inputs.forEach(input => {
                    input.removeAttribute('required');
                    input.value = '';
                });
            }
        }
    </script>
    <script>
        // Add User Modal
        function closeAddUserModal() {
            document.getElementById('addUserModal').classList.add('hidden');
        }

        // Edit User Modal
        function openEditUserModal(userId) {
            document.getElementById('editUserModal-' + userId).classList.remove('hidden');
        }

        function closeEditUserModal(userId) {
            document.getElementById('editUserModal-' + userId).classList.add('hidden');
        }

        // Toggle password fields visibility
        function togglePasswordFields(checkbox, formId) {
            const passwordFields = document.getElementById(formId + '-password-fields');
            if (checkbox.checked) {
                passwordFields.classList.remove('hidden');
                document.querySelectorAll('#' + formId + '-password-fields input').forEach(input => {
                    input.required = true;
                });
            } else {
                passwordFields.classList.add('hidden');
                document.querySelectorAll('#' + formId + '-password-fields input').forEach(input => {
                    input.required = false;
                    input.value = '';
                });
            }
        }
        
        // Bulk Actions Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('selectAll');
            const userCheckboxes = document.querySelectorAll('.user-checkbox');
            const bulkActionsBar = document.getElementById('bulkActionsBar');
            const selectedCountElement = document.getElementById('selectedCount');
            const clearSelectionButton = document.getElementById('clearSelection');
            const bulkActivateButton = document.getElementById('bulkActivate');
            const bulkDeactivateButton = document.getElementById('bulkDeactivate');
            const bulkDeleteButton = document.getElementById('bulkDelete');
            
            // Function to update the bulk actions bar
            function updateBulkActionsBar() {
                const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
                const selectedCount = selectedCheckboxes.length;
                
                if (selectedCount > 0) {
                    bulkActionsBar.classList.remove('hidden');
                    selectedCountElement.textContent = selectedCount;
                } else {
                    bulkActionsBar.classList.add('hidden');
                }
                
                // Update select all checkbox state
                const totalCheckboxes = document.querySelectorAll('.user-checkbox:not([disabled])').length;
                selectAllCheckbox.checked = selectedCount > 0 && selectedCount === totalCheckboxes;
                selectAllCheckbox.indeterminate = selectedCount > 0 && selectedCount < totalCheckboxes;
            }
            
            // Select all checkbox
            selectAllCheckbox.addEventListener('change', function() {
                userCheckboxes.forEach(checkbox => {
                    if (!checkbox.disabled) {
                        checkbox.checked = selectAllCheckbox.checked;
                    }
                });
                updateBulkActionsBar();
            });
            
            // Individual checkboxes
            userCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkActionsBar);
            });
            
            // Clear selection
            clearSelectionButton.addEventListener('click', function() {
                userCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                updateBulkActionsBar();
            });
            
            // Row click to toggle checkbox
            document.querySelectorAll('.user-row').forEach(row => {
                row.addEventListener('click', function(e) {
                    // Don't toggle if clicking on a button, link, or checkbox
                    if (e.target.tagName === 'BUTTON' || e.target.tagName === 'A' || 
                        e.target.tagName === 'INPUT' || e.target.closest('button') || 
                        e.target.closest('a') || e.target.closest('.actions-cell')) {
                        return;
                    }
                    
                    const userId = this.dataset.userId;
                    const checkbox = document.querySelector(`.user-checkbox[data-user-id="${userId}"]`);
                    
                    if (!checkbox.disabled) {
                        checkbox.checked = !checkbox.checked;
                        checkbox.dispatchEvent(new Event('change'));
                    }
                });
            });
            
            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Cmd/Ctrl + K for search focus
                if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                    e.preventDefault();
                    document.getElementById('search').focus();
                }
                
                // Escape to clear selection
                if (e.key === 'Escape' && !bulkActionsBar.classList.contains('hidden')) {
                    clearSelectionButton.click();
                }
            });
            
            // Bulk action buttons
            bulkActivateButton.addEventListener('click', function() {
                if (confirm('Are you sure you want to activate the selected users?')) {
                    const selectedUserIds = Array.from(document.querySelectorAll('.user-checkbox:checked'))
                        .map(checkbox => checkbox.dataset.userId);
                        
                    // Here you would send an AJAX request to activate the users
                    console.log('Activating users:', selectedUserIds);
                    alert('This feature requires backend implementation. Selected IDs: ' + selectedUserIds.join(', '));
                }
            });
            
            bulkDeactivateButton.addEventListener('click', function() {
                if (confirm('Are you sure you want to deactivate the selected users?')) {
                    const selectedUserIds = Array.from(document.querySelectorAll('.user-checkbox:checked'))
                        .map(checkbox => checkbox.dataset.userId);
                        
                    // Here you would send an AJAX request to deactivate the users
                    console.log('Deactivating users:', selectedUserIds);
                    alert('This feature requires backend implementation. Selected IDs: ' + selectedUserIds.join(', '));
                }
            });
            
            bulkDeleteButton.addEventListener('click', function() {
                if (confirm('WARNING: Are you sure you want to delete the selected users? This action cannot be undone.')) {
                    const selectedUserIds = Array.from(document.querySelectorAll('.user-checkbox:checked'))
                        .map(checkbox => checkbox.dataset.userId);
                        
                    // Here you would send an AJAX request to delete the users
                    console.log('Deleting users:', selectedUserIds);
                    alert('This feature requires backend implementation. Selected IDs: ' + selectedUserIds.join(', '));
                }
            });
        });
    </script>
    @endsection
