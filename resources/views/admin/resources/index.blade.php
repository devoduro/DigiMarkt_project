@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-medium text-gray-700">Digital Marketing Resources</h3>
        <a href="{{ route('admin.resources.create') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i> Add New Resource
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
                @if(isset($resources) && $resources->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Access Level</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Published</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Downloads</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resources as $resource)
                                    <tr>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="flex items-center">
                                                @if($resource->thumbnail_path)
                                                    <img class="h-10 w-10 rounded-full object-cover mr-3" src="{{ asset('storage/' . $resource->thumbnail_path) }}" alt="Thumbnail">
                                                @else
                                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                                        <i class="fas fa-file-alt text-gray-400"></i>
                                                    </div>
                                                @endif
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{ $resource->title }}</div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $resource->category }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            @php
                                                $accessColor = [
                                                    'public' => 'green',
                                                    'registered' => 'blue',
                                                    'admin' => 'red'
                                                ][$resource->access_level] ?? 'gray';
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $accessColor }}-100 text-{{ $accessColor }}-800">
                                                {{ ucfirst($resource->access_level) }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <form action="{{ route('admin.resources.toggle-featured', $resource) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-{{ $resource->is_featured ? 'green' : 'gray' }}-500 hover:text-{{ $resource->is_featured ? 'green' : 'gray' }}-700">
                                                    <i class="fas fa-{{ $resource->is_featured ? 'star' : 'star text-gray-400' }}"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <form action="{{ route('admin.resources.toggle-published', $resource) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-{{ $resource->is_published ? 'green' : 'red' }}-500 hover:text-{{ $resource->is_published ? 'green' : 'red' }}-700">
                                                    <i class="fas fa-{{ $resource->is_published ? 'check-circle' : 'times-circle' }}"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $resource->download_count }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $resource->creator->name ?? 'Unknown' }}</div>
                                        </td>
                                        <td class="py-4 px-4 border-b border-gray-200 text-sm leading-5 font-medium">
                                            <a href="{{ route('admin.resources.show', $resource) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.resources.edit', $resource) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.resources.destroy', $resource) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this resource?')">
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
                        {{ $resources->links() }}
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500 text-lg">No resources found.</p>
                        <a href="{{ route('admin.resources.create') }}" class="mt-4 inline-block bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-plus mr-2"></i> Add Your First Resource
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
