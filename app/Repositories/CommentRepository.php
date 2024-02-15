<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(array $comment): void
    {
        //dd($comment);
        Comment::create([
            'body' => $comment['body'],
            'post_id' => $comment['postId'],
            'user_id' => $comment['user']['id']
        ]);
    }

    public function getCommentsByPostId(int $post_id, int $num): Collection
    {
        return Comment::where('post_id', '=', $post_id)->orderBy('created_at', 'DESC')->limit($num)->get();
    }
}
