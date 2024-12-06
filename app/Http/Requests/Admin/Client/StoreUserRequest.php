<?php

namespace App\Http\Requests\Admin\Client;

use App\Enums\User\UserTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'type'   => UserTypeEnum::CLIENT->value,
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
            'first_name'  => ['required', 'string'],
            'last_name'   => ['sometimes', 'nullable', 'string'],
            'middle_name' => ['sometimes', 'nullable', 'string'],
            'avatar'      => ['sometimes', 'nullable', 'image', 'mimes:jpeg,jpg,png', 'max:15048'],
            'type'        => ['sometimes', 'nullable', 'string'],
            'phone'       => ['required', 'string', 'unique:users,phone'],
            'email'       => ['sometimes', 'nullable', 'string', 'email', 'unique:users,email'],
            'active'      => ['required', 'boolean'],
        ];
    }
}
