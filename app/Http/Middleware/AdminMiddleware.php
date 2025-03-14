<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard()->check())  // this means that the admin was logged in.
        {
            if (Auth::user()->is_admin) {
                return $next($request);
            }
            
                // return redirect()->route('login');
        }
        return redirect('/login');
        // return $next($request);
    }
}
