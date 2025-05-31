<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorAuth
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
        $user = auth()->user();

        // If user doesn't have 2FA enabled, let them through
        if (empty($user->two_factor_secret)) {
            return $next($request);
        }

        // If user has already passed 2FA check in this session, let them through
        if (Session::get('two_factor_verified')) {
            return $next($request);
        }

        // Store the intended URL to redirect after 2FA verification
        Session::put('two_factor_intended_url', $request->url());

        // Redirect to 2FA verification page
        return redirect()->route('two-factor.verify');
    }
}
