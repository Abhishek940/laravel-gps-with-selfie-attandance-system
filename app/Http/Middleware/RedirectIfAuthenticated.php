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
       // if (Auth::guard($guard)->check()) {
         //   return redirect('/home');
        //}
		
		 if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect()->route('admin.dashboard');
        }

        if ($guard == "manager" && Auth::guard($guard)->check()) {
            return redirect()->route('manager.dashboard');
        }
		
		if ($guard == "employee" && Auth::guard($guard)->check()) {
            return redirect()->route('employee.dashboard');
        }

        if (Auth::guard($guard)->check()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
