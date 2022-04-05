<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUserVerifyEmail
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
        if (!Auth::user()->email_verified) {
            auth()->logout();
            return redirect()->route('login')
                    ->with('fail', 'You need to confirm your account. We have sent you an activation link, please check your email.')
                    ->withInput();
        }
        return $next($request);
    }
}
