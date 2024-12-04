<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'top'    => isset($this->active) && isset($this->top),
            'active' => isset($this->active),
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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            'subject'  => ['required', 'string', 'max:255'],
            'question' => ['required', 'string', 'max:255'],
            'answer'   => ['required', 'string', 'max:255'],
            'top'      => ['nullable', 'boolean'],
            'active'   => ['nullable', 'boolean'],
        ];
    }
}
