@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Work Packages</h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Our project is organized into five key work packages, each with specific objectives and deliverables.
            </p>
        </div>

        <!-- Work Packages Grid -->
        <div class="space-y-8">
            @forelse($workPackages as $workPackage)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-300">
                    <!-- Work Package Header -->
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ $workPackage->title }}</h2>
                            <p class="text-gray-600 text-lg leading-relaxed">{{ $workPackage->description }}</p>
                        </div>
                        <div class="mt-4 lg:mt-0 lg:ml-8 flex flex-col items-start lg:items-end space-y-2">
                            @if($workPackage->status == 'Completed')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    Completed
                                </span>
                            @elseif($workPackage->status == 'In Progress')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    In Progress
                                </span>
                            @elseif($workPackage->status == 'Not Started')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    Not Started
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    {{ $workPackage->status }}
                                </span>
                            @endif
                            <div class="text-sm text-gray-600">
                                <span class="font-medium">Completion: {{ $workPackage->completion_percentage ?? 0 }}%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tasks Section -->
                    @php
                        // Extract tasks from description
                        $description = $workPackage->description;
                        $tasks = [];
                        if (strpos($description, 'Tasks include:') !== false) {
                            $tasksPart = explode('Tasks include:', $description)[1] ?? '';
                            $tasksPart = trim($tasksPart);
                            if ($tasksPart) {
                                $taskItems = explode(',', $tasksPart);
                                foreach ($taskItems as $task) {
                                    $task = trim($task);
                                    if ($task) {
                                        $tasks[] = $task;
                                    }
                                }
                            }
                        }
                    @endphp

                    @if(count($tasks) > 0)
                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Tasks</h3>
                            <ul class="space-y-3">
                                @foreach($tasks as $task)
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2 mr-3"></div>
                                        <span class="text-gray-700">{{ $task }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Progress Bar -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Progress</span>
                            <span class="text-sm text-gray-600">{{ $workPackage->completion_percentage ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" 
                                 style="width: {{ $workPackage->completion_percentage ?? 0 }}%"></div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="max-w-md mx-auto">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">No work packages available</h3>
                        <p class="mt-2 text-gray-500">Work packages will be displayed here once they are published.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Call to Action Section -->
        <div class="mt-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg shadow-lg">
            <div class="px-8 py-12 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Join Our Digital Marketing Journey</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Be part of our initiative to transform Technical and Vocational Education and Training through digital marketing skills and knowledge.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        Register Now
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-transparent text-white font-semibold rounded-lg border-2 border-white hover:bg-white hover:text-blue-600 transition-colors duration-200">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
