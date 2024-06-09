@extends('layout')

@section('content')
    <h1>Results</h1>
    <a href="{{ route('results.create') }}">Create New Result</a>
    <ul>
        @foreach ($results as $result)
            <li>
                <a href="{{ route('results.show', $result->id) }}">{{ $result->user->name }} - {{ $result->score }} - {{ $result->grade }}</a>
                <a href="{{ route('results.edit', $result->id) }}">Edit</a>
                <form action="{{ route('results.destroy', $result->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
