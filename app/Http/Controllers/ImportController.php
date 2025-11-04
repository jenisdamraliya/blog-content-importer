<?php

namespace App\Http\Controllers;
use App\Models\Post;

use App\Services\PostImporter;

class ImportController extends Controller
{
    protected $importer;

    public function __construct(PostImporter $importer)
    {
        $this->importer = $importer;
    }

    public function json()
    {
        $post = $this->importer->importFromJsonPlaceholder();

        return redirect()->route('admin.show')
            ->with($post ? ['success' => 'Imported from JSONPlaceholder'] : ['danger' => 'Duplicate or failed']);
    }

    public function fakestore()
    {
        $post = $this->importer->importFromFakeStore();

        return redirect()->route('admin.show')
            ->with($post ? ['success' => 'Imported from FakeStore'] : ['danger' => 'Duplicate or failed']);
    }

    public function show()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.show', compact('posts'));
    }

}

