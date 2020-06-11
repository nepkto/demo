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
        $guardCheck = Auth::guard($guard)->check();
        
        if($guard == 'service_consumer' && $guardCheck) {
            return redirect(RouteServiceProvider::CONSUMERHOME);
        }

        if($guard == 'service_provider' && $guardCheck) {
            return redirect(RouteServiceProvider::PROVIDERHOME);
        }

        if($guard == 'admin' && $guardCheck) {
            return redirect(RouteServiceProvider::ADMINHOME);
        }
        return $next($request);
    }
}
