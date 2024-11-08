<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\CalculateMarks;

class CalculateMarksController extends Controller
{
    public function index()
    {
        $results = Result::with('student')->get();
        return view('calculateResult.totalMarks', compact('results'));
    }

    public function resultMarks($id)
    {
       $marks = CalculateMarks::with('course')->where('result_id', $id)->get();
        return view('calculateResult.resultMarks', compact('marks'));
    }

    public function edit($id)
    {
        $students = Student::all(); 
        $courses = Course::all();
        $result = Result::with('calculateMarks')->find($id);
        return view('calculateResult.edit', compact('result','students', 'courses'));
    }

    public function update(Request $request, $id)
    {
      
        return $marks = Result::find($id);
        $data = $request->only(['marks']);
        $marks->update($data);
        return redirect()->route('totalMarks')->with('success', 'Marks updated successfully!');
    }

 
}
