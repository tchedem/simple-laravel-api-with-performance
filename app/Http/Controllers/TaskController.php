<?php

namespace App\Http\Controllers;

use App\DTOs\Task\CreateTaskDataDTO;
use App\DTOs\Task\TaskQueryDataDTO;
use App\Http\Requests\Task\DeleteTaskRequest;
use App\Http\Requests\Task\GetTaskRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\TaskService;
use App\Services\TaskServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{

    public function __construct(private TaskService $taskService) {
        $this->taskService = $taskService;
    }

    public function index(GetTaskRequest $request)
    {
        $data = $request->toDTO();

        $tasks = $this->taskService->listTasks($data);

        return response()->json($tasks);
    }

    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index(
    //     GetTaskRequest $request,
    //     TaskService $taskService
    // )
    // {

    //     $tasks = $taskService->getTasks($request->validated());
    //     //

    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request) {
    // public function index(GetTaskRequest $request)

        $data = $request->toDTO();

        $task = $this->taskService->create($data);

        return response()->json($task, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(GetTaskRequest $request, string $uuid)
    {
        $data = $request->toDTO();

        // $task = $this->taskService->findByUuid($uuid);
        $task = $this->taskService->getTask($uuid, $data);// getAll($data);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $uuid)
    {
        $data = $request->toDTO();

        // $task = $this->taskService->findByUuid($uuid);
        $task = $this->taskService->findByUuid($uuid);// getAll($data);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        $task = $this->taskService->update($task, $data);

        // Response::$statusTexts[Response::HTTP_CONTINUE];
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function partialUpdate(UpdateTaskRequest $request, string $uuid)
    {
        $data = $request->toDTO();

        // $task = $this->taskService->findByUuid($uuid);
        $task = $this->taskService->findByUuid($uuid);// getAll($data);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        $task = $this->taskService->update($task, $data);

        // Response::$statusTexts[Response::HTTP_CONTINUE];
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTaskRequest $request, string $uuid)
    {
        $task = $this->taskService->findByUuid($uuid);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        $this->taskService->delete($task);

        return response()->json(['message' => 'Task deleted successfully'], Response::HTTP_OK);
    }
}
