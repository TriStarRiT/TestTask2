<?php

namespace App\Http\Controllers\Api;

use App\Actions\CheckPostUpdate;
use App\DTO\Factories\PostDTOFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostApiRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Services\JsonValidator\JsonValidator;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostApiRequest $request, JsonValidator $jsonValidator): PostCollection
    {
        $limit = $request->limit ?? 5;
        $page = $request->page ?? 1;
        return new PostCollection(Post::paginate($limit, '*', 'posts', $page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, PostRepository $postRepository)
    {
        $post = PostDTOFactory::createPostFromRequest($request);
        $postRepository->create($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $unused_fields = (new CheckPostUpdate)
            ->checkPostForEmpty(PostDTOFactory::createPostForUpdateFromRequest($request));
        $post = Post::findOrFail($id);
        $post->fill($request->except($unused_fields));
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
