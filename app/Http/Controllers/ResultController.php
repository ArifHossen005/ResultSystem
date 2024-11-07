<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function add()
    {
        $students = Student::all(); 
        $courses = Course::all();   
        return view('results.add', compact('students', 'courses')); // Pass to view
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'marks' => 'required|numeric|min:0|max:100', 
        ]);

       
        $data = $request->only(['student_id', 'course_id', 'marks']);

       
        Result::create($data);
       
        return redirect()->back()->with('success', 'Result added successfully!');
    }

    public function manage()
{
    $results = Result::with(['student', 'course'])->get(); // Eager load student and course data
    return view('results.manage', compact('results'));
}


    public function edit($id)
    {
        $result = Result::find($id);
        $students = Student::all();
        $courses = Course::all();
        return view('results.edit', compact('result', 'students', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'marks' => 'required|numeric|min:0|max:100',
        ]);

        $result = Result::find($id);
        $data = $request->only(['student_id', 'course_id', 'marks']);
        $result->update($data);

        return redirect()->route('manage-result')->with('success', 'Result updated successfully.');
    }

    public function delete($id)
    {
        $result = Result::find($id);
        $result->delete();
        return redirect()->route('manage-result')->with('success', 'Result deleted successfully.');
    }
    
}
