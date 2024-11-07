@extends('master')

@section('content')

<br>
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<form action="{{ route('store-result') }}" method="POST" style="max-width: 1000px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
    @csrf
    @method('POST')

    <table class="table table-bordered" style="margin-bottom: 20px;">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Roll</th>
                <th>Class</th>
                <th>Course</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody id="dynamic-field-container">
            <tr>
                <td>
                    <select name="student_id[]" id="student_id_0" class="form-control">
                        <option value="" disabled selected>Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="roll[]" id="roll_0" class="form-control">
                        <option value="" disabled selected>Select Roll</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->roll }}">{{ $student->roll }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="class[]" id="class_0" class="form-control">
                        <option value="" disabled selected>Select Class</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->class }}">{{ $student->class }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="course_id[]" id="course_id_0" class="form-control">
                        <option value="" disabled selected>Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="marks[]" id="marks_0" placeholder="Marks">
                </td>
            </tr>
        </tbody>
    </table>

    <button type="button" id="add-row" class="btn btn-secondary" style="width: 100%; padding: 10px; margin-bottom: 20px; background-color: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer;">
        Add Another Entry
    </button>

    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
        Submit
    </button>
</form>

<script>
    let rowCount = 1; // Counter to generate unique IDs for each new row

    document.getElementById('add-row').addEventListener('click', function() {
        const container = document.getElementById('dynamic-field-container');

        // Create a new row with unique IDs for Course and Marks fields
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
           <td colspan="3"></td>
         
            <td>
                <select name="course_id[]" id="course_id_${rowCount}" class="form-control">
                    <option value="" disabled selected>Select Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" class="form-control" name="marks[]" id="marks_${rowCount}" placeholder="Marks">
            </td>
        `;

        container.appendChild(newRow);
        rowCount++; // Increment the counter to ensure unique IDs
    });
</script>

@endsection
