<?php

namespace App\Http\Requests\Admin\Review;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return void
     */
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
            'image'   => ['required', 'image', 'max:15120', 'mimes:jpg,png'],
            'name'    => ['required', 'string'],
            'email'   => ['required', 'email'],
            'comment' => ['required', 'string'],
            'rating'  => ['required', 'integer', 'min:1', 'max:5'],
            'active'  => ['required', 'boolean'],
        ];
    }
}
