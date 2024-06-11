@extends('layouts.app')

@section('content')
<head>
    <style>
        body {
  background-color: #228B22; /* Example light gray background */
}
    </style>
</head>
    <h2>Welcome, {{ auth()->user()->name }}!</h2>

    <h3>Your Enrollments</h3>
    

    <h3>Your Results</h3>
   

    <h3>Bulletins</h3>
    
@endsection
