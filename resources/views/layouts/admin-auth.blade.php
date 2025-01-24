<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Authentication - Brightbell</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Logo/Branding Area -->
        <div class="fixed top-0 left-0 p-6">
            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                Brightbell User Reset
            </a>
        </div>

        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        <div class="fixed bottom-0 w-full p-4 text-center text-gray-600">
            <p>© {{ date('Y') }} Brightbell. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
