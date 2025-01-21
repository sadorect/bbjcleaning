<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightbell Admin</title>
    <!-- Add these Bootstrap files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 min-h-screen">
            <div class="p-4">
                <h1 class="text-white text-2xl font-bold">Brightbell Admin</h1>
            </div>
            
            <nav class="mt-4">
                @if(Route::has('admin.dashboard'))
                <a href="{{ route('admin.dashboard') }}" class="block p-4 text-white hover:bg-blue-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                @endif

                @if(Route::has('admin.services.index'))
                <a href="{{ route('admin.services.index') }}" class="block p-4 text-white hover:bg-blue-700">
                    <i class="fas fa-broom mr-2"></i> Services
                </a>
                @endif

                @if(Route::has('admin.features.index'))
                <a href="{{ route('admin.features.index') }}" class="block p-4 text-white hover:bg-blue-700">
                    <i class="fas fa-broom mr-2"></i> Features
                </a>
                @endif

                @if(Route::has('admin.users.index'))
                <a href="{{ route('admin.users.index') }}" class="block p-4 text-white hover:bg-blue-700">
                    <i class="fas fa-users mr-2"></i> Users
                </a>
                @endif

                @if(Route::has('admin.contacts.index'))
                <a href="{{ route('admin.contacts.index') }}" class="block p-4 text-white hover:bg-blue-700">
                    <i class="fas fa-envelope mr-2"></i> Contacts
                </a>
                @endif

                <!-- Add this inside the nav section -->
@if(Route::has('admin.bookings.index'))
<a href="{{ route('admin.bookings.index') }}" 
   class="block p-4 text-white hover:bg-blue-700 {{ request()->routeIs('admin.bookings.*') ? 'bg-blue-700' : '' }}">
    <i class="fas fa-calendar-check mr-2"></i> 
    Bookings
    @php
        $pendingBookings = \App\Models\Booking::where('status', 'pending')->count();
    @endphp
    @if($pendingBookings > 0)
        <span class="float-right bg-red-500 text-white rounded-full px-2 py-1 text-xs">
            {{ $pendingBookings }}
        </span>
    @endif
</a>
@endif

                <!-- New Recruitment Section -->
                <div class="p-4 text-gray-400 text-sm">
                    <span>RECRUITMENT</span>
                </div>
                
                @if(Route::has('admin.applications.index'))
                <a href="{{ route('admin.applications.index') }}" 
                   class="block p-4 text-white hover:bg-blue-700 {{ request()->routeIs('admin.applications.*') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-briefcase mr-2"></i> 
                    Job Applications
                    @php
                        $pendingCount = \App\Models\JobApplication::where('status', 'pending')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <span class="float-right bg-red-500 text-white rounded-full px-2 py-1 text-xs">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>
                @endif
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="p-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold">@yield('title')</h2>
                    <div class="flex items-center">
                        <span class="mr-4">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
