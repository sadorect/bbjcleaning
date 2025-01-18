<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Brightbell Cleaning Services</title>
    
    <!-- Essential Styles Only -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    @include('partials.contact-header')
    
    @yield('content')
    
    @include('partials.contact-footer')

    <!-- Minimal Required Scripts -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
</body>
</html>
