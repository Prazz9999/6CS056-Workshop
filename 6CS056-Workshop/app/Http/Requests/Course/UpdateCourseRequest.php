<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $course = $this->route('course');

        return [
            'title' => 'required|string|max:255',
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('courses', 'code')->ignore($course->id),
            ],
            'description' => 'nullable|string',
            'duration' => 'required|string|max:100',
            'fee' => 'required|numeric|min:0',
        ];
    }
}