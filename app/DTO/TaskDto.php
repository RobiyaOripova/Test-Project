<?php

namespace App\DTO;

class TaskDto
{
    public function __construct(
        public string     $title,
        public string     $description,
        public int $status,
    )
    {
    }
}
