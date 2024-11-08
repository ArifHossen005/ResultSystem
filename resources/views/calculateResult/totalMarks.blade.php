@extends('master')

@section('content')

<br>
<center>
    <table class="  table-bordered" style="background: #EEE2B5" height="200px" width="500px">
        <thead>
            <tr>
                <th>Student  Name</th>
                <th>Student  Roll</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($results as $student) 
          <tr>
            <td>{{$student->student->name}}</td>
            <td>{{$student->student->roll}}</td>
            <td>
              <a href="{{route('result-marks', $student->id)}}" class="btn btn-primary">SHOW</a>
              <a href="{{route('result-edit', $student->id)}}" class="btn btn-primary">EDIT</a>
            </td>
          </tr>

          
      
          @endforeach
       
  
          
        </tbody>
    </table>
</center>

@endsection