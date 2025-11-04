@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Post</h2>

    <form method="POST" action="{{ route('admin.update', $post->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input name="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft" @selected($post->status === 'draft')>Draft</option>
                <option value="published" @selected($post->status === 'published')>Published</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input name="price" type="number" step="0.01" class="form-control" value="{{ $post->price }}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input name="category" class="form-control" value="{{ $post->category }}">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
