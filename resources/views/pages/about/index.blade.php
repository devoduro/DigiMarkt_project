@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="bg-gradient-to-r from-primary-dark to-primary py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">About Our Digital Marketing Platform</h1>
            <p class="text-xl text-white opacity-90">
                Learn about our mission, team, and achievements in digital marketing
            </p>
        </div>
    </div>
</div>

<div class="bg-white py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="prose max-w-none">
                <h2>Our Mission</h2>
                <p>
                    {{ $mission }}
                </p>
                
                <h2 class="mt-8">Our Vision</h2>
                <p>
                    {{ $vision }}
                </p>
                
                <h2 class="mt-8">Our Approach</h2>
                <p>
                    {{ $approach }}
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Team</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($team as $member)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        @if($member['image'])
                            <img src="{{ asset('storage/' . $member['image']) }}" alt="{{ $member['name'] }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $member['name'] }}</h3>
                            <p class="text-primary-dark font-medium mb-3">{{ $member['position'] }}</p>
                            <p class="text-gray-600 mb-4">{{ $member['bio'] }}</p>
                            
                            @if(!empty($member['social']))
                                <div class="flex space-x-3">
                                    @if(isset($member['social']['linkedin']))
                                        <a href="{{ $member['social']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-primary">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                            </svg>
                                        </a>
                                    @endif
                                    
                                    @if(isset($member['social']['twitter']))
                                        <a href="{{ $member['social']['twitter'] }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-primary">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                            </svg>
                                        </a>
                                    @endif
                                    
                                    @if(isset($member['social']['github']))
                                        <a href="{{ $member['social']['github'] }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-primary">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Milestones Section -->
<div class="bg-white py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Milestones</h2>
            
            <div class="relative border-l-4 border-primary ml-6">
                @foreach($milestones as $milestone)
                    <div class="mb-10 ml-6">
                        <div class="absolute w-6 h-6 bg-primary rounded-full -left-9 border-4 border-white"></div>
                        <div class="flex items-center mb-1">
                            <div class="text-lg font-semibold text-gray-900">{{ $milestone['title'] }}</div>
                            <div class="ml-2 px-2 py-1 text-xs font-semibold text-primary-dark bg-primary-light bg-opacity-20 rounded-full">
                                {{ $milestone['date'] }}
                            </div>
                        </div>
                        <div class="mb-4 text-base font-normal text-gray-600">
                            {{ $milestone['description'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Impact</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($stats as $stat)
                    <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                        <div class="text-4xl font-bold text-primary mb-2">{{ $stat['value'] }}</div>
                        <div class="text-gray-600">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
