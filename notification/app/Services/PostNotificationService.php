<?php

namespace App\Services;

use App\Models\PostNotification;

class PostNotificationService
{
    public function __construct(protected PostNotification $postNotification)
    {
    }

    public function addRecord(int $id, string $message): void
    {
        $this->postNotification->create([
            'post_id' => $id,
            'message' => $message,
        ]);
    }
}
