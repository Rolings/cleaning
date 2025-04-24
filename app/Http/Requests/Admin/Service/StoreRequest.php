<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
            'slug'   => Str::slug($this->slug ?? $this->name),
            'active' => isset($this->active),
            'price'  => isset($this->price) ? $this->price : 0
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
            'name'        => ['sometimes', 'nullable', 'string', 'max:255'],
            'slug'        => ['required', 'string', 'max:255'],
            'price'       => ['nullable', 'numeric',],
            'description' => ['required', 'string'],
            'image'       => ['required', 'image', 'max:15120', 'mimes:jpg,png'],
            'active'      => ['required', 'boolean'],
        ];
    }
}
