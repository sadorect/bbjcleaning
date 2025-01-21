@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Feature</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.features.update', $feature) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" 
                           name="title" 
                           class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title', $feature->title) }}" 
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" 
                              class="form-control @error('description') is-invalid @enderror" 
                              rows="3" 
                              required>{{ old('description', $feature->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Icon</label>
                    <div class="row row-cols-2 row-cols-md-4 g-3">
                        @foreach($icons as $class => $name)
                            <div class="col">
                                <div class="form-check icon-select">
                                    <input type="radio" 
                                           name="icon" 
                                           value="{{ $class }}" 
                                           class="form-check-input"
                                           {{ $feature->icon === $class ? 'checked' : '' }} 
                                           required>
                                    <label class="form-check-label">
                                        <i class="{{ $class }} fa-2x"></i>
                                        <span class="d-block mt-1">{{ $name }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('icon')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" 
                           name="order" 
                           class="form-control @error('order') is-invalid @enderror" 
                           min="0" 
                           value="{{ old('order', $feature->order) }}" 
                           required>
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" 
                               name="active" 
                               value="1" 
                               class="form-check-input"
                               {{ $feature->active ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update Feature</button>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
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
    transition: all 0.3s ease;
}
.icon-select:hover {
    background-color: #f8f9fa;
    transform: translateY(-2px);
}
.icon-select input:checked + label {
    color: #0d6efd;
}
</style>
@endsection
