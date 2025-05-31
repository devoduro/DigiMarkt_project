<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\DeliverableController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DeliverableManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/resources', [ResourceController::class, 'index'])->name('resources');
Route::get('/milestones', [HomeController::class, 'milestones'])->name('milestones');
Route::get('/project-activities', [HomeController::class, 'projectActivities'])->name('project.activities');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');

// Authentication routes (Laravel's built-in auth)
Auth::routes(['verify' => true]); // Enable email verification

// Two-factor authentication routes
Route::get('/two-factor-challenge', [\App\Http\Controllers\Auth\TwoFactorChallengeController::class, 'show'])->name('two-factor.challenge');
Route::post('/two-factor-challenge', [\App\Http\Controllers\Auth\TwoFactorChallengeController::class, 'store']);

// Two-factor authentication API routes (for AJAX)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/two-factor-authentication-status', [\App\Http\Controllers\Auth\TwoFactorAuthController::class, 'status']);
    Route::post('/user/two-factor-authentication', [\App\Http\Controllers\Auth\TwoFactorAuthController::class, 'enable']);
    Route::get('/user/two-factor-qr-code', [\App\Http\Controllers\Auth\TwoFactorAuthController::class, 'qrCode']);
    Route::post('/user/confirmed-two-factor-authentication', [\App\Http\Controllers\Auth\TwoFactorAuthController::class, 'confirm']);
    Route::delete('/user/two-factor-authentication', [\App\Http\Controllers\Auth\TwoFactorAuthController::class, 'disable']);
});

// Protected routes (require authentication)
Route::middleware(['auth', 'verified', \App\Http\Middleware\EnsureTwoFactorAuthenticated::class])->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    
    // User profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/two-factor', [ProfileController::class, 'enableTwoFactor'])->name('profile.two-factor.enable');
    Route::delete('/profile/two-factor', [ProfileController::class, 'disableTwoFactor'])->name('profile.two-factor.disable');
    
    // Deliverables (protected content)
    Route::get('/deliverables', [DeliverableController::class, 'index'])->name('deliverables');
    Route::get('/deliverables/{deliverable}', [DeliverableController::class, 'show'])->name('deliverables.show');
    Route::get('/deliverables/{deliverable}/download', [DeliverableController::class, 'download'])->name('deliverables.download');
});

// Admin routes (require admin role)
Route::middleware(['auth', 'verified', \App\Http\Middleware\EnsureTwoFactorAuthenticated::class, 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // User management
    Route::resource('users', UserController::class);
    Route::put('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
    Route::put('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
    
    // Deliverable management
    Route::resource('deliverables', DeliverableManagementController::class);
    Route::post('/deliverables/{deliverable}/publish', [DeliverableManagementController::class, 'publish'])->name('deliverables.publish');
    Route::post('/deliverables/{deliverable}/unpublish', [DeliverableManagementController::class, 'unpublish'])->name('deliverables.unpublish');
});
