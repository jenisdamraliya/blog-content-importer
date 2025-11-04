@extends('layouts.master')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Admin Panel: Import & Manage Posts</h2>
        </div>
    </div>

    {{-- Import Actions --}}
    <div class="card mb-4">
        <div class="card-body d-flex flex-wrap gap-2 justify-content-center">
            <form method="POST" action="{{ route('admin.import.json') }}">
                @csrf
                <button class="btn btn-outline-primary">
                    <i class="bi bi-cloud-download"></i> Import from JSONPlaceholder
                </button>
            </form>

            <form method="POST" action="{{ route('admin.import.fakestore') }}">
                @csrf
                <button class="btn btn-outline-secondary">
                    <i class="bi bi-bag-plus"></i> Import from FakeStore
                </button>
            </form>

            <a href="{{ route('admin.create') }}" class="btn btn-outline-success">
                <i class="bi bi-plus-circle"></i> Create New Post
            </a>
        </div>
    </div>

    {{-- Posts Table --}}
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Source</th>
                        <th>ExternalID</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->status }}</td>
                            <td>{{ $post->source }}</td>
                            <td>{{ $post->external_id }}</td>
                            <td>{{ $post->price ? '$' . number_format($post->price, 2) : '-' }}</td>
                            <td>{{ $post->category ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.delete', $post->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">No posts found.</td></tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3 justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
