<?php

namespace App\Services\API\Weather\V1;

use App\DTO\PostDTO;
use App\Models\Post;
use App\Services\API\Weather\PostInterface;

class PostV1Service implements PostInterface
{

    public function create(PostDTO $postDTO): Post
    {
        return Post::create([
            'title' => $postDTO->getTitle(),
            'author' => $postDTO->getAuthor(),
        ]);
    }

    public function update(PostDTO $postDTO): Post
    {
        return Post::findOrFail($postDTO->getId())->update([
            'title' => $postDTO->getTitle(),
            'author' => $postDTO->getAuthor(),
        ]);
    }

    public function delete(int $id): bool
    {
        return Post::findOrFail($id)->delete();
    }
}
