@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-4">
    <div class="p-3 mb-3 bg-light rounded">
            <h4>Sidebar</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FAQs</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Form -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Item</h5>
                <form method="POST" action="{{ route('items.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter name" value="{{ $item->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Description</label>
                        <textarea class="form-control" id="descriptionInput" name="description" rows="3">{{ $item->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="statusSelect" class="form-label">Status</label>
                        <select class="form-select" id="statusSelect" name="status">
                            <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dateInput" class="form-label">Date</label>
                        <input type="date" class="form-control" id="dateInput" name="date" value="{{ $item->date }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
