<?php

namespace App\Repositories\Interfaces;

use App\DTO\DummyPostDTO;
use App\Services\Dummyjson\DummyjsonService;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function count(): int;

    public function createWithCommentsAndTags(DummyPostDTO $dummyPostDTO, DummyjsonService $dummyjsonService, TagRepositoryInterface $tagRepository, CommentRepositoryInterface $commentRepository): void;

    public function create(array $post): void;

    public function getLastPosts(int $num): Collection;
}
