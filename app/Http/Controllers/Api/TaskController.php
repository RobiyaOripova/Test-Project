<?php

namespace App\Http\Controllers\Api;

use App\DTO\TaskDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Services\TaskService;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function __construct(public TaskService $taskService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->taskService->get());
    }

    public function show(Task $task): JsonResponse
    {
        return response()->json($this->taskService->show(task: $task));
    }

    public function create(TaskRequest $request): JsonResponse
    {
        $result = $this->taskService->create(
            dto: $this->makeTaskDto(request: $request)
        );
        return response()->json(['result' => $result]);
    }

    public function update(TaskRequest $request, Task $task): JsonResponse
    {
        $result = $this->taskService->update(
            task: $task,
            dto: $this->makeTaskDto(request: $request)
        );
        return response()->json(['result' => $result]);
    }

    public function delete(Task $task): JsonResponse
    {
        return response()->json(['result' => $this->taskService->delete(task: $task)]);

    }

    public function makeTaskDto(TaskRequest $request): TaskDto
    {
        return new TaskDto(
            title: $request->validated('title'),
            description: $request->validated('description'),
            status: $request->validated('status'),
        );
    }

}
