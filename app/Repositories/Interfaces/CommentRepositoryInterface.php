<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CommentRepositoryInterface
{
    public function create(array $comment): void;

    public function getCommentsByPostId(int $post_id, int $num): Collection;
}
