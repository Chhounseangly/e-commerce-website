<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //option 1
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/');
        // }
        //option 2
        if (Auth::check()) {
            if (auth()->user()->role_id === 1) {
                return redirect('superadmin');
            } else if (auth()->user()->role_id === 2) {
                return redirect('admin');
            }
            return redirect('/'); // Replace with desired redirect path
        }

        return $next($request);
    }
}
