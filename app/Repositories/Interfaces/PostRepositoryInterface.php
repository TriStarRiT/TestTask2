<?php

namespace App\Repositories\Interfaces;

use App\Services\Dummyjson\DummyjsonService;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function getCountPostFromDb(): int;

    public function createWithCommentsAndTags(array $post, DummyjsonService $dummyjsonService, TagRepositoryInterface $tagRepository, CommentRepositoryInterface $commentRepository): void;

    public function create(array $post): void;

    public function getLastPosts(int $num): Collection;
}
