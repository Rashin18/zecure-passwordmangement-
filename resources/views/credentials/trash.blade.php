@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">
        <i class="bi bi-trash-fill me-2"></i> Deleted Credentials
    </h2>

    @if($credentials->isEmpty())
        <div class="text-muted text-center py-5">
            <i class="bi bi-archive-fill" style="font-size: 2rem;"></i>
            <p class="mt-3">🗑 No deleted credentials found.</p>
        </div>
    @else
        <div class="table-responsive shadow-sm rounded-3">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th>Website</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Category</th>
                        <th>Deleted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($credentials as $credential)
                        <tr>
                            <td class="fw-semibold">{{ $credential->website }}</td>
                            <td>{{ $credential->name ?? '-' }}</td>
                            <td>{{ $credential->username }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $credential->category ?? 'N/A' }}
                                </span>
                            </td>
                            <td>{{ $credential->deleted_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('credentials.restore', $credential->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm rounded-pill">
                                        <i class="bi bi-arrow-clockwise me-1"></i> Restore
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ route('credentials.index') }}" class="btn btn-outline-secondary mt-4">
        <i class="bi bi-box-arrow-left me-1"></i> Back to Vault
    </a>
</div>
@endsection
