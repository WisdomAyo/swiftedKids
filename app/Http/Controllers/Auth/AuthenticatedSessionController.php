<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate user login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');




        if (Auth::attempt($credentials)) {
            // Redirect based on the role
            $user = Auth::user();

            if ($user->role === 'teacher') {
                return redirect()->route('teacher.dashboard');
            }
             elseif ($user->role === 'student') {
                return redirect()->route('student.dashboard');
            }
            elseif ($user->role === 'admin') {
                Auth::logout(); // Immediately log the user out

                // Redirect back to the login page with an error message
                return redirect()->back()->withErrors([
                    'error' => 'You are an admin. Use cant bring yourself so down. Please use the admin login to access your dashboard.',
                ]);


            // Default fallback if no role is found
            return redirect()->route('home');
        }

        // If login fails, throw a validation exception
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
