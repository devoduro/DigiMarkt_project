<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // Create admin user for testing
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        
        // Run the demo data seeder
        $this->call([
            DemoDataSeeder::class,
        ]);
    }
}
