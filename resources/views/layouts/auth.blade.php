<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col antialiased">
<header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
</header>
<main class="w-full lg:max-w-4xl max-w-[335px]">
    {{-- Here we need the alerts/notifications --}}
    @if (session('status'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="bg-blue-100 text-blue-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4">
            {{ session('warning') }}
        </div>
    @endif
    {{-- Here we need the validation errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Here is the main slot --}}
    {{ $slot }}
</main>
<footer class="w-full lg:max-w-4xl max-w-[335px] text-sm mt-6 text-center">
    <p class="text-gray-500 dark:text-gray-400">
        &copy; {{ date('Y') }} <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Aquelarre</a>. All rights reserved.
    </p>
</footer>
</body>
</html>
