<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Chatbot API Routes
Route::prefix('chatbot')->group(function () {
    Route::post('/message', [ChatbotController::class, 'processMessage']);
    Route::get('/suggestions', [ChatbotController::class, 'getSuggestedQuestions']);
});
