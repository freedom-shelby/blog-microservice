<?php

namespace App\Services\API;

use App\DTO\PostDTO;
use App\Models\Post;

interface PostInterface
{
    public function create(PostDTO $postDTO): Post;

    public function update(PostDTO $postDTO): Post;

    public function delete(int $id): bool;
}
