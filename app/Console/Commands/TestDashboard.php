<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TestDashboard extends Command
{
    protected $signature = 'test:dashboard';
    protected $description = 'Test dashboard access';

    public function handle()
    {
        $user = User::find(1);
        Auth::login($user);
        
        $this->info('User logged in: ' . $user->email);
        $this->info('Auth check: ' . (Auth::check() ? 'YES' : 'NO'));
        $this->info('Auth user: ' . (Auth::user() ? Auth::user()->email : 'NONE'));
        
        // Test the controller
        $controller = app(\App\Http\Controllers\DashboardController::class);
        try {
            $response = $controller->index();
            $this->info('Dashboard controller executed successfully');
            $this->info('Response type: ' . get_class($response));
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error($e->getTraceAsString());
        }
    }
}
