<?php

namespace App\Repositories\Interfaces;

use App\DTO\DummyPostDTO;
use App\DTO\PostDTO;
use App\Services\Dummyjson\DummyjsonService;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function count(): int;

    public function createWithCommentsAndTags(DummyPostDTO $dummyPostDTO, DummyjsonService $dummyjsonService, TagRepositoryInterface $tagRepository, CommentRepositoryInterface $commentRepository): void;

    public function create(PostDTO $post): void;

    public function getLastPosts(int $num): Collection;
}
