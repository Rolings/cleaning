<?php

namespace App\Http\Requests\Main\Question;

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
            'top'     => false,
            'active'  => false,
            'subject' => 'User question',
            'answer'  => '',
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
            'name'     => ['required', 'string', 'max:70'],
            'email'    => ['required', 'string', 'email', 'max:70'],
            'question' => ['required', 'string', 'max:255'],
            'subject'  => ['nullable', 'string'],
            'answer'   => ['nullable', 'string'],
            'top'      => ['nullable', 'boolean'],
            'active'   => ['nullable', 'boolean'],
        ];
    }
}
