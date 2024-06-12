
@extends('layouts.app')

@section('content')
<div class="container mt-4"></div>
<h2>Your Results for {{ $subject->name }}</h2>
<table>
    <thead>
        <tr>
            <th>Assessment</th>
            <th>Score</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
        <tr>
            <td>{{ $result->assessment->name }}</td>
            <td>{{ $result->score }}</td>
            <td>{{ $result->grade }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
