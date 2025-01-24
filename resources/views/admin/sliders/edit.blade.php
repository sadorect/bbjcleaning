@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Slide</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title', $slider->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" 
                           value="{{ old('subtitle', $slider->subtitle) }}" required>
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                              rows="3" required>{{ old('description', $slider->description) }}</textarea>
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
                                   value="{{ old('button_text', $slider->button_text) }}" required>
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
                                   value="{{ old('button_link', $slider->button_link) }}" required>
                            @error('button_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label>
                    <div class="mb-2">
                        <img src="{{ Storage::url($slider->image) }}" alt="Current Image" style="max-height: 200px;">
                    </div>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    <small class="text-muted">Leave empty to keep current image</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" 
                           min="0" value="{{ old('order', $slider->order) }}" required>
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="active" value="1" class="form-check-input" 
                               {{ $slider->active ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Slide</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
