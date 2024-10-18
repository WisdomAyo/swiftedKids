<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    // List all teachers
    public function index()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    // Show the form to create a new teacher
    public function create()
    {
        return view('admin.teachers.create');
    }

    // Store a new teacher
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:20',
        ]);

        $teacher = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'role' => 'teacher',
            'phone_number' => $request->phone_number,
            'profile_completed' => false,
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher created successfully!');
    }

    // Approve a teacher
    public function approve(User $teacher)
    {
        if ($teacher->role === 'teacher') {
            $teacher->is_approved = true;
            $teacher->save();

            return redirect()->route('admin.teachers.index')->with('success', 'Teacher approved successfully!');
        }

        return redirect()->route('admin.teachers.index')->withErrors('Invalid teacher.');
    }

    // Bar a teacher
    public function bar(User $teacher)
    {
        if ($teacher->role === 'teacher') {
            $teacher->is_banned = !$teacher->is_banned; // Toggle the ban status
            $teacher->save();

            $status = $teacher->is_banned ? 'Teacher barred successfully!' : 'Teacher unbarred successfully!';
            return redirect()->route('admin.teachers.index')->with('success', $status);
        }

        return redirect()->route('admin.teachers.index')->withErrors('Invalid teacher.');
    }

    // Rate a teacher
    public function rate(Request $request, User $teacher)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:500',
        ]);

        Rating::create([
            'teacher_id' => $teacher->id,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
            'rated_by' => auth()->user()->id, // Admin ID
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher rated successfully!');
    }
}
