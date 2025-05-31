<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the 2FA verification form.
     */
    public function showVerificationForm()
    {
        // If user doesn't have 2FA enabled or already verified, redirect to home
        if (empty(auth()->user()->two_factor_secret) || Session::get('two_factor_verified')) {
            return redirect()->route('home');
        }

        return view('auth.two-factor-verify');
    }

    /**
     * Verify the 2FA code.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $user = auth()->user();
        $google2fa = new Google2FA();
        
        // Verify the code
        $valid = $google2fa->verifyKey(
            decrypt($user->two_factor_secret),
            $request->code
        );
        
        if (!$valid) {
            return back()->withErrors(['code' => 'The verification code is invalid.']);
        }
        
        // Mark as verified for this session
        Session::put('two_factor_verified', true);
        
        // Redirect to the intended URL or home
        return redirect()->intended(
            Session::pull('two_factor_intended_url', route('home'))
        );
    }

    /**
     * Verify using a recovery code.
     */
    public function verifyWithRecoveryCode(Request $request)
    {
        $request->validate([
            'recovery_code' => 'required|string',
        ]);

        $user = auth()->user();
        $recoveryCodes = json_decode(decrypt($user->two_factor_recovery_codes), true);
        
        // Check if the recovery code is valid
        $recoveryCodeIndex = array_search(
            strtoupper($request->recovery_code),
            $recoveryCodes
        );
        
        if ($recoveryCodeIndex === false) {
            return back()->withErrors(['recovery_code' => 'The recovery code is invalid.']);
        }
        
        // Remove the used recovery code
        unset($recoveryCodes[$recoveryCodeIndex]);
        $user->update([
            'two_factor_recovery_codes' => encrypt(json_encode(array_values($recoveryCodes))),
        ]);
        
        // Mark as verified for this session
        Session::put('two_factor_verified', true);
        
        // Redirect to the intended URL or home
        return redirect()->intended(
            Session::pull('two_factor_intended_url', route('home'))
        );
    }
}
