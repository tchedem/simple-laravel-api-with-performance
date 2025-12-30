<?php

namespace App\Http\Requests\Task;

use App\DTOs\Task\TaskQueryDataDTO;
use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;

class GetTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'perPage' => 'sometimes|integer|min:1|max:' . Task::PER_PAGE_MAX,
            'page' => 'sometimes|integer|min:1',
            'paginate' => 'sometimes|boolean',
            'with' => 'sometimes|string',
        ];
    }

    public function toDTO(): TaskQueryDataDTO
    {
        $perPage = min($this->input('perPage', Task::PER_PAGE_DEFAULT), Task::PER_PAGE_MAX);

        return new TaskQueryDataDTO(
            paginate: $this->boolean('paginate', true),
            perPage: $perPage,
            with: array_unique(explode(',', $this->input('with', ''))),
            all: $this->input('all') === 'true'
        );
    }
}
