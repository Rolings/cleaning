<?php

namespace App\Http\Requests\Admin\AdditionalService;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdditionalServiceRequest extends FormRequest
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
            'active' => isset($this->active)
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
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string'],
            'icon'        => ['required', 'image', 'max:15120', 'mimes:jpg,png'],
            'base64image' => ['sometimes', 'nullable', 'string'],
            'price'       => ['required', 'numeric', 'not_in:0'],
            'active'      => ['required', 'boolean'],
        ];
    }
}
