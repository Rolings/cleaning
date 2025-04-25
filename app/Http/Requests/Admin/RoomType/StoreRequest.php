<?php

namespace App\Http\Requests\Admin\RoomType;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'active'     => isset($this->active),
            'fractional' => isset($this->fractional),
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
            'name'       => ['required', 'string', 'max:255'],
            'min'        => ['required', 'numeric', 'min:0,5'],
            'max'        => ['required', 'numeric'],
            'fractional' => ['required', 'boolean'],
            'active'     => ['required', 'boolean'],
            'additional' => ['sometimes', 'nullable', 'array'],
        ];
    }
}
