<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use  APP\Http\Controllers\StudentController;
use  APP\Http\Controllers\TeacherController;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // if(!auth()->check() || auth()->user()->role !=$role){
        //     abort (403, 'Unauthorized');
        // }


        if (!$request->user() || !$request->user()->hasRole($role)) {
            // Optionally, redirect to an unauthorized page or throw an exception
            return redirect('/unauthorized');
        }


        return $next($request);
    }
}


