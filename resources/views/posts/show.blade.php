@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="card border-0 shadow-sm">
                <div class="card-body">
                    <h1 class="card-title fw-bold mb-4">{{ $post->title }}</h1>

                    <div class="mb-3 text-muted small">
                        @if($post->price)
                            <span class="me-3"><i class="bi bi-currency-rupee"></i>{{ number_format($post->price, 2) }}</span>
                        @endif
                        @if($post->category)
                            <span class="badge bg-secondary">{{ $post->category }}</span>
                        @endif
                    </div>

                    <div class="mb-3 text-muted small">
                        @if($post->source)
                            <span><strong>Source:</strong> {{ $post->source }}</span><br>
                        @endif
                        @if($post->external_id)
                            <span><strong>External ID:</strong> {{ $post->external_id }}</span>
                        @endif
                    </div>

                    <hr>

                    <div class="mt-4 fs-5 lh-lg">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-dark">
                            ← Back to Posts
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
