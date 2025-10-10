<?php

namespace App\DTO;




use App\Enums\StatusEnum;

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
