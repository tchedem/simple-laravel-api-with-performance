<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{

    // public function getAll(array $filters = []): Collection;
    // public function findByUuid(string $uuid, array $with = []): ?Task;
    // public function all(array $data): Collection;
    public function all($data);

    public function getTask($uuid, $data);

    public function findByUuid(string $taskUuid): ?Task;

    public function create($data): Task;

    public function update(Task $task, $data): Task;

    public function delete(Task $task): bool;
}
