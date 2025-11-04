@extends('layouts.master')

@section('content')
<div class="container py-5">
    <h1 class="mb-5 text-center fw-bold">📝 Latest Blog Posts</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($posts->where('status', 'published') as $post)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold mb-2">{{ $post->title }}</h5>

                        @if($post->price || $post->category)
                            <p class="text-muted small mb-2">
                                @if($post->price)
                                    <span class="me-3"><i class="bi bi-currency-rupee"></i>{{ number_format($post->price, 2) }}</span>
                                @endif
                                @if($post->category)
                                    <span class="badge bg-secondary">{{ $post->category }}</span>
                                @endif
                            </p>
                        @endif

                        <p class="text-muted small mb-1"><strong>Source:</strong> {{ $post->source ?? '-' }}</p>
                        <p class="text-muted small mb-3"><strong>External ID:</strong> {{ $post->external_id ?? '-' }}</p>

                        <div class="mt-auto">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary w-100">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info text-center w-100">No published posts found.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
