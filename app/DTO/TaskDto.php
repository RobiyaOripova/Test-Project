<?php

namespace app\DTO;

use Enums\StatusEnum;

class TaskDto
{
    public function __construct(
        public string     $title,
        public string     $description,
        public StatusEnum $status,
    )
    {
    }
}
