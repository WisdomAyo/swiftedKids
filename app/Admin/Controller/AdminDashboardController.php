<?php

namespace App\Admin\Controller;

use App\Http\Controllers\Controller;
use App\Admin\Controller\AdminSubjectController;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;


    //

    class AdminDashboardController extends Controller
{
    public function index()
    {
        // Count teachers and students by role
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalStudents = User::where('role', 'student')->count();
        $subjects = Subject::all();
        // Assuming a Course model exists, count the total number of courses.
        // $totalCourses = Course::count(); // Uncomment and adjust if a Course model is available
        $totalCourses = 0; // Update to match actual data

        return view('admin.dashboard', compact('totalTeachers', 'totalStudents', 'totalCourses','subjects'));
    }
}

