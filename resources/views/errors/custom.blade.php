@extends('layouts.admin')

@section('content')
<div class="bg-white shadow-sm rounded-lg p-6 mb-6">
    <div class="flex flex-col">
        <h1 class="text-3xl font-bold text-red-600">Error</h1>
        <p class="mt-4 text-gray-800">{{ $message }}</p>
        
        @if(config('app.debug'))
        <div class="mt-6 p-4 bg-gray-100 rounded-lg overflow-auto">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Debug Information</h2>
            <pre class="text-sm text-gray-700 whitespace-pre-wrap">{{ $trace }}</pre>
        </div>
        @endif
        
        <div class="mt-6">
            <a href="{{ url()->previous() }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Go Back
            </a>
        </div>
    </div>
</div>
@endsection
