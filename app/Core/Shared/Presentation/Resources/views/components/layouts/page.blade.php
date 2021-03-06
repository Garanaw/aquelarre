<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4">
    <x-shared::layouts.page-header />

    <div class="w-full mx-auto h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @stack('modals')
    </div>
</div>
@yield('scripts')
</body>
</html>
