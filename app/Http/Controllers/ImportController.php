<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\Dummyjson\DummyjsonService;

class ImportController extends Controller
{
    public function __invoke(DummyjsonService $dummyjsonService, PostRepositoryInterface $postRepository, TagRepositoryInterface $tagRepository, CommentRepositoryInterface $commentRepository): string
    {
        $post_count = $postRepository->getCountPostFromDb();
        $posts = $dummyjsonService->getPostsWithTags(10, $post_count);
        foreach ($posts['posts'] as $post) {
            $postRepository->createWithCommentsAndTags($post, $dummyjsonService, $tagRepository, $commentRepository);
        }
        return "added";
    }
}
