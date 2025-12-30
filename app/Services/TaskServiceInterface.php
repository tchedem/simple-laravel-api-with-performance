<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Collection;

interface TaskServiceInterface
{
    // public function getAll(array $data): Collection;
    public function listTasks($data);

    public function getTask($uuid, $data);

    public function findByUuid(string $taskUuid): ?Task;

    public function create(array $data): Task;

    public function update(Task $task, array $data): Task;

    public function delete(Task $task): bool;
}
