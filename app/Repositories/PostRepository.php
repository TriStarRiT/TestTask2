<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Services\Dummyjson\DummyjsonService;
use Illuminate\Support\Collection;
use App\Models\Post;


class PostRepository implements PostRepositoryInterface
{
    public function getCountPostFromDb(): int
    {
        return count(Post::all());
    }

    public function createWithCommentsAndTags(array $post, DummyjsonService $dummyjsonService, TagRepositoryInterface $tagRepository, CommentRepositoryInterface $commentRepository): void
    {
        Post::create([
            'title' => $post['title'],
            'body' => $post['body'],
            'user_id' => $post['userId'],
            'reactions' => $post['reactions']
        ]);
        foreach($post['tags'] as $tag){
            $tagRepository->create($post['id'], $tag);
        }
        $comments = $dummyjsonService->getCommentsByPostId($post['id']);
        foreach($comments['comments'] as $comment){
            $commentRepository->create($comment);
        }

    }

    public function create(array $post): void
    {
        Post::create([
            'title' => $post['title'],
            'body' => $post['body'],
            'user_id' => $post['user_id'],
            'reactions' => $post['reactions']
        ]);
    }

    public function getLastPosts(int $num): Collection
    {
        return Post::orderBy('created_at', 'DESC')->limit($num)->get();
    }
}
