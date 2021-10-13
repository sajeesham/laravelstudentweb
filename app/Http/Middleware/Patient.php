<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Patient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if(Auth::user()->role == 'admin'){
            return redirect()->route('login');
        }
        if(Auth::user()->role == 'hospital'){
            return redirect()->route('login');
        }
        if(Auth::user()->role == 'doctor'){
            return redirect()->route('login');
        }
        if(Auth::user()->role == 'patient'){
            return $next($request);
        }
    }
}
