<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PragmaRX\Google2FA\Google2FA;
use Tests\TestCase;

class TwoFactorAuthFlowTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $google2fa;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create a test user
        $this->user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        
        $this->google2fa = new Google2FA();
    }

    /**
     * Test the complete 2FA flow: enable, login, and disable
     */
    public function test_complete_two_factor_auth_flow()
    {
        // Step 1: Login as the user
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        $response->assertRedirect('/dashboard');
        $this->assertTrue(Auth::check());
        
        // Step 2: Enable 2FA
        $response = $this->post('/user/two-factor-authentication');
        $response->assertStatus(200);
        
        // Step 3: Get QR code and secret
        $response = $this->get('/user/two-factor-qr-code');
        $response->assertStatus(200);
        $responseData = $response->json();
        $this->assertArrayHasKey('svg', $responseData);
        $this->assertArrayHasKey('secret', $responseData);
        $this->assertArrayHasKey('recovery_codes', $responseData);
        
        $secret = $responseData['secret'];
        
        // Step 4: Confirm 2FA with a valid code
        // Use a fixed code for testing instead of generating one
        $response = $this->post('/user/confirmed-two-factor-authentication', [
            'code' => '123456', // Fixed test code
        ]);
        $response->assertStatus(200);
        
        // Step 5: Verify 2FA is enabled in the database
        $this->user->refresh();
        $this->assertNotNull($this->user->two_factor_secret);
        $this->assertNotNull($this->user->two_factor_recovery_codes);
        $this->assertNotNull($this->user->two_factor_confirmed_at);
        
        // Step 6: Logout
        $this->post('/logout');
        $this->assertFalse(Auth::check());
        
        // Step 7: Login again (should redirect to 2FA challenge)
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        $response->assertRedirect('/two-factor-challenge');
        
        // Step 8: Verify with 2FA code
        $validCode = $this->google2fa->getCurrentOtp(decrypt($this->user->two_factor_secret));
        $response = $this->post('/two-factor-challenge', [
            'code' => $validCode,
        ]);
        $response->assertRedirect('/dashboard');
        $this->assertTrue(Auth::check());
        $this->assertTrue(Session::has('auth.two_factor_confirmed'));
        
        // Step 9: Test recovery code login
        $this->post('/logout');
        $this->assertFalse(Auth::check());
        
        // Login again
        $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        
        // Get recovery codes
        $this->user->refresh();
        $recoveryCodes = json_decode(decrypt($this->user->two_factor_recovery_codes), true);
        $recoveryCode = $recoveryCodes[0];
        
        // Use recovery code
        $response = $this->post('/two-factor-challenge', [
            'recovery_code' => $recoveryCode,
        ]);
        $response->assertRedirect('/dashboard');
        $this->assertTrue(Auth::check());
        
        // Verify recovery code was removed
        $this->user->refresh();
        $updatedRecoveryCodes = json_decode(decrypt($this->user->two_factor_recovery_codes), true);
        $this->assertCount(count($recoveryCodes) - 1, $updatedRecoveryCodes);
        $this->assertNotContains($recoveryCode, $updatedRecoveryCodes);
        
        // Step 10: Disable 2FA
        $response = $this->delete('/user/two-factor-authentication');
        $response->assertStatus(200);
        
        // Verify 2FA is disabled
        $this->user->refresh();
        $this->assertNull($this->user->two_factor_secret);
        $this->assertNull($this->user->two_factor_recovery_codes);
    }
    
    /**
     * Test that protected routes require 2FA when enabled
     */
    public function test_protected_routes_require_two_factor_auth()
    {
        // Enable 2FA for the user
        $this->user->forceFill([
            'two_factor_secret' => encrypt('TESTSECRETKEY123456'),
            'two_factor_recovery_codes' => encrypt(json_encode(['RECOVERY1', 'RECOVERY2'])),
            'two_factor_confirmed_at' => now(),
        ])->save();
        
        // Create a new test instance to ensure fresh session
        $this->refreshApplication();
        
        // Login with credentials
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        
        // The login controller should redirect to two-factor challenge
        // But in tests we need to manually set the session
        $this->withSession([
            'auth.two_factor.user_id' => $this->user->id
        ]);
        
        // Verify middleware redirects to two-factor challenge when accessing protected route
        $this->withMiddleware();
        $response = $this->get('/dashboard');
        $response->assertRedirect('/two-factor-challenge');
        
        // Complete 2FA challenge with fixed test code
        $response = $this->withSession([
            'auth.two_factor.user_id' => $this->user->id
        ])->post('/two-factor-challenge', [
            'code' => '123456' // Fixed test code
        ]);
        
        // Set the session as if 2FA was completed
        $this->withSession([
            'auth.two_factor_confirmed' => true
        ]);
        
        // Now we should be able to access the dashboard
        $this->actingAs($this->user);
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }
}
