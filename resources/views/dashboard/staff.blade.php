@extends('layouts.app')

@section('content')
    <h2>Welcome, Staff!</h2>

    <h3>Pending Enrollments</h3>
    <ul>
        @foreach ($pendingEnrollments as $enrollment)
            <li>{{ $enrollment->user->name }} - {{ $enrollment->program->program_name }}</li>
        @endforeach
    </ul>

    <h3>Upcoming Classes</h3>
    <ul>
        @foreach ($upcomingClasses as $class)
            <li>{{ $class->program->program_name }} - {{ $class->start_date }}</li>
        @endforeach
    </ul>

    <h3>Recent Attendance</h3>
    <ul>
        @foreach ($recentAttendance as $attendance)
            <li>{{ $attendance->enrollment->user->name }} - {{ $attendance->class->program->program_name }} - {{ $attendance->attendance_status }}</li>
        @endforeach
    </ul>

    <h3>Bulletins</h3>
    <ul>
        @foreach ($bulletins as $bulletin)
            <li>{{ $bulletin->title }}</li>
        @endforeach
    </ul>
@endsection
