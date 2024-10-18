<?php

namespace App\Admin\Controller;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectCategory;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $categories = SubjectCategory::all();
        return view('admin.subject.index', compact('subjects', 'categories'));
    }

    public function store(Request $request)
    {
        if ($request->has('category_name')) {
            // Create a new category
            $request->validate(['category_name' => 'required|string']);
            SubjectCategory::create(['name' => $request->category_name]);
        } else {
            // Create a new subject
            $request->validate([
                'subject_name' => 'required|string',
                'category_id' => 'required|exists:subject_categories,id',
            ]);
            Subject::create([
                'name' => $request->subject_name,
                'category_id' => $request->category_id,
            ]);
        }

        return redirect()->route('admin.subject.index')->with('success', 'Created successfully!');
    }

    public function update(Request $request, $id)
    {
        if ($request->has('edit_category_name')) {
            // Update category
            $category = SubjectCategory::findOrFail($id);
            $request->validate(['edit_category_name' => 'required|string']);
            $category->update(['name' => $request->edit_category_name]);
        } else {
            // Update subject
            $subject = Subject::findOrFail($id);
            $request->validate([
                'edit_subject_name' => 'required|string',
                'edit_category_id' => 'required|exists:subject_categories,id',
            ]);
            $subject->update([
                'name' => $request->edit_subject_name,
                'category_id' => $request->edit_category_id,
            ]);
        }

        return redirect()->route('admin.subject.index')->with('success', 'Updated successfully!');
    }
}
