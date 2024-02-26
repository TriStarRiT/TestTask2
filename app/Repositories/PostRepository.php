<?php

namespace App\Repositories;

use App\DTO\DummyPostDTO;
use App\DTO\PostDTO;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Services\Dummyjson\DummyjsonService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;


class PostRepository implements PostRepositoryInterface
{
    public function count(): int
    {
        return Cache::remember('count_of_posts_for_api', 320, function () {
            return Post::count();
        });
    }

    public function createWithCommentsAndTags(DummyPostDTO $dummyPostDTO, DummyjsonService $dummyjsonService, TagRepositoryInterface $tagRepository, CommentRepositoryInterface $commentRepository): void
    {
        Post::create([
            'title' => $dummyPostDTO->title,
            'body' => $dummyPostDTO->body,
            'user_id' => $dummyPostDTO->user_id,
            'reactions' => $dummyPostDTO->reactions
        ]);
//        foreach ($dummyPostDTO['tags'] as $tag) {
//            $tagRepository->create($post['id'], $tag);
//        }
//        $comments = $dummyjsonService->getCommentsByPostId($post['id']);
//        foreach ($comments['comments'] as $comment) {
//            $commentRepository->create($comment);
//        }

    }

    public function create(PostDTO $post): void
    {
        Post::create([
            'title' => $post->title,
            'body' => $post->body,
            'user_id' => $post->user_id,
            'reactions' => $post->reactions
        ]);
    }

    public function getLastPosts(int $num): Collection
    {
        return Post::orderBy('created_at', 'DESC')->limit($num)->get();
    }
}
