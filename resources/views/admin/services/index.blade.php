@extends('layouts.admin')

@section('title', 'Services Management')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold">Services</h2>
    <a href="{{ route('admin.services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Add New Service
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($services as $service)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="h-12 w-12 rounded">
                </td>
                <td class="px-6 py-4">{{ $service->name }}</td>
                <td class="px-6 py-4">{{ Str::limit($service->description, 100) }}</td>
                <td class="px-6 py-4">
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
