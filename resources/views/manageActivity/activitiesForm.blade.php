@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Form -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                    <h2 class="card-title mb-0">Add Activity</h2>
                <br>
                <form action="{{ route('manageActivity/store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameInput" placeholder="Enter activity name">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection