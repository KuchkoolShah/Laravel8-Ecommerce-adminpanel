<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null)
    {
            //     if (Auth::guard($guard)->check()) {
            //         if(Auth::user()->role->name == 'admin' ?? '')
            //             return redirect('/dashboard');
            //         else
            //             return redirect('/products/home');
            //     }

        //     return $next($request);
                if (Auth::guard($guard)->check()) {
                    $role = Auth::user()->role->name == 'admin'; 
                
                    switch ($role) {
                    case 'admin':
                        return redirect('/dashboard');
                        break;
                 
                
                    default:
                        return redirect('/products/home'); 
                        break;
                    }
                }
                return $next($request);
     }
}
