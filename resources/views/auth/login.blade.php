@extends('layouts.guest')

@section('content')
<div class="container d-flex align-items-center justify-content-center h-100">
    <div class="col-md-6 col-lg-5">
        <div class="auth-card text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="auth-logo mx-auto d-block">
            <h1 class="text-3xl mb-2">ZeCuRe</h1>

                <h2 class="mb-4">Login to Your Account</h2>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3 form-check text-start">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="d-block mb-3 text-muted">Forgot your password?</a>
                @endif

                <p class="text-muted">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="fw-bold text-body"><u>Register here</u></a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
