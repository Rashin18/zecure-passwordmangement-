@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4"><i class="bi bi-trash-fill me-2"></i>Deleted Credentials</h2>

    @if($credentials->isEmpty())
        <p class="text-muted">🗑 No deleted credentials found.</p>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Website</th>
                    <th>Username</th>
                    <th>Category</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($credentials as $credential)
                    <tr>
                        <td>{{ $credential->website }}</td>
                        <td>{{ $credential->username }}</td>
                        <td>{{ $credential->category ?? 'N/A' }}</td>
                        <td>{{ $credential->deleted_at->diffForHumans() }}</td>
                        <td>
                            <form method="POST" action="{{ route('credentials.restore', $credential->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm rounded-pill">
                                    <i class="bi bi-arrow-clockwise"></i> Restore
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('credentials.index') }}" class="btn btn-outline-secondary mt-3">⬅ Back to Vault</a>
</div>
@endsection
