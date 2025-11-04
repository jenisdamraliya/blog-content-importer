<?php

namespace App\Http\Controllers;

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

        return redirect()->route('posts.index')
            ->with($post ? ['success' => 'Imported from JSONPlaceholder'] : ['danger' => 'Duplicate or failed']);
    }

    public function fakestore()
    {
        $post = $this->importer->importFromFakeStore();

        return redirect()->route('posts.index')
            ->with($post ? ['success' => 'Imported from FakeStore'] : ['danger' => 'Duplicate or failed']);
    }
}

