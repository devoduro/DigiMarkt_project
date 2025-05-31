@extends('layouts.admin')

@section('title', 'Create Deliverable')

@section('content')
<div class="container px-6 mx-auto grid">
    <div class="flex justify-between items-center my-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Create Deliverable
        </h2>
        <a href="{{ route('admin.deliverables.index') }}" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Deliverables
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">        
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
            <h3 class="text-lg font-medium text-gray-900">Deliverable Information</h3>
            <p class="mt-1 text-sm text-gray-500">Fill in the details below to create a new deliverable. Required fields are marked with an asterisk (*).</p>
        </div>
        
        <div class="p-6">
        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.deliverables.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                    </div>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="pl-10 block w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter deliverable title" required>
                </div>
                @error('title')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                <div class="mt-1">
                    <textarea name="description" id="description" rows="4" class="block w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter a detailed description of this deliverable">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <div class="flex space-x-3">
                            <div class="flex-grow">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                    </div>
                                    <select name="category" id="category" class="pl-10 block w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                        <option value="">Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                        @endforeach
                                        <option value="new" {{ old('category') == 'new' ? 'selected' : '' }}>+ Add new category</option>
                                    </select>
                                </div>
                                @error('category')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div id="new-category-group" class="flex-grow hidden">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="new_category" id="new_category" placeholder="Enter new category" class="pl-10 block w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                @error('new_category')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Select an existing category or create a new one</p>
                    </div>
                </div>

                <div>
                    <label for="access_level" class="block text-sm font-medium text-gray-700">Access Level <span class="text-red-500">*</span></label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <select name="access_level" id="access_level" class="pl-10 block w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="public" {{ old('access_level') == 'public' ? 'selected' : '' }}>Public</option>
                            <option value="registered" {{ old('access_level') == 'registered' ? 'selected' : '' }}>Registered Users</option>
                            <option value="admin" {{ old('access_level') == 'admin' ? 'selected' : '' }}>Admin Only</option>
                        </select>
                        @error('access_level')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Controls who can access this deliverable</p>
                </div>
            </div>

            <div class="mb-6">
                <label for="file" class="block text-sm font-medium text-gray-700">Upload File <span class="text-red-500">*</span></label>
                <div class="mt-1">
                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition duration-150" id="file-drop-area">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                    <span>Upload a file</span>
                                    <input id="file" name="file" type="file" class="hidden" required onchange="updateFileLabel(this)">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500" id="file-name">
                                PDF, DOC, XLS, ZIP up to 10MB
                            </p>
                        </div>
                    </div>
                </div>
                @error('file')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="border-t border-gray-200 mt-8 pt-6">
                <div class="flex items-center mb-6">
                    <div class="flex items-center h-5">
                        <input type="checkbox" name="is_published" id="is_published" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_published', false) ? 'checked' : '' }}>
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="is_published" class="font-medium text-gray-700">Publish immediately</label>
                        <p class="text-gray-500">When checked, this deliverable will be immediately available to users based on the access level.</p>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('admin.deliverables.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <div class="flex items-center">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Deliverable
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Toggle new category input visibility
    function toggleNewCategory(value) {
        const newCategoryGroup = document.getElementById('new-category-group');
        const newCategoryInput = document.getElementById('new_category');
        
        if (value === 'new') {
            newCategoryGroup.classList.remove('hidden');
            newCategoryInput.setAttribute('required', 'required');
            newCategoryInput.focus();
        } else {
            newCategoryGroup.classList.add('hidden');
            newCategoryInput.removeAttribute('required');
        }
    }
    
    // Update file label when a file is selected
    function updateFileLabel(input) {
        const fileNameElement = document.getElementById('file-name');
        if (input.files && input.files[0] && fileNameElement) {
            const fileName = input.files[0].name;
            const fileSize = Math.round(input.files[0].size / 1024); // KB
            fileNameElement.textContent = `${fileName} (${fileSize} KB)`;
            fileNameElement.classList.add('text-blue-600', 'font-medium');
        } else if (fileNameElement) {
            fileNameElement.textContent = 'PDF, DOC, XLS, ZIP up to 10MB';
            fileNameElement.classList.remove('text-blue-600', 'font-medium');
        }
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category');
        if (categorySelect) {
            categorySelect.addEventListener('change', function() {
                toggleNewCategory(this.value);
            });
            toggleNewCategory(categorySelect.value);
        }

        // Initialize drag and drop functionality
        const dropArea = document.getElementById('file-drop-area');
        const fileInput = document.getElementById('file');

        if (dropArea && fileInput) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                dropArea.classList.add('border-blue-500', 'bg-blue-50');
                dropArea.classList.remove('border-gray-300');
            }

            function unhighlight() {
                dropArea.classList.remove('border-blue-500', 'bg-blue-50');
                dropArea.classList.add('border-gray-300');
            }

            dropArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                fileInput.files = files;
                updateFileLabel(fileInput);
            }
        }
    });
</script>
@endsection
