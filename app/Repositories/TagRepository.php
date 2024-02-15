<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Support\Collection;

class TagRepository implements TagRepositoryInterface
{
    public function getByPostId(int $post_id): Collection
    {
        return Tag::where('post_id', '=', $post_id)->get();
    }

    public function create(int $post_id, string $tag): void
    {
        Tag::create([
            'post_id' => $post_id,
            'tag' => $tag,
        ]);
    }
}
