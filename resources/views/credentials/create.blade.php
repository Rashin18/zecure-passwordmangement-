@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-white border-bottom-0 d-flex align-items-center justify-content-between py-3">
                    <h4 class="mb-0 fw-bold text-success">
                        <i class="bi bi-plus-circle-fill me-2"></i> Add New Credential
                    </h4>
                    <a href="{{ route('credentials.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back
                    </a>
                </div>

                <div class="card-body px-4 py-4">

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('credentials.store') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" id="name" class="form-control rounded-3" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label fw-semibold">Website Name</label>
                            <input type="text" name="website" id="website" class="form-control rounded-3" value="{{ old('website') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username / Email</label>
                            <input type="text" name="username" id="username" class="form-control rounded-3" value="{{ old('username') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="text" name="password" id="password" class="form-control rounded-3" value="{{ old('password') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label fw-semibold">Website URL (Optional)</label>
                            <input type="url" name="link" id="link" class="form-control rounded-3" value="{{ old('link') }}">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select Category</option>
                                <option value="Work" {{ old('category', $credential->category ?? '') == 'Work' ? 'selected' : '' }}>Work</option>
                                <option value="Social" {{ old('category', $credential->category ?? '') == 'Social' ? 'selected' : '' }}>Social</option>
                                <option value="Banking" {{ old('category', $credential->category ?? '') == 'Banking' ? 'selected' : '' }}>Banking</option>
                                <option value="Other" {{ old('category', $credential->category ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg rounded-3">
                                <i class="bi bi-check2-circle me-1"></i> Save Credential
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
