<?php

namespace App\Http\Controllers\Auth;
use App\Notifications\VerifyTeacherEmail;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the general registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Show the teacher registration form.
     */
    public function showStudentRegistrationForm(): View
    {
        return view('auth.register');
    }

    public function showTeacherRegistrationForm(): View
    {
        return view('auth.register-teacher');
    }

    public function registerStudent(Request $request): RedirectResponse
    {
        return $this->register($request, 'student');
    }

    /**
     * Handle the teacher registration request.
     */
    public function registerTeacher(Request $request): RedirectResponse
    {
        return $this->register($request, 'teacher');
    }


    /**
     * Handle the registration request for both teachers and students.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request): RedirectResponse
    {
        // Validate input based on role
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:student,teacher'], // Ensure valid role
        ]);

        // Create the user with the validated data
        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email), // Store email in lowercase for consistency
            'password' => Hash::make($request->password),
            'role' => $request->role, // Assign role (student or teacher)
        ]);

         // Send a custom email with a link to complete the profile
        // $user->notify(new VerifyTeacherEmail($user));

        // Trigger the Registered event (for further custom logic, like sending notifications)
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Handle role-specific redirection
        if ($user->role === 'teacher') {
            // Send verification email and redirect to the verification notice
          //  $user->sendEmailVerificationNotification();
             // Send a custom email with a link to complete the profile
         $user->notify(new VerifyTeacherEmail($user));
            // Redirect teachers to the email verification page
            return redirect()->route('dashboard.teacher.teacher_verify')
                ->with('message', 'Please verify your email before continuing...');
        }

        // Redirect students directly to the dashboard after registration
        return redirect()->route('student.dashboard')->with('success', 'Registration successful! Welcome to your dashboard.');;
    }
}


