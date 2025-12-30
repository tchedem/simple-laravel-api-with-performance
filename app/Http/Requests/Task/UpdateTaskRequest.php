<?php

namespace App\Http\Requests\Task;

use App\DTOs\Task\UpdateTaskDataDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title' => 'sometimes|string|min:5|max:255',
            'description' => 'sometimes|nullable|string|min:5|max:512',
            // 'assigned_to' => 'nullable|uuid|exists:users,id',
        ];
    }

    public function toDTO(): UpdateTaskDataDTO
    {
        return new UpdateTaskDataDTO(
            title: $this->input('title'),
            description: $this->input('description'),
        );
    }
}
