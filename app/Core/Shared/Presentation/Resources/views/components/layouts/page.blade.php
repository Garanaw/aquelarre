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
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/menu.js') }}" defer></script>
</head>
<body class="antialiased dark">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4">
    <x-shared::navbar.navbar />

    <div class="w-full mx-auto h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Page Content -->
        <main class="mt-28 flex justify-center">
            {{ $slot }}
        </main>

        @stack('modals')
    </div>
</div>
@yield('scripts')
</body>
</html>
