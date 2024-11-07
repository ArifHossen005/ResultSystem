@extends('master')

@section('content')

<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br>

    <a href="{{ route('add-student') }}" class="btn btn-primary">Add Student</a>

    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 10px; border: 1px solid #ddd;">Serial Number</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Roll Number</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Class</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
        </tr>
        @foreach ($students as $student)
            <tr style="border: 1px solid #ddd;">
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $loop->iteration }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $student->name }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $student->roll }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $student->class }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">
                    <a href="{{ route('student-edit', $student->id) }}" style="margin-right: 5px; color: blue; text-decoration: none;">Edit</a>
                    <form action="{{ route('student-delete', $student->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    
</div>

@endsection
