<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/static/favicon.ico') }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/menu.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    @stack('scripts')
</head>
<body class="antialiased dark">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4">
    <x-shared::navbar.navbar />

    <div class="w-full mx-auto mt-20 h-screen bg-gray-100 dark:bg-gray-900">
        <main id="app"></main>
    </div>
</div>
</body>
</html>

