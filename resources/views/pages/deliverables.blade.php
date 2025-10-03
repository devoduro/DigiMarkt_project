@extends('layouts.app')

@section('title', 'Deliverables and Milestones')

@section('content')
    <!-- Deliverables Header -->
    <section class="bg-gradient-to-r from-primary-dark to-primary py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-bold text-white text-center">Deliverables and Milestones</h1>
        </div>
    </section>

    <!-- Deliverables Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            @guest
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                <strong>Note:</strong> You need to <a href="{{ route('login') }}" class="font-medium underline text-yellow-700 hover:text-yellow-600">log in</a> or <a href="{{ route('register') }}" class="font-medium underline text-yellow-700 hover:text-yellow-600">register</a> to download documents. Viewing is available to all visitors.
                            </p>
                        </div>
                    </div>
                </div>
            @endguest

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($documents as $document)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $document->title }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($document->description, 150) }}
                            </p>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Updated: {{ $document->updated_at->format('F d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a3 3 0 00-3-3H8zm9 7a7 7 0 11-14 0 7 7 0 0114 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ ucfirst($document->file_type) }} • {{ number_format($document->file_size / 1024, 1) }} KB</span>
                            </div>
                            
                            @auth
                                <a href="{{ route('deliverables.download', $document->id) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors"
                                   onclick="console.log('Download clicked for document ID: {{ $document->id }}'); console.log('Download URL: {{ route('deliverables.download', $document->id) }}');"
                                   target="_blank">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    Download  
                                </a>
                            @else
                                <a href="{{ route('login') }}?redirect={{ url()->current() }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    Login to Download
                                </a>
                            @endauth
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No documents found</h3>
                        <p class="mt-1 text-sm text-gray-500">Check back later for new deliverables.</p>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
                {{ $documents->links() }}
            </div>
        </div>
    </section>
@endsection
