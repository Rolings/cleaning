<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
            'slug'   => Str::slug($this->slug ?? $this->name),
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
            'slug'             => ['required', 'string', 'max:255'],
            'name'             => ['required', 'string', 'max:255'],
            'price'            => ['required',],
            'room_type_enable' => ['required', 'array'],
            'room_type_prices' => ['required', 'array'],
            'additional'       => ['sometimes', 'nullable', 'array'],
            'description'      => ['required', 'string'],
            'image'            => ['sometimes', 'image', 'max:15120', 'mimes:jpg,png'],
            'active'           => ['required', 'boolean'],
        ];
    }
}
