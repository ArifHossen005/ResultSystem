@extends('master')

@section('content')

<br>
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<form action="{{ route('result-update', $result->id) }}" method="POST" style="max-width: 700px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
    @csrf
    @method('POST')
    
    <div class="row" style="display: flex; gap: 10px;">
        <!-- Student Name -->
        <div class="form-group" style="flex: 1;">
            <label for="studentName" style="font-weight: bold;">Student Name</label>
            <select name="student_id" id="studentName" class="form-control">
                <option value="" disabled>Select Name</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $result->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Student Roll -->
        <div class="form-group" style="flex: 1;">
            <label for="studentRoll" style="font-weight: bold;">Student Roll</label>
            <select name="student_id" id="studentRoll" class="form-control">
                <option value="" disabled>Select Roll</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $result->student_id == $student->id ? 'selected' : '' }}>{{ $student->roll }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Student Class -->
        <div class="form-group" style="flex: 1;">
            <label for="studentClass" style="font-weight: bold;">Student Class</label>
            <select name="student_id" id="studentClass" class="form-control">
                <option value="" disabled>Select Class</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $result->student_id == $student->id ? 'selected' : '' }}>{{ $student->class }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row" style="display: flex; gap: 10px; margin-top: 20px;">
        <!-- Course Name -->
        <div class="form-group" style="flex: 1;">
            <label for="courseName" style="font-weight: bold;">Course Name</label>
            <select name="course_id" id="courseName" class="form-control">
                <option value="" disabled>Select Course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $result->course_id == $course->id ? 'selected' : '' }}>{{ $course->courseName }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Course Code -->
        <div class="form-group" style="flex: 1;">
            <label for="courseCode" style="font-weight: bold;">Course Code</label>
            <select name="course_id" id="courseCode" class="form-control">
                <option value="" disabled>Select Course Code</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $result->course_id == $course->id ? 'selected' : '' }}>{{ $course->courseCode }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Marks -->
        <div class="form-group" style="flex: 1;">
            <label for="marks" style="font-weight: bold;">Marks</label>
            <input type="number" class="form-control" name="marks" value="{{ old('marks', $result->marks) }}" placeholder="Marks">
        </div>
    </div>

    <!-- Submit Button Row -->
    <div class="row" style="margin-top: 20px; text-align: center;">
        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
            Submit
        </button>
    </div>
</form>

@endsection
