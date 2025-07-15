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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom Manual CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: url('{{ asset('images/welcome1.png') }}') no-repeat center center fixed;
            background-size: cover;
            color: #212529;
        }
        .navbar, .card, .table {
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 0.75rem;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .btn-outline-success, .btn-outline-primary, .btn-outline-danger, .btn-outline-secondary {
            transition: all 0.2s ease-in-out;
        }
        .btn-outline-success:hover {
            background-color: #198754;
            color: #fff;
        }
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navigation -->
    @auth
        @include('layouts.navigation')
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>