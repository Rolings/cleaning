<?php

namespace App\Http\Requests\Main\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'order_at' => Carbon::parse($this->order_at),
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
            'first_name'             => ['required', 'string', 'max:100'],
            'last_name'              => ['sometimes', 'nullable', 'string'],
            'phone'                  => ['required', 'string'],
            'email'                  => ['sometimes', 'nullable', 'email'],
            'address'                => ['required', 'string', 'max:100'],
            'apt_suite'              => ['sometimes', 'nullable', 'string', 'max:100'],
            'city'                   => ['required', 'string', 'max:100'],
            'state_id'               => ['required', 'string', 'exists:states,id'],
            'zip'                    => ['required', 'string', 'max:100'],
            'order_at'               => ['required'],
            'offer_id'               => ['required', 'integer', 'exists:offers,id'],
            'services_id'            => ['required', 'nullable', 'string',],
            'additional_services_id' => ['required', 'nullable', 'string',],
            'comment'                => ['sometimes', 'nullable', 'string'],
        ];
    }
}
