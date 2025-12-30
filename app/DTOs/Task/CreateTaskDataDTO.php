<?php

namespace App\DTOs\Task;

use App\Http\Requests\Task\StoreTaskRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateTaskDataDTO extends DataTransferObject
{

    public string $title;
    public $description;

}
