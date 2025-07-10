@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <h2 class="fw-bold mb-0 text-primary">
            <i class="bi bi-shield-lock-fill me-2"></i> My Password Vault
        </h2>

        <!-- Search + Filter -->
        <form action="{{ route('credentials.index') }}" method="GET" class="d-flex align-items-center gap-2 flex-wrap">
            <input type="text" name="search" class="form-control shadow-sm rounded-pill px-4"
                   placeholder="Search by website, username or name..." value="{{ request('search') }}" />

            <select name="category" class="form-select rounded-pill shadow-sm">
                <option value="">All Categories</option>
                <option value="Work" {{ request('category') == 'Work' ? 'selected' : '' }}>Work</option>
                <option value="Social" {{ request('category') == 'Social' ? 'selected' : '' }}>Social</option>
                <option value="Banking" {{ request('category') == 'Banking' ? 'selected' : '' }}>Banking</option>
                <option value="Other" {{ request('category') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>

            <button type="submit" class="btn btn-outline-secondary rounded-pill">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <!-- Action Buttons -->
        <div class="d-flex gap-2">
            <a href="{{ route('credentials.export.pdf') }}" class="btn btn-outline-dark rounded-pill">
                <i class="bi bi-file-earmark-pdf"></i> Export PDF
            </a>
            <a href="{{ route('credentials.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Add Credential
            </a>
            <a href="{{ route('credentials.trash') }}" class="btn btn-outline-danger rounded-pill">
                <i class="bi bi-trash3"></i> View Trash
            </a>
        </div>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Credentials Table -->
    @if($credentials->isEmpty())
        <div class="text-center text-muted py-5">
            <i class="bi bi-box-seam" style="font-size: 3rem;"></i>
            <p class="mt-3">You haven't added any credentials yet.</p>
        </div>
    @else
        <div class="table-responsive shadow-sm rounded-3">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th>Website</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Link</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($credentials as $credential)
                        <tr>
                            <td class="fw-semibold text-primary">
                                <i class="bi bi-globe2 me-1"></i>{{ $credential->website }}
                            </td>
                            <td>{{ $credential->name ?? '-' }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $credential->category ?? 'N/A' }}</span>
                            </td>
                            <td>
                                @if($credential->link)
                                    <a href="{{ $credential->link }}" target="_blank" class="text-decoration-none text-info">
                                        {{ \Illuminate\Support\Str::limit($credential->link, 30) }}
                                    </a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>{{ $credential->username }}</td>
                            <td>
                                <div class="input-group">
                                    <input type="password"
                                           class="form-control bg-light rounded-start"
                                           id="password-{{ $credential->id }}"
                                           value="{{ \Illuminate\Support\Facades\Crypt::decryptString($credential->password) }}"
                                           readonly>
                                    <button type="button" class="btn btn-outline-secondary"
                                            onclick="togglePassword({{ $credential->id }})">
                                        <i class="bi bi-eye" id="icon-{{ $credential->id }}"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-success"
                                            onclick="copyPassword({{ $credential->id }})">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('credentials.edit', $credential->id) }}"
                                   class="btn btn-sm btn-outline-primary me-2 rounded-pill">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                <form action="{{ route('credentials.destroy', $credential->id) }}" method="POST"
                                      class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Toggle/Copy JS -->
<script>
    function togglePassword(id) {
        const input = document.getElementById('password-' + id);
        const icon = document.getElementById('icon-' + id);

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }

    function copyPassword(id) {
        const input = document.getElementById('password-' + id);
        navigator.clipboard.writeText(input.value)
            .then(() => alert('Password copied to clipboard!'))
            .catch(err => alert('Failed to copy password.'));
    }
</script>
@endsection
