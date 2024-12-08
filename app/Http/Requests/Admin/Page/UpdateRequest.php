<?php

namespace App\Http\Requests\Admin\Page;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'robot_index' => isset($this->robot_index)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => ['sometimes', 'nullable', 'string', 'max:255', Rule::unique(Page::class, 'name')->ignore($this->page->id)],
            'slug'        => ['required', 'string', 'max:255', Rule::unique(Page::class, 'slug')->ignore($this->page->id)],
            'keywords'    => ['required', 'string'],
            'description' => ['required', 'string'],
            'robot_index' => ['required', 'boolean'],
        ];
    }
}
