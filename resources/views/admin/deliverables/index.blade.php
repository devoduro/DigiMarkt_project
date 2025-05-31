@extends('layouts.admin')

@section('title', 'Manage Deliverables')

@section('content')
<div class="container px-6 mx-auto grid">
    <div class="flex justify-between items-center my-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Manage Deliverables
        </h2>
        <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Back to Dashboard
        </a>
    </div>

    <!-- Success message -->
    @if (session('success'))
        <div class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg flex items-center" role="alert">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Actions and filters -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
        <div class="p-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div>
                    <a href="{{ route('admin.deliverables.create') }}" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add New Deliverable
                    </a>
                </div>
                <div class="text-sm text-gray-500">
                    Total: <span class="font-semibold text-gray-700">{{ $deliverables->total() }}</span> deliverables
                </div>
            </div>

            <div class="mt-6 border-t border-gray-200 pt-4">
                <form action="{{ route('admin.deliverables.index') }}" method="GET">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="col-span-1 md:col-span-2">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="text" name="search" id="search" value="{{ request('search') }}" class="pl-10 block w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search by title or description...">
                            </div>
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select name="category" id="category" class="block w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="status" class="block w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Status</option>
                                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="unpublished" {{ request('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <a href="{{ route('admin.deliverables.index') }}" class="mr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Reset
                        </a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <div class="flex items-center">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                </svg>
                                Apply Filters
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Deliverables Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Downloads</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($deliverables as $deliverable)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-500">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $deliverable->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($deliverable->description, 60) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $deliverable->category }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($deliverable->is_published)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-gray-400" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
                                        Unpublished
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                    </svg>
                                    <span class="font-medium">{{ $deliverable->downloads->count() }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $deliverable->created_at->format('M d, Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('admin.deliverables.edit', $deliverable->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-100 hover:bg-blue-200 rounded-full p-2 transition-colors duration-200" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </a>
                                    
                                    @if($deliverable->is_published)
                                        <form action="{{ route('admin.deliverables.unpublish', $deliverable->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-yellow-600 hover:text-yellow-900 bg-yellow-100 hover:bg-yellow-200 rounded-full p-2 transition-colors duration-200" title="Unpublish">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.deliverables.publish', $deliverable->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-green-600 hover:text-green-900 bg-green-100 hover:bg-green-200 rounded-full p-2 transition-colors duration-200" title="Publish">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <form action="{{ route('admin.deliverables.destroy', $deliverable->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this deliverable? This action cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 rounded-full p-2 transition-colors duration-200" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">No deliverables found</p>
                                    <p class="text-gray-400 mt-1">Try adjusting your search or filter to find what you're looking for.</p>
                                    <a href="{{ route('admin.deliverables.create') }}" class="mt-4 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Create First Deliverable
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 bg-white">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing <span class="font-medium">{{ $deliverables->firstItem() ?? 0 }}</span> to <span class="font-medium">{{ $deliverables->lastItem() ?? 0 }}</span> of <span class="font-medium">{{ $deliverables->total() }}</span> results
                </div>
                <div class="">
                    {{ $deliverables->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
