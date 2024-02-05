<?php

namespace App\DTO;

class PostDTO
{
    public function __construct(
        protected string $title,
        protected string $author,
        protected ?int   $id = null,
    )
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
