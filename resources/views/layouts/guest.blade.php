<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

   

    <title>{{ config('app.name', 'Password Vault') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: url('{{ asset('images/welcome1.png') }}') no-repeat center center fixed;
            background-size: cover;
            background-color: #0b1e3b;
        }

        .auth-card {
            background: white;
    color: #111827; /* Dark text for contrast */
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 1.5rem;
    padding: 3rem 2rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    max-width: 600px;
    width: 100%;
    animation: fadeIn 1.2s ease-out;
        }

        .auth-logo {
            width: 90px;
            margin-bottom: 1rem;
            
        }
        .auth-logo h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: yellow;
        }
        .auth-logo h2 {
            color: white;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        .auth-logo:hover {
            transform: scale(1.05);
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <main class="w-100">
        @yield('content')
    </main>
</body>
</html>
