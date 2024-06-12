@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Result</h1>
        <form action="{{ route('manageResult.update', $result->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $result->user_id }}">
            </div>

            <div class="form-group">
                <label for="assessment_id">Assessment ID:</label>
                <input type="text" name="assessment_id" id="assessment_id" class="form-control" value="{{ $result->assessment_id }}">
            </div>

            <div class="form-group">
                <label for="score">Score:</label>
                <input type="text" name="score" id="score" class="form-control" value="{{ $result->score }}">
            </div>

            <div class="form-group">
                <label for="grade">Grade:</label>
                <select name="grade" id="grade" class="form-control">
                    <option value="A" {{ $result->grade == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $result->grade == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ $result->grade == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ $result->grade == 'D' ? 'selected' : '' }}>D</option>
                    <option value="F" {{ $result->grade == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
