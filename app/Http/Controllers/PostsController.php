<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\CommentRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(PostRepositoryInterface $postRepository, TagRepositoryInterface $tagRepository, CommentRepository $commentRepository)
    {
        $posts = $postRepository->getLastPosts(10);
        foreach ($posts as $post) {
            $post['tags'] = $tagRepository->getByPostId($post['id']);
            $post['comments'] = $commentRepository->getCommentsByPostId($post['id'], 5);
        }
        return view('posts', ['posts' => $posts]);
    }
}
