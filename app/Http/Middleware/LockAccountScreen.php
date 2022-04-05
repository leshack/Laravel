<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LockAccountScreen
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
        if ($request->session()->has('locked') && url()->current() != route('admin.lockscreen')){

            return redirect()->route('admin.lockscreen');
        }

        return $next($request);

    }
}
