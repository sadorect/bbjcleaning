@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                <i class="fas fa-broom text-white text-2xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Services</h3>
                <span class="text-2xl font-bold">{{ $stats['services'] }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-500 bg-opacity-75">
                <i class="fas fa-envelope text-white text-2xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Contact Requests</h3>
                <span class="text-2xl font-bold">{{ $stats['contacts'] ?? 'No contacts' }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-500 bg-opacity-75">
                <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Users</h3>
                <span class="text-2xl font-bold">{{ $stats['users'] }}</span>
            </div>
        </div>
    </div>
</div>

<div class="mt-8 bg-white rounded-lg shadow">
    <div class="p-6">
        <h3 class="text-xl font-semibold mb-4">Recent Activity</h3>
        <!-- Add recent activity content here -->
    </div>
</div>
@endsection
