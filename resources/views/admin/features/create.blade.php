@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Feature</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.features.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Icon</label>
                    <div class="row row-cols-2 row-cols-md-4 g-3">
                        @foreach($icons as $class => $name)
                            <div class="col">
                                <div class="form-check icon-select">
                                    <input type="radio" name="icon" value="{{ $class }}" 
                                           class="form-check-input" required>
                                    <label class="form-check-label">
                                        <i class="{{ $class }} fa-2x"></i>
                                        <span class="d-block mt-1">{{ $name }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" min="0" value="0" required>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="active" value="1" class="form-check-input" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create Feature</button>
            </form>
        </div>
    </div>
</div>

<style>
.icon-select {
    text-align: center;
    padding: 1rem;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    cursor: pointer;
}
.icon-select:hover {
    background-color: #f8f9fa;
}
.icon-select input:checked + label {
    color: #0d6efd;
}
</style>
@endsection
