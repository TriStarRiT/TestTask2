<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface TagRepositoryInterface
{
    public function getByPostId(int $post_id): Collection;

    public function create(int $post_id, string $tag): void;
}
