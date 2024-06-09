@extends('layouts.app')

@section('title', 'Listing Table')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="card-title mb-0">View Activity</h2>
    <a href="{{ route('manageActivity/create') }}" class="btn btn-success">Create Activity</a>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item as $program)
                <tr>
                    <td>{{ $program->program_name }}</td>
                    <td>{{ $program->program_description }}</td>
                    <td>{{ $program->program_status ? 'Active' : 'Inactive' }}</td>
                    <td>{{ \Carbon\Carbon::parse($program->program_date)->format('d-m-Y') }}</td>
                    <td>
                        <!-- Update Button -->
                        <a href="{{ route('manageActivity/edit', $program->id) }}" class="btn btn-primary mb-1">
                            Update
                        </a>
                        <!-- Delete Button -->
                        <form action="{{ route('manageActivity/delete', $program->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this activity?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection