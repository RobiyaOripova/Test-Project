<?php

namespace App\Http\Controllers\Api;

use App\DTO\TaskDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
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
        $tasks = $this->taskService->get();

        return response()->json([
            'status' => 'success',
            'data' => $tasks,
        ]);
    }

    public function show(Task $task): JsonResponse
    {
        $data = $this->taskService->show($task);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $dto = new TaskDto(...$request->validated());
        $result = $this->taskService->create($dto);

        return response()->json([
            'status' => 'success',
            'message' => 'Task created successfully',
            'data' => $result,
        ], 201);
    }

    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $dto = new TaskDto(...$request->validated());
        $result = $this->taskService->update($task, $dto);

        return response()->json([
            'status' => 'success',
            'message' => 'Task updated successfully',
            'data' => $result,
        ]);
    }

    public function destroy(Task $task): JsonResponse
    {
        $this->taskService->delete($task);

        return response()->json([
            'status' => 'success',
            'message' => 'Task deleted successfully',
        ]);
    }
}
