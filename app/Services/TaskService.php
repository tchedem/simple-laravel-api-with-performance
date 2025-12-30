<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskService implements TaskServiceInterface
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    // public function getAll(array $data): Collection
    public function listTasks($data)
    {
        return $this->taskRepository->all($data);
    }

    public function getTask($uuid, $data)
    {
        return $this->taskRepository->getTask($uuid, $data);
    }

    public function findByUuid(string $taskUuid): ?Task
    {
        return $this->taskRepository->findByUuid($taskUuid);
    }

    public function create($data): Task
    {
        return DB::transaction(function () use ($data) {
            return $this->taskRepository->create($data);
        });
    }

    public function update(Task $task, $data): Task
    {
        return DB::transaction(function () use ($task, $data) {
            return $this->taskRepository->update($task, $data);
        });
    }

    public function delete(Task $task): bool
    {
        return DB::transaction(function () use ($task) {
            return $this->taskRepository->delete($task);
        });
    }
}
