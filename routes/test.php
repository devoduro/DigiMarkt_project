<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

Route::get('/test-dashboard', function() {
    if (!Auth::check()) {
        return response()->json([
            'authenticated' => false,
            'message' => 'Not logged in'
        ]);
    }
    
    $user = Auth::user();
    $controller = app(DashboardController::class);
    
    try {
        $response = $controller->index();
        return response()->json([
            'authenticated' => true,
            'user' => $user->email,
            'controller_works' => true,
            'response_type' => get_class($response)
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'authenticated' => true,
            'user' => $user->email,
            'controller_works' => false,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});
