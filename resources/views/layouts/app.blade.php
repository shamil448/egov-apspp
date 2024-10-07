<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Link ke file CSS -->
</head>
<body>
    <div class="container">
        @yield('content') <!-- Tempat konten spesifik dari setiap halaman -->
    </div>
</body>
</html>