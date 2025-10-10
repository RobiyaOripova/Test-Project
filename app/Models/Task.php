<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $casts = ['status' => StatusEnum::class];


}
