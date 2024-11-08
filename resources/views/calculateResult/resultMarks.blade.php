@extends('master')

@section('content')

<br>
<center>
    <table class="  table-bordered" style="background: #EEE2B5" height="200px" width="500px">
        <thead>
            <tr></tr>
                <th>Course  Name</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalMarks = 0;
            @endphp
        
            @if(!empty($marks) && is_iterable($marks))
                @foreach ($marks as $student)
                    <tr>
                        <td>{{ $student->course[0]->courseName ?? 'N/A' }}</td>
                        <td>{{ $student->marks ?? 'N/A' }}</td>
                    </tr>
        
                    @php
                        // Add the student's marks to the total, if marks exist
                        $totalMarks += $student->marks ?? 0;
                    @endphp
                @endforeach
            @else
                <tr>
                    <td colspan="3">No marks available</td>
                </tr>
            @endif
        
            <tr>
                <td><strong>Total Marks</strong></td>
                <td><strong>{{ $totalMarks }}</strong></td>
            </tr>
        </tbody>
        
    </table>
</center>
@endsection