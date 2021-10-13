<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if (Auth::guard($guard)->check()) {
            switch (Auth::user()->role){
                case 'admin':$redirectTo='/admin/';break;
                case 'hospital':$redirectTo='/hospital/';break;
                case 'doctor':$redirectTo='/doctor/';break;
                case 'patient':$redirectTo='/patient/';break;
                default: $redirectTo='/';break;
            }
            return redirect($redirectTo);
        }

        return $next($request);
    }
}
