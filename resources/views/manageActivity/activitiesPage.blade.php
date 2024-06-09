@extends('layouts.app')

@section('title', 'Listing Table')

@section('content')
<div class="container">
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display Error Message -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
    @forelse ($item as $program)
        <tr>
            <td>{{ $program->program_name }}</td>
            <td>{{ $program->program_description }}</td>
            <td>{{ $program->program_status ? 'Approve' : 'Not Approve' }}</td>
            <td>{{ \Carbon\Carbon::parse($program->program_date)->format('d-m-Y') }}</td>
            <td>
                <!-- Update Button -->
                <a href="{{ route('manageActivity/edit', $program->id) }}" class="btn btn-primary mb-1">
                    Update
                </a>
                <br>
                <!-- Delete Button -->
                <form action="{{ route('manageActivity/delete', $program->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this activity?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No activity found</td>
        </tr>
    @endforelse
</tbody>

    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
    window.onload = function() {
        setTimeout(function() {
            if (document.getElementById('success-alert')) {
                $('#success-alert').fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }
            if (document.getElementById('error-alert')) {
                $('#error-alert').fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }
        }, 1);
    };
</script>
@endsection