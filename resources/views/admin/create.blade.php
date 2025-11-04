@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Create New Post</h2>

    <form method="POST" action="{{ route('admin.store') }}">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input name="price" type="number" step="0.01" class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input name="category" class="form-control">
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
