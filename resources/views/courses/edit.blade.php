@extends('master')

@section('content')


<form action="{{ route('course-update', $course->id) }}" method="POST" style="max-width: 500px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
  @csrf
  @method('POST')
  <div class="form-group" style="margin-bottom: 20px;">
    <label for="exampleInputPassword1" style="display: block; font-weight: bold; margin-bottom: 5px;">Course Name</label>
    <input type="text" class="form-control" name="courseName" value="{{ $course->courseName }}" placeholder="Class" 
           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
</div>

<div class="form-group" style="margin-bottom: 20px;">
    <label for="exampleInputPassword1" style="display: block; font-weight: bold; margin-bottom: 5px;">Course Code</label>
    <input type="number" class="form-control" name="courseCode" placeholder="Course Code"  value="{{ $course->courseCode }}"
           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
</div>
  <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Submit</button>
</form>


  @endsection