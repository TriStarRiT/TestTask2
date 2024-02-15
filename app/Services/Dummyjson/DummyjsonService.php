<?php

namespace App\Services\Dummyjson;

use Illuminate\Support\Facades\Http;

class DummyjsonService
{
    public function getPostsWithTags(int $limit = 10, int $skip = 0): array
    {
        $response = Http::get('https://dummyjson.com/posts', [
            'limit' => $limit,
            'skip' => $skip,
        ]);
        return json_decode($response, true);
    }

    public function getCommentsByPostId($id): array
    {
        $response = Http::get('https://dummyjson.com/comments/post/' . $id,);
        return json_decode($response, true);
    }
}
