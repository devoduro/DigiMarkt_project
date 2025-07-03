@extends('layouts.admin')

@section('title', 'View Announcement')

@section('content')
<div class="container-fluid px-4">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">View Announcement</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                            <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{ route('admin.announcements.index') }}" class="text-blue-600 hover:text-blue-800">Announcements</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="text-gray-500">View</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4 text-white flex justify-between items-center">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM9 12a9 9 0 119-18 9 9 0 01-9 18z" />
                </svg>
                <h2 class="font-semibold text-lg">Announcement Details</h2>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="bg-white text-purple-700 hover:bg-gray-100 py-1 px-3 rounded-md flex items-center text-sm font-medium transition-colors duration-150 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    Edit
                </a>
                <form action="{{ route('admin.announcements.toggle-active', $announcement->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="{{ $announcement->is_active ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-green-500 hover:bg-green-600' }} text-white py-1 px-3 rounded-md flex items-center text-sm font-medium transition-colors duration-150 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            @if($announcement->is_active)
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            @else
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            @endif
                        </svg>
                        {{ $announcement->is_active ? 'Deactivate' : 'Activate' }}
                    </button>
                </form>
                <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" class="inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md flex items-center text-sm font-medium transition-colors duration-150 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" />
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="p-6">
            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-6">
                <div class="col-span-1 md:col-span-3 grid grid-cols-1 md:grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Title</dt>
                    <dd class="mt-1 md:mt-0 md:col-span-2 text-gray-900 font-medium">{{ $announcement->title }}</dd>
                </div>
                
                <div class="col-span-1 md:col-span-3 grid grid-cols-1 md:grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 md:mt-0 md:col-span-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $announcement->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </dd>
                </div>
                
                <div class="col-span-1 md:col-span-3 grid grid-cols-1 md:grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Publish Date</dt>
                    <dd class="mt-1 md:mt-0 md:col-span-2 text-gray-900">{{ $announcement->publish_date->format('F j, Y') }}</dd>
                </div>
                
                <div class="col-span-1 md:col-span-3 grid grid-cols-1 md:grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Expiry Date</dt>
                    <dd class="mt-1 md:mt-0 md:col-span-2 text-gray-900">{{ $announcement->expiry_date ? $announcement->expiry_date->format('F j, Y') : 'No expiry date' }}</dd>
                </div>
                
                <div class="col-span-1 md:col-span-3 grid grid-cols-1 md:grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Priority</dt>
                    <dd class="mt-1 md:mt-0 md:col-span-2 text-gray-900">{{ $announcement->priority }}</dd>
                </div>
                
                <div class="col-span-1 md:col-span-3 grid grid-cols-1 md:grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Created</dt>
                    <dd class="mt-1 md:mt-0 md:col-span-2 text-gray-900">{{ $announcement->created_at->format('F j, Y, g:i a') }}</dd>
                </div>
                
                <div class="col-span-1 md:col-span-3 grid grid-cols-1 md:grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                    <dd class="mt-1 md:mt-0 md:col-span-2 text-gray-900">{{ $announcement->updated_at->format('F j, Y, g:i a') }}</dd>
                </div>
                
                <div class="col-span-1 md:col-span-3 grid grid-cols-1 md:grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Content</dt>
                    <dd class="mt-1 md:mt-0 md:col-span-2">
                        <div class="p-4 bg-gray-50 rounded-md border border-gray-200 whitespace-pre-wrap">
                            {!! nl2br(e($announcement->content)) !!}
                        </div>
                    </dd>
                </div>
            </dl>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            <a href="{{ route('admin.announcements.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to List
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this announcement? This action cannot be undone.')) {
                    this.submit();
                }
            });
        });
    });
</script>
@endpush
@endsection
