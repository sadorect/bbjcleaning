@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Slide</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" 
                           value="{{ old('subtitle') }}" required>
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                              rows="3" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="button_text" 
                                   class="form-control @error('button_text') is-invalid @enderror" 
                                   value="{{ old('button_text') }}" required>
                            @error('button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Button Link</label>
                            <input type="text" name="button_link" 
                                   class="form-control @error('button_link') is-invalid @enderror" 
                                   value="{{ old('button_link') }}" required>
                            @error('button_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" 
                           min="0" value="{{ old('order', 0) }}" required>
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="active" value="1" class="form-check-input" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create Slide</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
