<?php

namespace App\Http\Requests\Main\Checkout;

use App\Models\AdditionalService;
use App\Models\Service;
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
            'order_at'            => Carbon::parse($this->order_at),
            'services'            => Service::find(json_decode($this->services_id)),
            'additional_services' => AdditionalService::find(json_decode($this->additional_services_id))
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
            'apt_suite'              => ['sometimes', 'nullable', 'string', 'max:5'],
            'city'                   => ['sometimes', 'nullable','string', 'max:50'],
            'state_id'               => ['required', 'string', 'exists:states,id'],
            'zip'                    => ['required', 'string', 'max:100'],
            'order_at'               => ['required'],
            'services_id'            => ['required', 'nullable', 'string',],
            'services'               => ['sometimes', 'nullable'],
            'additional_services_id' => ['required', 'nullable', 'string',],
            'additional_services'    => ['sometimes', 'nullable',],
            'comment'                => ['sometimes', 'nullable', 'string'],
        ];
    }
}
