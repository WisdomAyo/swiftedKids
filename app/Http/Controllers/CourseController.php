<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:50',
            'program_duration' => 'required|string|max:50',
            'age_range' => 'required|string|max:10',
            'is_paid' => 'required|boolean',
            'amount' => 'nullable|numeric',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'youtube_link' => 'nullable|url'
        ]);

        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->language = $request->language;
        $course->program_duration = $request->program_duration;
        $course->age_range = $request->age_range;
        $course->is_paid = $request->is_paid;
        $course->amount = $request->amount;
        $course->course_image = $request->course_image;
        $course->youtube_link = $request->youtube_link;
        $course->teacher_id = auth()->user()->id;

        if ($request->hasFile('course_image')) {
            $course->course_image = $request->file('course_image')->store('course_images', 'public');
        }
        $course->save();

        return redirect()->route('teacher.dashboard', $course->id);
    }
}
