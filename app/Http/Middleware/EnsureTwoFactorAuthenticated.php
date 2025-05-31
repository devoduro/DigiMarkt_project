<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureTwoFactorAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->two_factor_secret && 
            !$request->session()->has('auth.two_factor_confirmed') &&
            !$request->is('two-factor-challenge*')) {
            
            // Store the intended URL for redirection after 2FA
            $request->session()->put('url.intended', $request->url());
            
            // Redirect to the two-factor challenge page
            return redirect()->route('two-factor.challenge');
        }

        return $next($request);
    }
}
