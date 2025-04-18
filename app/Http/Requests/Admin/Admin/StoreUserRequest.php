<?php

namespace App\Http\Requests\Admin\Admin;

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
        $data = collect($this->all());

        if (is_null($this->password)) {
            $data->forget(['password', 'password_confirmation']);
        }

        $this->replace($data->toArray());

        $this->merge([
            'type'   => UserTypeEnum::ADMIN->value,
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
            'first_name'            => ['required', 'string'],
            'last_name'             => ['sometimes', 'nullable', 'string'],
            'middle_name'           => ['sometimes', 'nullable', 'string'],
            'avatar'                => ['image', 'mimes:jpeg,jpg,png', 'max:15048'],
            'type'                  => ['sometimes', 'nullable', 'string'],
            'phone'                 => ['required', 'string', 'unique:users,phone'],
            'email'                 => ['required', 'string', 'email', 'unique:users,email'],
            'password'              => ['required', 'string'],
            'password_confirmation' => ['required', 'string', 'same:password'],
            'active'                => ['required', 'boolean'],
        ];
    }
}
