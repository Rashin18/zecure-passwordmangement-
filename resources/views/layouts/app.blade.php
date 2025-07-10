<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Password Vault') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Fonts (Optional) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    body {
        background: url('{{ asset('images/welcome1.png') }}') no-repeat center center fixed;
        background-size: cover;
    }
</style>
</head>
<body class="bg-light text-dark">

    <!-- Navigation Bar -->
    @auth
        @include('layouts.navigation') {{-- Your Bootstrap navigation component --}}
    @endauth

    <!-- Optional Header -->
    @isset($header)
        <header class="bg-white shadow-sm border-bottom py-3 mb-4">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Main Content -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Bootstrap 5 JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
