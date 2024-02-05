<?php

namespace App\Services\API\V1;

use ApiInterface;
use App\Services\API\Weather\PostInterface;
use App\Services\API\Weather\V1\PostV1Service;

class ApiV1Service implements ApiInterface
{
    public function bindServices(): void
    {
        app()->bind(PostInterface::class, PostV1Service::class);
    }
}
