<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (auth()->check() && auth()->user()->role === 'admin') {
    //         return $next($request);
    //     }




    //     return redirect()->route('login')->with('error', 'Access denied.');
    // }


    public function handle(Request $request, Closure $next)
    {
        // Ensure the authenticated user has the 'admin' role
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'admin') {
            return $next($request);
        }

        // Redirect if not an admin
        return redirect('/admin/login')->withErrors(['message' => 'Unauthorized access. Only admins can access this section.']);
    }


}
