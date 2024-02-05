<?php

namespace App\Services\API\V1;

use App\DTO\PostDTO;
use App\Models\Post;
use App\Services\API\PostInterface;

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
        $post = Post::findOrFail($postDTO->getId());

        $post->update([
            'title' => $postDTO->getTitle(),
            'author' => $postDTO->getAuthor(),
        ]);

        return $post;
    }

    public function delete(int $id): bool
    {
        return Post::findOrFail($id)->delete();
    }
}
