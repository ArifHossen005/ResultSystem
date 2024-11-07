<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function add()
    {
        return view('students.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'roll' => 'required',
            'class' => 'required',
           
        ]);

        $data =$request->all();
        Student::create($data);
        return redirect()->route('manage-student')->with('success', 'Student added successfully.');
    }

    public function manage()
    {
        $students = Student::all();
        return view('students.manage', compact('students'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'roll' => 'required',
            'class' => 'required',
        ]);

        $student = Student::find($id);
        $data = $request->all();
        $student->update($data);
        return redirect()->route('manage-student')->with('success', 'Student updated successfully.');
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('manage-student')->with('success', 'Student deleted successfully.');
    }





    
}
