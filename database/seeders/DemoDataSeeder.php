<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProjectActivity;
use App\Models\ActivityImage;
use App\Models\Resource;
use App\Models\Milestone;
use App\Models\MilestoneDeliverable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get admin user for created_by field
        $admin = User::where('email', 'admin@example.com')->first();
        
        if (!$admin) {
            // Create admin user if not exists
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        }
        
        // Create demo project activities
        $this->createProjectActivities($admin->id);
        
        // Create demo digital marketing resources
        $this->createDigitalResources($admin->id);
        
        // Create demo project milestones with deliverables
        $this->createMilestonesWithDeliverables($admin->id);
    }
    
    /**
     * Create demo project activities with images
     */
    private function createProjectActivities($adminId): void
    {
        // Ensure storage directories exist
        Storage::disk('public')->makeDirectory('activity_images');
        
        $activities = [
            [
                'title' => 'Market Research Analysis',
                'date' => now()->subDays(30)->format('Y-m-d'),
                'description' => 'Conducted comprehensive market research to identify target audience demographics and preferences. Analyzed competitor strategies and market trends to inform our digital marketing approach.',
                'status' => 'Completed',
                'is_featured' => true,
                'images' => [
                    $this->generateDummyImage('market_research_1.jpg', 800, 600, true),
                    $this->generateDummyImage('market_research_2.jpg', 800, 600, false),
                ]
            ],
            [
                'title' => 'Social Media Campaign Launch',
                'date' => now()->subDays(15)->format('Y-m-d'),
                'description' => 'Launched our multi-platform social media campaign targeting key demographics across Instagram, Facebook, and LinkedIn. Initial engagement metrics show promising results with higher than expected click-through rates.',
                'status' => 'In Progress',
                'is_featured' => true,
                'images' => [
                    $this->generateDummyImage('social_campaign_1.jpg', 1200, 628, true),
                    $this->generateDummyImage('social_campaign_2.jpg', 800, 800, false),
                    $this->generateDummyImage('social_campaign_3.jpg', 1080, 1080, false),
                ]
            ],
            [
                'title' => 'Content Strategy Workshop',
                'date' => now()->subDays(7)->format('Y-m-d'),
                'description' => 'Held a collaborative workshop with the content team to develop a cohesive content strategy for the next quarter. Defined key messaging, content pillars, and distribution channels.',
                'status' => 'Completed',
                'is_featured' => false,
                'images' => [
                    $this->generateDummyImage('workshop_1.jpg', 1200, 800, true),
                ]
            ],
            [
                'title' => 'SEO Optimization Project',
                'date' => now()->format('Y-m-d'),
                'description' => 'Initiated a comprehensive SEO audit and optimization project to improve organic search rankings. Focus areas include technical SEO improvements, content optimization, and backlink strategy development.',
                'status' => 'In Progress',
                'is_featured' => false,
                'images' => [
                    $this->generateDummyImage('seo_project_1.jpg', 1000, 667, true),
                    $this->generateDummyImage('seo_project_2.jpg', 1200, 800, false),
                ]
            ],
            [
                'title' => 'Email Marketing Automation Setup',
                'date' => now()->addDays(5)->format('Y-m-d'),
                'description' => 'Planning and configuring advanced email marketing automation workflows to nurture leads and improve customer retention. Will include personalized sequences based on user behavior and segmentation.',
                'status' => 'Upcoming',
                'is_featured' => true,
                'images' => [
                    $this->generateDummyImage('email_automation_1.jpg', 1200, 800, true),
                ]
            ],
        ];
        
        foreach ($activities as $activityData) {
            $images = $activityData['images'];
            unset($activityData['images']);
            
            $activityData['created_by'] = $adminId;
            
            $activity = ProjectActivity::create($activityData);
            
            // Add images to activity
            foreach ($images as $index => $imageData) {
                ActivityImage::create([
                    'project_activity_id' => $activity->id,
                    'image_path' => $imageData['path'],
                    'is_primary' => $imageData['is_primary'],
                    'display_order' => $index + 1,
                ]);
            }
        }
        
        $this->command->info('Created 5 project activities with images');
    }
    
    /**
     * Create demo digital marketing resources
     */
    private function createDigitalResources($adminId): void
    {
        // Ensure storage directories exist
        Storage::disk('public')->makeDirectory('resource_thumbnails');
        Storage::disk('public')->makeDirectory('resource_files');
        
        $resources = [
            [
                'title' => 'Social Media Strategy Guide',
                'description' => 'A comprehensive guide to developing and implementing an effective social media strategy for businesses of all sizes.',
                'category' => 'Social Media',
                'access_level' => 'public',
                'is_featured' => true,
                'is_published' => true,
                'download_count' => rand(10, 50),
                'thumbnail' => $this->generateDummyImage('social_media_thumb.jpg', 400, 300, false)['path'],
                'file' => $this->generateDummyPDF('Social_Media_Strategy_Guide.pdf')
            ],
            [
                'title' => 'SEO Best Practices 2025',
                'description' => 'Learn the latest SEO techniques and best practices to improve your website\'s organic search rankings in 2025.',
                'category' => 'SEO',
                'access_level' => 'registered',
                'is_featured' => true,
                'is_published' => true,
                'download_count' => rand(20, 100),
                'thumbnail' => $this->generateDummyImage('seo_thumb.jpg', 400, 300, false)['path'],
                'file' => $this->generateDummyPDF('SEO_Best_Practices_2025.pdf')
            ],
            [
                'title' => 'Email Marketing Templates Pack',
                'description' => 'A collection of 10 professionally designed email marketing templates optimized for engagement and conversions.',
                'category' => 'Email Marketing',
                'access_level' => 'registered',
                'is_featured' => false,
                'is_published' => true,
                'download_count' => rand(5, 30),
                'thumbnail' => $this->generateDummyImage('email_templates_thumb.jpg', 400, 300, false)['path'],
                'file' => $this->generateDummyZIP('Email_Templates_Pack.zip')
            ],
            [
                'title' => 'Content Calendar Template',
                'description' => 'A ready-to-use content calendar template to plan and organize your content marketing efforts across multiple channels.',
                'category' => 'Content Marketing',
                'access_level' => 'public',
                'is_featured' => false,
                'is_published' => true,
                'download_count' => rand(30, 150),
                'thumbnail' => $this->generateDummyImage('content_calendar_thumb.jpg', 400, 300, false)['path'],
                'file' => $this->generateDummyExcel('Content_Calendar_Template.xlsx')
            ],
            [
                'title' => 'Digital Marketing ROI Calculator',
                'description' => 'An advanced Excel tool to calculate and track the ROI of your digital marketing campaigns across different channels.',
                'category' => 'Analytics',
                'access_level' => 'admin',
                'is_featured' => true,
                'is_published' => true,
                'download_count' => rand(10, 40),
                'thumbnail' => $this->generateDummyImage('roi_calculator_thumb.jpg', 400, 300, false)['path'],
                'file' => $this->generateDummyExcel('Digital_Marketing_ROI_Calculator.xlsx')
            ],
        ];
        
        foreach ($resources as $resourceData) {
            Resource::create([
                'title' => $resourceData['title'],
                'description' => $resourceData['description'],
                'category' => $resourceData['category'],
                'thumbnail_path' => $resourceData['thumbnail'],
                'file_path' => $resourceData['file']['path'],
                'file_name' => $resourceData['file']['name'],
                'access_level' => $resourceData['access_level'],
                'is_featured' => $resourceData['is_featured'],
                'is_published' => $resourceData['is_published'],
                'download_count' => $resourceData['download_count'],
                'created_by' => $adminId,
            ]);
        }
        
        $this->command->info('Created 5 digital marketing resources');
    }
    
    /**
     * Create demo project milestones with deliverables
     */
    private function createMilestonesWithDeliverables($adminId): void
    {
        $milestones = [
            [
                'title' => 'Project Kickoff',
                'date' => now()->subDays(45)->format('Y-m-d'),
                'description' => 'Initial project kickoff meeting with stakeholders to define project scope, objectives, and timeline.',
                'status' => 'Completed',
                'is_featured' => true,
                'deliverables' => [
                    [
                        'title' => 'Project Charter Document',
                        'description' => 'Comprehensive document outlining project scope, objectives, stakeholders, and success criteria.',
                        'completed' => true,
                    ],
                    [
                        'title' => 'Stakeholder Analysis',
                        'description' => 'Analysis of all project stakeholders, their interests, influence, and engagement strategies.',
                        'completed' => true,
                    ],
                    [
                        'title' => 'Initial Project Timeline',
                        'description' => 'Preliminary project timeline with key milestones and deliverables.',
                        'completed' => true,
                    ],
                ]
            ],
            [
                'title' => 'Market Research Phase',
                'date' => now()->subDays(30)->format('Y-m-d'),
                'description' => 'Comprehensive market research to understand target audience, competitors, and market trends.',
                'status' => 'Completed',
                'is_featured' => false,
                'deliverables' => [
                    [
                        'title' => 'Competitor Analysis Report',
                        'description' => 'Detailed analysis of key competitors, their strategies, strengths, and weaknesses.',
                        'completed' => true,
                    ],
                    [
                        'title' => 'Target Audience Personas',
                        'description' => 'Development of detailed customer personas representing key target audience segments.',
                        'completed' => true,
                    ],
                    [
                        'title' => 'Market Trends Report',
                        'description' => 'Analysis of current market trends and their potential impact on the project.',
                        'completed' => true,
                    ],
                    [
                        'title' => 'SWOT Analysis',
                        'description' => 'Strengths, Weaknesses, Opportunities, and Threats analysis for the project.',
                        'completed' => true,
                    ],
                ]
            ],
            [
                'title' => 'Strategy Development',
                'date' => now()->subDays(15)->format('Y-m-d'),
                'description' => 'Development of comprehensive digital marketing strategy based on research findings.',
                'status' => 'In Progress',
                'is_featured' => true,
                'deliverables' => [
                    [
                        'title' => 'Digital Marketing Strategy Document',
                        'description' => 'Comprehensive strategy document outlining approach, channels, messaging, and KPIs.',
                        'completed' => true,
                    ],
                    [
                        'title' => 'Content Strategy Plan',
                        'description' => 'Detailed content strategy including content pillars, formats, and distribution channels.',
                        'completed' => true,
                    ],
                    [
                        'title' => 'Channel-Specific Tactics',
                        'description' => 'Specific tactical approaches for each marketing channel (social, email, SEO, etc.).',
                        'completed' => false,
                    ],
                    [
                        'title' => 'Budget Allocation Plan',
                        'description' => 'Proposed budget allocation across different marketing channels and initiatives.',
                        'completed' => false,
                    ],
                ]
            ],
            [
                'title' => 'Campaign Implementation',
                'date' => now()->addDays(15)->format('Y-m-d'),
                'description' => 'Implementation of marketing campaigns across various digital channels.',
                'status' => 'Upcoming',
                'is_featured' => true,
                'deliverables' => [
                    [
                        'title' => 'Campaign Creative Assets',
                        'description' => 'Development of all creative assets required for the campaign (images, videos, copy).',
                        'completed' => false,
                    ],
                    [
                        'title' => 'Campaign Launch Plan',
                        'description' => 'Detailed plan for campaign launch including timeline and responsibilities.',
                        'completed' => false,
                    ],
                    [
                        'title' => 'Tracking Setup',
                        'description' => 'Implementation of tracking mechanisms to measure campaign performance.',
                        'completed' => false,
                    ],
                ]
            ],
            [
                'title' => 'Performance Analysis & Optimization',
                'date' => now()->addDays(45)->format('Y-m-d'),
                'description' => 'Analysis of campaign performance and implementation of optimization strategies.',
                'status' => 'Upcoming',
                'is_featured' => false,
                'deliverables' => [
                    [
                        'title' => 'Performance Dashboard',
                        'description' => 'Interactive dashboard showing real-time campaign performance metrics.',
                        'completed' => false,
                    ],
                    [
                        'title' => 'Mid-Campaign Analysis Report',
                        'description' => 'Analysis of initial campaign performance with recommendations for optimization.',
                        'completed' => false,
                    ],
                    [
                        'title' => 'A/B Testing Plan',
                        'description' => 'Plan for A/B testing different campaign elements to optimize performance.',
                        'completed' => false,
                    ],
                    [
                        'title' => 'Budget Reallocation Recommendations',
                        'description' => 'Recommendations for reallocating budget based on channel performance.',
                        'completed' => false,
                    ],
                ]
            ],
        ];
        
        foreach ($milestones as $milestoneData) {
            $deliverables = $milestoneData['deliverables'];
            unset($milestoneData['deliverables']);
            
            $milestoneData['created_by'] = $adminId;
            
            $milestone = Milestone::create($milestoneData);
            
            // Add deliverables to milestone
            foreach ($deliverables as $deliverableData) {
                $deliverableData['created_by'] = $adminId;
                $milestone->deliverables()->create($deliverableData);
            }
        }
        
        $this->command->info('Created 5 project milestones with deliverables');
    }
    
    /**
     * Generate a dummy image file
     */
    private function generateDummyImage($filename, $width, $height, $isPrimary): array
    {
        $path = 'activity_images/' . $filename;
        
        // Create a blank image
        $image = imagecreatetruecolor($width, $height);
        
        // Colors
        $bgColor = imagecolorallocate($image, rand(200, 255), rand(200, 255), rand(200, 255));
        $textColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));
        
        // Fill background
        imagefill($image, 0, 0, $bgColor);
        
        // Add simple text without using a font file
        $text = str_replace('.jpg', '', $filename);
        $text = str_replace('_', ' ', $text);
        
        // Draw a simple rectangle
        $borderColor = imagecolorallocate($image, rand(100, 150), rand(100, 150), rand(100, 150));
        imagerectangle($image, 10, 10, $width-10, $height-10, $borderColor);
        
        // Save image
        $fullPath = storage_path('app/public/' . $path);
        
        // Create directory if it doesn't exist
        if (!File::exists(dirname($fullPath))) {
            File::makeDirectory(dirname($fullPath), 0755, true);
        }
        
        imagejpeg($image, $fullPath);
        imagedestroy($image);
        
        return [
            'path' => $path,
            'is_primary' => $isPrimary
        ];
    }
    
    /**
     * Generate a dummy PDF file
     */
    private function generateDummyPDF($filename): array
    {
        $path = 'resource_files/' . $filename;
        $fullPath = storage_path('app/public/' . $path);
        
        // Create directory if it doesn't exist
        if (!File::exists(dirname($fullPath))) {
            File::makeDirectory(dirname($fullPath), 0755, true);
        }
        
        // Create a simple text file with .pdf extension
        File::put($fullPath, "This is a dummy PDF file for demonstration purposes: $filename");
        
        return [
            'path' => $path,
            'name' => $filename
        ];
    }
    
    /**
     * Generate a dummy Excel file
     */
    private function generateDummyExcel($filename): array
    {
        $path = 'resource_files/' . $filename;
        $fullPath = storage_path('app/public/' . $path);
        
        // Create directory if it doesn't exist
        if (!File::exists(dirname($fullPath))) {
            File::makeDirectory(dirname($fullPath), 0755, true);
        }
        
        // Create a simple text file with .xlsx extension
        File::put($fullPath, "This is a dummy Excel file for demonstration purposes: $filename");
        
        return [
            'path' => $path,
            'name' => $filename
        ];
    }
    
    /**
     * Generate a dummy ZIP file
     */
    private function generateDummyZIP($filename): array
    {
        $path = 'resource_files/' . $filename;
        $fullPath = storage_path('app/public/' . $path);
        
        // Create directory if it doesn't exist
        if (!File::exists(dirname($fullPath))) {
            File::makeDirectory(dirname($fullPath), 0755, true);
        }
        
        // Create a simple text file with .zip extension
        File::put($fullPath, "This is a dummy ZIP file for demonstration purposes: $filename");
        
        return [
            'path' => $path,
            'name' => $filename
        ];
    }
}
