<?php

namespace App\Http\Requests\Task;

use App\DTOs\Task\CreateTaskDataDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'assigned_to' => 'nullable|uuid|exists:users,id',
        ];
    }

    public function toDTO(): CreateTaskDataDTO
    {
        return new CreateTaskDataDTO(
            // title: $this->has('title') ? $this->input('title') : null,
            title: $this->input('title'),
            description: $this->input('description'),
        );
    }
}
