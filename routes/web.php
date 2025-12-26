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
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\GalleryController;

use App\Http\Controllers\Course\CourseController;
 
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\JobCircularController;
use App\Http\Controllers\SubscribeController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/partners', [HomeController::class, 'partners'])->name('partners');
Route::get('/management-board', [HomeController::class, 'managementBoard'])->name('management.board');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/resources', [HomeController::class, 'resources'])->name('resources');
Route::get('/resources/{id}', [HomeController::class, 'resourceShow'])->name('resources.show');
Route::get('/resources/{id}/download', [HomeController::class, 'resourceDownload'])->name('resources.download');
Route::get('/deliverables', [HomeController::class, 'deliverables'])->name('deliverables');
Route::get('/documents/{id}/download', [HomeController::class, 'documentDownload'])->name('documents.download');
Route::get('/project-activities', [HomeController::class, 'projectActivities'])->name('project.activities');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Public milestones and work packages routes
Route::get('/milestones', [\App\Http\Controllers\MilestoneController::class, 'index'])->name('milestones');
Route::get('/work-packages', [\App\Http\Controllers\WorkPackageController::class, 'index'])->name('work-packages');

// Public news/blog routes
Route::get('/news', [\App\Http\Controllers\BlogController::class, 'index'])->name('news.index');
Route::get('/news/{blogPost}', [\App\Http\Controllers\BlogController::class, 'show'])->name('news.show');

// Gallery routes
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'show'])->name('gallery.show');

// Video routes
Route::get('/videos', [\App\Http\Controllers\VideoController::class, 'index'])->name('videos');
Route::get('/videos/{id}', [\App\Http\Controllers\VideoController::class, 'show'])->name('videos.show');

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

// Deliverables downloads (require auth and verification, but not 2FA)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/deliverables/{id}/download', [HomeController::class, 'documentDownload'])->name('deliverables.download');
});

// Protected routes (require authentication and 2FA)
Route::middleware(['auth', 'verified', \App\Http\Middleware\EnsureTwoFactorAuthenticated::class])->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    
    // User profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/two-factor', [ProfileController::class, 'enableTwoFactor'])->name('profile.two-factor.enable');
    Route::delete('/profile/two-factor', [ProfileController::class, 'disableTwoFactor'])->name('profile.two-factor.disable');

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
        Route::put('/milestones/{milestone}/publish', [\App\Http\Controllers\Admin\MilestoneController::class, 'publish'])->name('milestones.publish');
        Route::put('/milestones/{milestone}/unpublish', [\App\Http\Controllers\Admin\MilestoneController::class, 'unpublish'])->name('milestones.unpublish');
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

        // Gallery management
        Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
        Route::post('/galleries/{gallery}/toggle-featured', [\App\Http\Controllers\Admin\GalleryController::class, 'toggleFeatured'])->name('galleries.toggle-featured');
        Route::post('/galleries/{gallery}/images', [\App\Http\Controllers\Admin\GalleryController::class, 'storeImage'])->name('galleries.images.store');
        Route::delete('/galleries/{gallery}/images/{image}', [\App\Http\Controllers\Admin\GalleryController::class, 'destroyImage'])->name('galleries.images.destroy');
        
        // Announcement management
        Route::resource('announcements', AnnouncementController::class);
        Route::patch('/announcements/{announcement}/toggle-active', [AnnouncementController::class, 'toggleActive'])->name('announcements.toggle-active');
        
        // Video management
        Route::resource('videos', \App\Http\Controllers\Admin\VideoController::class);
        Route::post('/videos/{video}/toggle-featured', [\App\Http\Controllers\Admin\VideoController::class, 'toggleFeatured'])->name('videos.toggle-featured');
        Route::post('/videos/{video}/toggle-published', [\App\Http\Controllers\Admin\VideoController::class, 'togglePublished'])->name('videos.toggle-published');
        
        // Work Package management
        Route::resource('work-packages', \App\Http\Controllers\Admin\WorkPackageController::class);
        Route::post('/work-packages/{workPackage}/toggle-featured', [\App\Http\Controllers\Admin\WorkPackageController::class, 'toggleFeatured'])->name('work-packages.toggle-featured');
        Route::put('/work-packages/{workPackage}/publish', [\App\Http\Controllers\Admin\WorkPackageController::class, 'publish'])->name('work-packages.publish');
        Route::put('/work-packages/{workPackage}/unpublish', [\App\Http\Controllers\Admin\WorkPackageController::class, 'unpublish'])->name('work-packages.unpublish');
        
        // Blog Post management
        Route::resource('blog-posts', \App\Http\Controllers\Admin\BlogPostController::class);
        Route::patch('/blog-posts/{blogPost}/publish', [\App\Http\Controllers\Admin\BlogPostController::class, 'publish'])->name('blog-posts.publish');
        Route::patch('/blog-posts/{blogPost}/unpublish', [\App\Http\Controllers\Admin\BlogPostController::class, 'unpublish'])->name('blog-posts.unpublish');
        Route::patch('/blog-posts/{blogPost}/toggle-featured', [\App\Http\Controllers\Admin\BlogPostController::class, 'toggleFeatured'])->name('blog-posts.toggle-featured');
    });
});



Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('customize');
Route::get('demo/{slug}', [HomeController::class, 'demo'])->name('home.demo')->middleware('customize');
Route::get('job-circulars/{job_circular}', [JobCircularController::class, 'show'])->name('job-circulars.show');

// course page
Route::controller(CourseController::class)->group(function () {
    Route::get('courses/{category}/{category_child?}', 'category_courses')->name('category.courses');
    Route::get('courses/details/{slug}/{id}', 'show')->name('course.details');
});

Route::get('instructors/{instructor}', [InstructorController::class, 'show'])->name('instructors.show');
Route::resource('subscribes', SubscribeController::class)->only(['index', 'store']);
