@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Result</h1>
        <form action="{{ route('results.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" name="user_id" id="user_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="assessment_id">Assessment ID:</label>
                <input type="text" name="assessment_id" id="assessment_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="score">Score:</label>
                <input type="text" name="score" id="score" class="form-control">
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <select name="grade" id="grade" class="form-control">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
