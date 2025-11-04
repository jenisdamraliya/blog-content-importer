@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Blog Posts</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Source</th>
                    <th>Imported ID</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->source ?? '-' }}</td>
                        <td>{{ $post->external_id ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No posts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
