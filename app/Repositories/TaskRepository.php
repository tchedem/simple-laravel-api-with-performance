<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    // public function all(array $data): Collection
    public function all($data)
    {
        // return Task::latest()->get();

        $taskQuery = Task::query()
            ->orderBy('updated_at', 'desc');

        foreach ($data->with as $relation) {
            match (strtolower($relation)) {
                // 'category' => $taskQuery->with('category.createdBy:id,username,email'),
                'user' => $taskQuery->with([
                    // 'user:name,email'
                    'user' => function($query) {
                        $query->select('id', 'name', 'email');
                    }
                ]),
                default => null
            };
        }

        return $data->paginate
            ? $taskQuery->paginate($data->perPage)
            : $taskQuery->get();
    }

    public function getTask($uuid ,$data)
    {
        $taskQuery = Task::query()
            ->where('id', $uuid);

        foreach ($data->with as $relation) {
            match (strtolower($relation)) {
                // 'category' => $taskQuery->with('category.createdBy:id,username,email'),
                'user' => $taskQuery->with([
                    'user' => function($query) {
                        $query->select('id', 'name', 'email');
                    }
                ]),
                default => null
            };
        }

        return $taskQuery->first();
    }

    public function findByUuid(string $taskUuid): ?Task
    {
        return Task::where('id', $taskUuid)->first();
    }

    public function create($data): Task
    {
        $id = \Illuminate\Support\Str::uuid()->toString();

        return Task::create([
            'id' => $id,
            'title' => $data->title,
            'description' => $data->description,
        ]);
    }

    public function update(Task $task, $data): Task
    {
        $task->update([
            'title' => $data->title ?? $task->title,
            'description' => $data->description ?? $task->description,
        ]);

        return $task;
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }
}
