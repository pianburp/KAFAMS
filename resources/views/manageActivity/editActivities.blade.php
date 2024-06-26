@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Item</h5>
        <form method="POST" action="{{ route('manageActivity/update', $item->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" class="form-control" id="nameInput" name="program_name" placeholder="Enter name"
                    value="{{ $item->program_name }}">
            </div>
            <div class="mb-3">
                <label for="descriptionInput" class="form-label">Description</label>
                <textarea class="form-control" id="descriptionInput" name="program_description"
                    rows="3">{{ $item->program_description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="dateInput" class="form-label">Date</label>
                <input type="date" class="form-control" id="dateInput" name="program_date" value="{{ $item->program_date }}">
            </div>
            <div class="mb-3">
                <label for="statusSelect" class="form-label">Status</label>
                <select class="form-control" id="statusSelect" name="program_status">
                    <option value="1" {{ $item->program_status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$item->program_status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
