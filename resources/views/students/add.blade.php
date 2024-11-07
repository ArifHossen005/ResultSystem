@extends('master')


@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
    
@endif

<form action="{{ route('store-student') }}" method="POST" style="max-width: 500px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
  @csrf
  @method('POST')
  <div class="form-group" style="margin-bottom: 15px;">
      <label for="exampleInputEmail1" style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter Your name" 
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
  </div>
  
  <div class="form-group" style="margin-bottom: 15px;">
      <label for="exampleInputPassword1" style="display: block; font-weight: bold; margin-bottom: 5px;">Roll Number</label>
      <input type="number" name="roll" class="form-control" placeholder="Roll Number" 
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
  </div>
  
  <div class="form-group" style="margin-bottom: 20px;">
      <label for="exampleInputPassword1" style="display: block; font-weight: bold; margin-bottom: 5px;">Class</label>
      <input type="number" class="form-control" name="class" placeholder="Class" 
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
  </div>
 
  <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Submit</button>

</form>
  @endsection