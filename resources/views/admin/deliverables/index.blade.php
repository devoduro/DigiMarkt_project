@extends('layouts.admin')

@section('title', 'Manage Deliverables')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
        Manage Deliverables
    </h2>

    <!-- Success message -->
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Actions and filters -->
    <div class="flex flex-col md:flex-row justify-between mb-4 space-y-4 md:space-y-0">
        <div>
            <a href="{{ route('admin.deliverables.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary-dark hover:bg-primary-dark focus:outline-none focus:shadow-outline-primary">
                <i class="fas fa-plus mr-2"></i> Add New Deliverable
            </a>
        </div>
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <form action="{{ route('admin.deliverables.index') }}" method="GET" class="flex flex-wrap items-center space-x-2">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search deliverables..." class="block w-full pr-10 mt-1 text-sm text-black border-gray-300 rounded-md focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <select name="category" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                <select name="status" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="unpublished" {{ request('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                </select>
                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">
                    Filter
                </button>
            </form>
        </div>
    </div>

    <!-- Deliverables Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Downloads</th>
                        <th class="px-4 py-3">Created</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($deliverables as $deliverable)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $deliverable->title }}</p>
                                        <p class="text-xs text-gray-600">{{ Str::limit($deliverable->description, 50) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $deliverable->category }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if($deliverable->is_published)
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                        Published
                                    </span>
                                @else
                                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full">
                                        Unpublished
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $deliverable->downloads->count() }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $deliverable->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.deliverables.edit', $deliverable->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-primary rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </a>
                                    
                                    @if($deliverable->is_published)
                                        <form action="{{ route('admin.deliverables.unpublish', $deliverable->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-yellow-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Unpublish">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.deliverables.publish', $deliverable->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Publish">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <form action="{{ route('admin.deliverables.destroy', $deliverable->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this deliverable?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-sm text-center">
                                No deliverables found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 border-t bg-gray-50">
            {{ $deliverables->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
