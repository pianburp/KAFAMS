@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Result Details</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>User ID:</strong> {{ $result->user_id }}</p>
                <p><strong>Assessment ID:</strong> {{ $result->assessment_id }}</p>
                <p><strong>Score:</strong> {{ $result->score }}</p>
                <p><strong>Grade:</strong> {{ $result->grade }}</p>
            </div>
        </div>
        <a href="{{ route('results.edit', $result->id) }}" class="btn btn-primary mt-3">Edit</a>
        <form action="{{ route('results.destroy', $result->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Delete</button>
        </form>
        <a href="{{ route('results.index') }}" class="btn btn-secondary mt-3">Back to Results</a>
    </div>
@endsection
