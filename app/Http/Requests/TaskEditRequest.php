<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'label' => 'required|string|max:255',
            'task_name' => 'required|string| max:255',
            'start_date' => 'required|before_or_equal:end_date|date_format:Y-m-d',
            'end_date' => 'required|after_or_equal:start_date|date_format:Y-m-d',
            'status' => 'required|integer|between:0,5',
            'priority' => 'required|integer|between:0,5',
            'task_description' => 'string|max:255',
        ];
    }

    public function messages()
    {
        return[
            'status.integer' => 'The status field is required.',
            'status.between:0,5' => 'The status field is required.',
            'priority.integer' => 'The priority field is required.',
            'priority.between:0,5' => 'The priority field is required.',
            'task_description.string' => '',
        ];
    }
}
