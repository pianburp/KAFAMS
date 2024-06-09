@extends('layouts.app')

@section('content')
    <h2>Welcome, {{ auth()->user()->name }}!</h2>

    <h3>Your Enrollments</h3>
    <ul>
        @foreach ($enrollments as $enrollment)
            <li>{{ $enrollment->program->program_name }}</li>
        @endforeach
    </ul>

    <h3>Your Results</h3>
    <ul>
        @foreach ($results as $result)
            <li>{{ $result->assessment->description }}: {{ $result->grade }}</li>
        @endforeach
    </ul>

    <h3>Bulletins</h3>
    <ul>
        @foreach ($bulletins as $bulletin)
            <li>{{ $bulletin->title }}</li>
        @endforeach
    </ul>
@endsection
