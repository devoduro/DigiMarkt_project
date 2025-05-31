@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Stats Card 1 -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primary-light bg-opacity-20">
                    <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalUsers ?? 25 }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.users') }}" class="text-primary-dark hover:text-primary-light text-sm font-medium">View all users →</a>
            </div>
        </div>

        <!-- Stats Card 2 -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primary-light bg-opacity-20">
                    <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Documents</h2>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalDocuments ?? 18 }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.documents') }}" class="text-primary-dark hover:text-primary-light text-sm font-medium">Manage documents →</a>
            </div>
        </div>

        <!-- Stats Card 3 -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primary-light bg-opacity-20">
                    <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Downloads</h2>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalDownloads ?? 152 }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.downloads') }}" class="text-primary-dark hover:text-primary-light text-sm font-medium">View download stats →</a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Users -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Users</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Sample data, replace with actual data in production -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">john@example.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 28, 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">jane@example.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 27, 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Robert Johnson</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">robert@example.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 26, 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Downloads -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Downloads</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Sample data, replace with actual data in production -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Digital Marketing Strategy</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">john@example.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 30, 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">SEO Implementation Guide</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">jane@example.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 29, 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Social Media Campaign Plan</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">robert@example.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 28, 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
