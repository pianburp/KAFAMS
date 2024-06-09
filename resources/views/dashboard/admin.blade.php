@extends('layouts.app')

@section('content')
    <h2>Welcome, Admin!</h2>

    <h3>Overview</h3>
    <ul>
        <li>Total Students: {{ $totalStudents }}</li>
        <li>Total Staff: {{ $totalStaff }}</li>
        <li>Total Enrollments: {{ $totalEnrollments }}</li>
    </ul>

    <h3>Recent Enrollments</h3>
    <ul>
        @foreach ($recentEnrollments as $enrollment)
            <li>{{ $enrollment->user->name }} - {{ $enrollment->program->program_name }}</li>
        @endforeach
    </ul>

    <h3>Upcoming Classes</h3>
    <ul>
        @foreach ($upcomingClasses as $class)
            <li>{{ $class->program->program_name }} - {{ $class->start_date }}</li>
        @endforeach
    </ul>

    <h3>Recent Bulletins</h3>
    <ul>
        @foreach ($recentBulletins as $bulletin)
            <li>{{ $bulletin->title }}</li>
        @endforeach
    </ul>
@endsection
