<?php

namespace App\DTOs\Task;

use App\Http\Requests\Task\GetTaskRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Models\Task;
use Spatie\DataTransferObject\DataTransferObject;

class TaskQueryDataDTO extends DataTransferObject
{

    public bool $paginate;
    public int $perPage;
    public array $with;
    public bool $all;

    // public function __construct(
    //     // public bool $paginate,
    //     // public int $perPage,
    //     // public array $with,
    //     // public bool $all
    // ) {}

    // public static function fromRequest(GetTaskRequest $request): self
    // {

    //     $perPage = min($request->per_page, Task::PER_PAGE_MAX);

    //     return new self(
    //         paginate: (bool) $request->paginate,
    //         perPage: $perPage,
    //         with: array_unique(explode(',', $request->with ?? '')),
    //         all: $request->all === 'true'
    //     );
    // }
}

