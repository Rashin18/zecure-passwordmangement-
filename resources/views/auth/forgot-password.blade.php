@extends('layouts.guest')

@section('content')
<div class="container d-flex align-items-center justify-content-center h-100">
    <div class="col-md-6 col-lg-5">
        <div class="auth-card text-center">
        <img src="{{ asset('images/logo.svg') }}" alt="Zecure Logo" class="h-13 w-auto mx-auto mb-3 block">
        <h1 class="text-2xl font-extrabold mb-4">ZeCuRe by Groware Global</h1>

            <h2 class="mb-4">Forgot Password</h2>

            @if (session('status'))
                <div class="alert alert-success text-start">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">
                    Send Password Reset Link
                </button>

                <p class="text-muted">
                    Remember your password?
                    <a href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection