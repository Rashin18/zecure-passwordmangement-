@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-white border-bottom-0 d-flex align-items-center justify-content-between py-3">
                    <h4 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-pencil-square me-2"></i> Edit Credential
                    </h4>
                    <a href="{{ route('credentials.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-x-lg me-1"></i> Cancel
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

                    <form method="POST" action="{{ route('credentials.update', $credential->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Name Field --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" id="name" class="form-control rounded-3"
                                   value="{{ old('name', $credential->name) }}" required>
                        </div>

                        {{-- Website Name --}}
                        <div class="mb-3">
                            <label for="website" class="form-label fw-semibold">Website Name</label>
                            <input type="text" name="website" id="website" class="form-control rounded-3"
                                   value="{{ old('website', $credential->website) }}" required>
                        </div>

                        {{-- Username --}}
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username / Email</label>
                            <input type="text" name="username" id="username" class="form-control rounded-3"
                                   value="{{ old('username', $credential->username) }}" required>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="text" name="password" id="password" class="form-control rounded-3"
                                   value="{{ old('password', \Illuminate\Support\Facades\Crypt::decryptString($credential->password)) }}" required>
                        </div>

                        {{-- URL --}}
                        <div class="mb-3">
                            <label for="link" class="form-label fw-semibold">Website URL (Optional)</label>
                            <input type="url" name="link" id="link" class="form-control rounded-3"
                                   value="{{ old('link', $credential->link) }}">
                        </div>

                        {{-- Category --}}
                        <div class="mb-3">
                            <label for="category" class="form-label fw-semibold">Category</label>
                            <select name="category" class="form-select rounded-3">
                                <option value="">Select Category</option>
                                <option value="Work" {{ old('category', $credential->category) == 'Work' ? 'selected' : '' }}>Work</option>
                                <option value="Social" {{ old('category', $credential->category) == 'Social' ? 'selected' : '' }}>Social</option>
                                <option value="Banking" {{ old('category', $credential->category) == 'Banking' ? 'selected' : '' }}>Banking</option>
                                <option value="Other" {{ old('category', $credential->category) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                <i class="bi bi-save me-1"></i> Update Credential
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
