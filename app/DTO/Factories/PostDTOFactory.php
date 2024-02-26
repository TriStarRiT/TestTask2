<?php

namespace App\DTO\Factories;

use App\DTO\PostDTO;
use Illuminate\Http\Request;

class PostDTOFactory
{
    public static function createPostFromRequest(Request $post): PostDTO
    {
        $dto = new PostDTO();
        $dto->title = $post['title'];
        $dto->body = $post['body'];
        $dto->user_id = $post['userId'];
        $dto->reactions = $post['reactions'] ?? 0;
        return $dto;
    }
    public static function createPostForUpdateFromRequest(Request $post):PostDTO
    {
        $dto = new PostDTO();
        $dto->title = $post['title'] ?? "";
        $dto->body = $post['body'] ?? "";
        $dto->user_id = $post['userId'] ?? -1;
        $dto->reactions = $post['reactions'] ?? -1;
        return $dto;
    }
}
