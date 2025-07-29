<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Gestion Parc Informatique') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <header class="bg-white shadow-sm">
            <div class="container py-4 {{ auth()->user() && auth()->user()->isAdmin() ? 'admin-header' : 'employe-header' }}">
                {{ $header }}
            </div>
        </header>
        <main class="py-4">
            {{ $slot }}
        </main>
    </div>
</body>
</html>