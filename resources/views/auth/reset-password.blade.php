@extends('layouts.guest')

@section('content')
<div class="container d-flex align-items-center justify-content-center h-100">
    <div class="col-md-6 col-lg-5">
        <div class="auth-card text-center">
        <img src="{{ asset('images/logo.svg') }}" alt="Zecure Logo" class="h-13 w-auto mx-auto mb-3 block">
        <h1 class="text-2xl font-extrabold mb-4">ZeCuRe by Groware Global</h1>

            <h2 class="mb-4">Reset Password</h2>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" class="form-control" required autofocus>
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3 text-start">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100 mb-3">Reset Password</button>

                <p class="text-muted">
                    Back to <a href="{{ route('login') }}" class="fw-bold text-body"><u>Login</u></a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection