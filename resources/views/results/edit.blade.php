@extends('master')


@section('content')

<br>
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<form action="{{ route('result-update', $result->id) }}" method="POST" style="max-width: 500px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
    @csrf
    @method('POST')
  
    
    <div class="form-group" style="margin-bottom: 20px;">
        <label for="courseDropdown" style="display: block; font-weight: bold; margin-bottom: 5px;">Student Name</label>
        <select name="student_id" id="courseDropdown" class="form-control" 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="" disabled selected>Select Course</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    

  

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="courseDropdown" style="display: block; font-weight: bold; margin-bottom: 5px;">Course Name</label>
        <select name="course_id" id="courseDropdown" class="form-control" 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="" disabled selected>Select Course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->courseName }}</option>
            @endforeach
        </select>
    </div>
    
    
    <div class="form-group" style="margin-bottom: 20px;">
        <label for="exampleInputPassword1" style="display: block; font-weight: bold; margin-bottom: 5px;">Marks</label>
        <input type="number" class="form-control" name="marks" value="{{ $result->marks }}" placeholder="Course Code" 
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>
    
   
    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Submit</button>
  

@endsection