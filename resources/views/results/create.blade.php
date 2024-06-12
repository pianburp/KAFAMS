@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Result</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('manageResult.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id" class="form-control" value="{{ old('user_id') }}"> 
        </div>
        
        <div class="form-group">
            <label for="assessment_id">Assessment ID:</label>
            <input type="text" name="assessment_id" id="assessment_id" class="form-control" value="{{ old('assessment_id') }}"> 
        </div>
        
        <div class="form-group">
            <label for="score">Score:</label>
            <input type="text" name="score" id="score" class="form-control" value="{{ old('score') }}"> 
        </div>
        
        <div class="form-group">
            <label for="grade">Grade:</label>
            <select name="grade" id="grade" class="form-control">
                <option value="A" {{ old('grade') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('grade') == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ old('grade') == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ old('grade') == 'D' ? 'selected' : '' }}>D</option>
                <option value="F" {{ old('grade') == 'F' ? 'selected' : '' }}>F</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
