<?php

namespace App\Http\Services;

use App\DTO\TaskDto;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskService
{
    public function get(): TaskCollection
    {
        return new TaskCollection(Task::paginate(15));
    }

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    public function create(TaskDto $dto)
    {
        return Task::query()->create([
            'title' => $dto->title,
            'description' => $dto->description,
            'status' => $dto->status,
        ]);
    }

    public function update(Task $task, TaskDto $dto): TaskResource
    {
        $task->update([
            'title' => $dto->title,
            'description' => $dto->description,
            'status' => $dto->status,
        ]);

        return new TaskResource($task);

    }

    public function delete(Task $task): ?bool
    {
        return $task->delete();
    }
}
