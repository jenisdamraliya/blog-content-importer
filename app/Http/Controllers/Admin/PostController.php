<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'price' => 'nullable|numeric',
            'category' => 'nullable|string',
        ]);


        Post::create($validated);

        return redirect()->route('admin.show')->with('success', 'Post created');
    }

    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'price' => 'nullable|numeric',
            'category' => 'nullable|string',
        ]);

        $post->update($validated);

        return redirect()->route('admin.show')->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.show')->with('success', 'Post deleted');
    }
}

