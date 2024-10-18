<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //


    public function dashboard()
{
    $student = Auth::user(); 
    return view('dashboard.student.dashboard' , compact('student'));
}

public function show()
{
    $student = Auth::user(); // Get the authenticated student
    return view('dashboard.student.profile', compact('student')); // Show the student profile view
}

public function edit()
{
    $student = Auth::user(); // Get the authenticated student
    return view('dashboard.student.profile', compact('student')); // Show the student profile edit form
}


public function update(Request $request)
{
    $student = Auth::user(); // Get the authenticated student

    // Validate the form data
    $this->validateRequest($request, $student->id);

    // Use DB transaction to ensure atomicity of the entire operation
    DB::transaction(function () use ($request, $student) {
        // Handle profile image upload
        $this->handleProfileImageUpload($request, $student);

        // Update general teacher profile information
        $student->update($request->only([
            'name', 'email', 'phone_number', 'gender', 'dob', 'bio'
        ]));


    });

    return redirect()->back()->with('success', 'Profile updated successfully!');
}

private function validateRequest(Request $request, $studentId)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $studentId,
        'phone_number' => 'nullable|string|max:20',
        'gender' => 'nullable|in:male,female,other',
        'dob' => 'nullable|date',
        'bio' => 'nullable|string|max:500',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ]);
}

// Handle profile image upload
private function handleProfileImageUpload(Request $request, $student)
{
    if ($request->hasFile('profile_image')) {
        if ($student->profile_image) {
            Storage::disk('public')->delete($student->profile_image); // Delete old image if exists
        }
        $student->profile_image = $request->file('profile_image')->store('profile_images', 'public'); // Upload new image
    }
}

}
