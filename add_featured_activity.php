<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

// Bootstrap Laravel
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Use the app instance directly
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// Create a new project activity
$activity = new \App\Models\ProjectActivity();
$activity->title = 'Digital Marketing Workshop for TVET Trainers';
$activity->date = '2025-06-15';
$activity->description = 'A comprehensive workshop focused on equipping TVET trainers with digital marketing skills. This hands-on session will cover social media marketing, content creation, SEO basics, and analytics for educational institutions. Participants will develop practical skills they can immediately implement in their training programs.';
$activity->status = 'Upcoming';
$activity->is_featured = true;
$activity->created_by = 1; // Assuming user ID 1 exists (admin)
$activity->save();

// Source image path (from carousel folder)
$sourcePath = __DIR__ . '/public/assets/images/carousel/slider2.jpg';

// Make sure storage is linked
if (!file_exists(__DIR__ . '/storage/app/public')) {
    echo "Creating public storage directory...\n";
    mkdir(__DIR__ . '/storage/app/public', 0755, true);
}

// Create activity_images directory if it doesn't exist
if (!file_exists(__DIR__ . '/storage/app/public/activity_images')) {
    echo "Creating activity_images directory...\n";
    mkdir(__DIR__ . '/storage/app/public/activity_images', 0755, true);
}

// Destination path for the image
$fileName = 'digital_marketing_workshop_' . time() . '.jpg';
$destinationPath = __DIR__ . '/storage/app/public/activity_images/' . $fileName;

// Copy the image
if (file_exists($sourcePath)) {
    copy($sourcePath, $destinationPath);
    
    // Create the activity image record
    $activityImage = new \App\Models\ActivityImage();
    $activityImage->project_activity_id = $activity->id;
    $activityImage->image_path = 'activity_images/' . $fileName;
    $activityImage->is_primary = true;
    $activityImage->display_order = 1;
    $activityImage->save();
    
    echo "Activity and image created successfully!\n";
    echo "Activity ID: " . $activity->id . "\n";
    echo "Image path: " . $activityImage->image_path . "\n";
} else {
    echo "Source image not found!\n";
}
