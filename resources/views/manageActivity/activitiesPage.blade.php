@extends('layouts.app')

@section('title', 'Listing Table')

@section('content')
<div class="d-flex justify-content-between align-items-center">
                    <h2 class="card-title mb-0">View Activity</h2>
                    <a href="{{ route('manageActivity/create') }}" class="btn btn-success">Create Activity</a>
                </div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($items))
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->name ? $item->name : 'null' }}</td>
                        <td>{{ $item->date ? $item->date : 'null' }}</td>
                        <td>{{ $item->status ? $item->status : 'null' }}</td>
                        <td>
                            <button class="btn btn-info btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No items found</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection