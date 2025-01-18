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
                @if(Route::has('admin.users.index'))
                <a href="{{ route('admin.users.index') }}" class="block p-4 text-white hover:bg-blue-700">
                    <i class="fas fa-users mr-2"></i> Users
                </a>
                @endif
                @if(Route::has('admin.contacts.index'))
                <a href="{{ route('admin.contacts.index') }}" class="block p-4 text-white hover:bg-blue-700">
                    <i class="fas fa-envelope mr-2"></i> Contacts
                </a>
                @endif            </nav>
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
