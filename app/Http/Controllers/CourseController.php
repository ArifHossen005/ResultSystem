<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function add()
    {
        return view('courses.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'courseName' => 'required',
            'courseCode' => 'required',
        ]);

        $data =$request->all();
        Course::create($data);
        return redirect()->route('manage-course')->with('success', 'Course added successfully.');
    }

    public function manage()
    {
        $courses = Course::all();
        return view('courses.manage', compact('courses'));
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'courseName' => 'required',
            'courseCode' => 'required',
        ]);

        $course = Course::find($id);
        $data = $request->all();
        $course->update($data);
        return redirect()->route('manage-course')->with('success', 'Course updated successfully.');
    }

    public function delete($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('manage-course')->with('success', 'Course deleted successfully.');
    }





    
}
