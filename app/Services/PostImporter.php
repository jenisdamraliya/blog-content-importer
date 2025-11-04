<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Http;

class PostImporter
{
    public function importFromJsonPlaceholder(): ?Post
    {
        $id = rand(1, 100);
        $response = Http::get("https://jsonplaceholder.typicode.com/posts/{$id}");

        if (!$response->ok()) return null;

        $data = $response->json();

        return $this->storeIfNotDuplicate([
            'title' => $data['title'],
            'content' => $data['body'],
            'status' => 'draft',
            'source' => 'jsonplaceholder',
            'external_id' => $data['id'],
        ]);
    }

    public function importFromFakeStore(): ?Post
    {
        $id = rand(1, 20);
        $response = Http::get("https://fakestoreapi.com/products/{$id}");

        if (!$response->ok()) return null;

        $data = $response->json();

        return $this->storeIfNotDuplicate([
            'title' => $data['title'],
            'content' => "{$data['description']}\n\nPrice: \${$data['price']}\nCategory: {$data['category']}",
            'status' => 'draft',
            'source' => 'fakestore',
            'external_id' => $data['id'],
        ]);
    }

    protected function storeIfNotDuplicate(array $attributes): ?Post
    {
        $exists = Post::where('source', $attributes['source'])
                      ->where('external_id', $attributes['external_id'])
                      ->exists();

        return $exists ? null : Post::create($attributes);
    }
}
