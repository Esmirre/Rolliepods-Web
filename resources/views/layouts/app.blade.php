<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rolliepods')</title>

    <!-- Google Fonts: Quicksand & Fredoka -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    
    <!-- CSS Links -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Base styles */
        body { margin: 0; font-family: system-ui, -apple-system, sans-serif; color: #1e293b; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .site-logo { height: 50px; width: auto; object-fit: contain; }
        .footer-logo { height: 40px; width: auto; object-fit: contain; }
    </style>
</head>
<body>

    {{-- Include Header --}}
    @include('partials.header')

    {{-- Page Specific Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Include Footer --}}
    @include('partials.footer')

</body>
</html>
