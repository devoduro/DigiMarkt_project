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
Route::get('/resources', [HomeController::class, 'resources'])->name('resources');
Route::get('/resources/{id}', [HomeController::class, 'resourceShow'])->name('resources.show');
Route::get('/resources/{id}/download', [HomeController::class, 'resourceDownload'])->name('resources.download');
Route::get('/milestones', [HomeController::class, 'milestones'])->name('milestones');
Route::get('/project-activities', [HomeController::class, 'projectActivities'])->name('project.activities');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/management-board', [\App\Http\Controllers\ManagementBoardController::class, 'index'])->name('management.board');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/deliverables', [HomeController::class, 'deliverables'])->name('deliverables');

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
    
    // Deliverables - authenticated downloads only
    Route::get('/deliverables/{id}/download', [HomeController::class, 'documentDownload'])->name('deliverables.download');

    // Protected deliverable routes
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/deliverables/manage', [DeliverableController::class, 'index'])->name('deliverables.manage');
        Route::get('/deliverables/detail/{deliverable}', [DeliverableController::class, 'show'])->name('deliverables.show');
    });
});

// Admin routes (require admin role)
Route::prefix('admin')->name('admin.')->group(function () {
    // Apply auth and verified middleware to all routes in this group
    Route::middleware(['auth', 'verified'])->group(function () {
        // Check for admin role manually in a controller
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
        
        // Digital Marketing Resource management
        Route::resource('resources', \App\Http\Controllers\Admin\ResourceController::class);
        Route::post('/resources/{resource}/toggle-featured', [\App\Http\Controllers\Admin\ResourceController::class, 'toggleFeatured'])->name('resources.toggle-featured');
        Route::post('/resources/{resource}/toggle-published', [\App\Http\Controllers\Admin\ResourceController::class, 'togglePublished'])->name('resources.toggle-published');
        Route::get('/resources/{resource}/download', [\App\Http\Controllers\Admin\ResourceController::class, 'download'])->name('resources.download');
        
        // Project Milestone management
        Route::resource('milestones', \App\Http\Controllers\Admin\MilestoneController::class);
        Route::post('/milestones/{milestone}/toggle-featured', [\App\Http\Controllers\Admin\MilestoneController::class, 'toggleFeatured'])->name('milestones.toggle-featured');
        Route::post('/milestones/reorder', [\App\Http\Controllers\Admin\MilestoneController::class, 'reorder'])->name('milestones.reorder');
        
        // Milestone Deliverables management
        Route::get('/milestones/{milestone}/deliverables', [\App\Http\Controllers\Admin\MilestoneDeliverableController::class, 'index'])->name('milestones.deliverables.index');
        Route::get('/milestones/{milestone}/deliverables/create', [\App\Http\Controllers\Admin\MilestoneDeliverableController::class, 'create'])->name('milestones.deliverables.create');
        Route::post('/milestones/{milestone}/deliverables', [\App\Http\Controllers\Admin\MilestoneDeliverableController::class, 'store'])->name('milestones.deliverables.store');
        Route::get('/milestones/{milestone}/deliverables/{deliverable}/edit', [\App\Http\Controllers\Admin\MilestoneDeliverableController::class, 'edit'])->name('milestones.deliverables.edit');
        Route::put('/milestones/{milestone}/deliverables/{deliverable}', [\App\Http\Controllers\Admin\MilestoneDeliverableController::class, 'update'])->name('milestones.deliverables.update');
        Route::delete('/milestones/{milestone}/deliverables/{deliverable}', [\App\Http\Controllers\Admin\MilestoneDeliverableController::class, 'destroy'])->name('milestones.deliverables.destroy');
        Route::post('/milestones/{milestone}/deliverables/{deliverable}/toggle-completed', [\App\Http\Controllers\Admin\MilestoneDeliverableController::class, 'toggleCompleted'])->name('milestones.deliverables.toggle-completed');
        
        // Project Activity management
        Route::resource('activities', \App\Http\Controllers\Admin\ProjectActivityController::class);
        Route::post('/activities/{activity}/toggle-featured', [\App\Http\Controllers\Admin\ProjectActivityController::class, 'toggleFeatured'])->name('activities.toggle-featured');
        Route::post('/activities/{activity}/images', [\App\Http\Controllers\Admin\ProjectActivityController::class, 'storeImage'])->name('activities.images.store');
        Route::delete('/activities/{activity}/images/{image}', [\App\Http\Controllers\Admin\ProjectActivityController::class, 'destroyImage'])->name('activities.images.destroy');
        Route::post('/activities/{activity}/images/{image}/set-primary', [\App\Http\Controllers\Admin\ProjectActivityController::class, 'setPrimaryImage'])->name('activities.images.set-primary');
    });
});
