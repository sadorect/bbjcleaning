@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Slider Management</h1>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Slide
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $slider->order }}</td>
                                <td>
                                    <img src="{{ Storage::url($slider->image) }}" 
                                         alt="{{ $slider->title }}" 
                                         style="height: 50px; object-fit: cover;">
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>
                                    <span class="badge bg-{{ $slider->active ? 'success' : 'danger' }}">
                                        {{ $slider->active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.sliders.edit', $slider) }}" 
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.sliders.destroy', $slider) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
