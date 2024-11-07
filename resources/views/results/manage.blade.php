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

    <a href="{{ route('add-result') }}" class="btn btn-primary">Add Marks</a>

    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 10px; border: 1px solid #ddd;">Serial Number</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Student Name</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Course Name</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Course Code</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Marks</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
        </tr>
        @foreach ($results as $result)
            <tr style="border: 1px solid #ddd;">
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $loop->iteration }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $result->student->name }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $result->course->courseName }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $result->course->courseCode }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $result->marks }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">
                    <a href="{{ route('result-edit', $result->id) }}" style="margin-right: 5px; color: blue; text-decoration: none;">Edit</a>
                    <form action="{{ route('result-delete', $result->id) }}" method="POST" style="display: inline;">
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
