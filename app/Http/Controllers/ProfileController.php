<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display the user's profile.
     */
    public function show()
    {
        $user = auth()->user();
        
        // Get user's download history
        $downloads = $user->downloads()
            ->with('document')
            ->latest()
            ->take(5)
            ->get();
        
        return view('pages.profile.show', compact(
            'user',
            'downloads'
        ));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);
        
        $user->update($validated);
        
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);
        
        return redirect()->route('profile')->with('success', 'Password updated successfully.');
    }

    // Two-factor authentication methods have been moved to the TwoFactorAuthController
}
