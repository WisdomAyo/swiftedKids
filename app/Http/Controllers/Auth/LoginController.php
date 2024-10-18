<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

    protected function authenticated(Request $request, $user)
    {
        // Check if the user is an admin
        if ($user->role === 'admin') {
            Auth::logout(); // Immediately log the user out

            // Redirect back to the login page with an error message
            return redirect()->back()->withErrors([
                'error' => 'You are an admin. Please use the admin login to access your dashboard.',
            ]);
        }

        // If not admin, allow the login to continue
        return redirect()->intended($this->redirectTo);  // This will redirect to the intended page (e.g., dashboard)
    


        if(user->role == 'teacher'){
            return redirect()->route(teacher.dashboard);
        }else{
            return redirect()->route(student.dashboard);
        }
        return redirect()->route('home.main');
    }

}
