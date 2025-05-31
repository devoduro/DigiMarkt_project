@extends('layouts.app')

@section('title', 'Deliverables & Milestones')

@section('content')
<div class="bg-gradient-to-r from-primary-dark to-primary py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Deliverables & Milestones</h1>
            <p class="text-xl text-white opacity-90">
                Access secure digital marketing resources and project deliverables.
            </p>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <!-- Search and Filter -->
        <div class="max-w-5xl mx-auto mb-10">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <form action="{{ route('deliverables') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <div class="relative">
                            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search by title or description" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select name="category" id="category" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-3 flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-primary text-white font-semibold rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            Filter Results
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Documents Grid -->
        <div class="max-w-7xl mx-auto">
            @if($documents->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($documents as $document)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="px-3 py-1 bg-primary-light bg-opacity-20 text-primary-dark rounded-full text-sm">
                                        {{ $document->category }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        {{ $document->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $document->title }}</h3>
                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit($document->description, 100) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('deliverables.show', $document->id) }}" class="text-primary-dark hover:text-primary font-medium inline-flex items-center">
                                        View Details
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <div class="text-sm text-gray-500">
                                        {{ $document->downloads->count() }} {{ Str::plural('download', $document->downloads->count()) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $documents->withQueryString()->links() }}
                </div>
            @else
                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No documents found</h3>
                    <p class="text-gray-500">
                        @if(request('search') || request('category'))
                            No documents match your search criteria. Try adjusting your filters.
                        @else
                            There are no documents available at the moment.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
