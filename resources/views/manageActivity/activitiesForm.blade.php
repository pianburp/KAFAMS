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
                <h5 class="card-title">Form Title</h5>
                <form action="{{ route('manageActivity/store') }}" method="POST">
                @csrf 
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameInput" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Description</label>
                        <textarea class="form-control" id="descriptionInput" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="statusSelect" class="form-label">Status</label>
                        <select class="form-select" id="statusSelect">
                            <option selected>Choose...</option>
                            <option value="1">Approve</option>
                            <option value="0">Not Approve</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dateInput" class="form-label">Date</label>
                        <input type="date" class="form-control" id="dateInput">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
