<?php

namespace App\Services\API\Weather;

use App\DTO\PostDTO;

interface PostInterface
{
    public function create(PostDTO $postDTO);

    public function update(PostDTO $postDTO);

    public function delete(int $id);
}
