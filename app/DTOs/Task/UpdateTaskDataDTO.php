<?php

namespace App\DTOs\Task;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateTaskDataDTO extends DataTransferObject
{

    public $title;
    public $description;

}
