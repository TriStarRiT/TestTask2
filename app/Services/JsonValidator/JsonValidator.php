<?php

namespace App\Services\JsonValidator;

use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class JsonValidator
{
    public function validate(Request $request, PostRepository $postRepository = new PostRepository()): void
    {
        $validated = $request->validate([
            'limit' => 'numeric|min:1|max:' . $postRepository->count(),
            'page' => 'numeric|min:1|nullable',
        ]);
    }
}
