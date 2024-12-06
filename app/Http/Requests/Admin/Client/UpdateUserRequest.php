<?php

namespace App\Http\Requests\Admin\Client;

use App\Enums\User\UserTypeEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'first_name'  => ['required', 'string'],
            'last_name'   => ['sometimes', 'nullable', 'string'],
            'middle_name' => ['sometimes', 'nullable', 'string'],
            'avatar'      => ['sometimes', 'nullable', 'image', 'mimes:jpeg,jpg,png', 'max:15048'],
            'type'        => ['sometimes', 'nullable', 'string'],
            'phone'       => ['required', 'string', Rule::unique(User::class, 'phone')->ignore($this->client->id)],
            'email'       => ['required', 'string', Rule::unique(User::class, 'email')->ignore($this->client->id)],
            'active'      => ['required', 'boolean'],
        ];
    }
}
