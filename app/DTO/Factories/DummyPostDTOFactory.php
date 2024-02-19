<?php

namespace App\DTO\Factories;

use App\DTO\DummyPostDTO;

class DummyPostDTOFactory
{
    public static function createFromRequestPost(array $post): DummyPostDTO
    {
        $dto = new DummyPostDTO();
        $dto->title = $post['title'];
        $dto->body = $post['body'];
        $dto->user_id = $post['userId'];
        $dto->reactions = $post['reactions'];
        return $dto;
    }
}
