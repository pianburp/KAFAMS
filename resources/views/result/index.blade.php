@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Results</h1>
        <a href="{{ route('results.create') }}" class="btn btn-primary mb-3">Create New Result</a>
        <div class="list-group">
            @foreach ($results as $result)
                <a href="{{ route('results.show', $result->id) }}" class="list-group-item list-group-item-action">
                    {{ $result->user->name }} - {{ $result->score }} - {{ $result->grade }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
