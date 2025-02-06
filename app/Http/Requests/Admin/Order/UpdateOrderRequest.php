<?php

namespace App\Http\Requests\Admin\Order;

use App\Models\AdditionalService;
use App\Models\Offer;
use App\Models\Service;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
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
    protected function prepareForValidation(): void
    {
        $this->merge([
            'order_at'            => Carbon::parse($this->order_at),
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
            'last_name'             => ['nullable', 'string'],
            'email'                 => ['nullable', 'email'],
            'phone'                 => ['required', 'string'],
            'order_at'              => ['required'],
            'offer_id'              => ['required', 'integer', Rule::exists(Offer::class, 'id')],
            'state_id'              => ['required', 'integer', Rule::exists(State::class, 'id')],
            'city'                  => ['required', 'string'],
            'zip'                   => ['required', 'string'],
            'address'               => ['required', 'string'],
            'apt_suite'             => ['required', 'string'],
            'comment'               => ['nullable', 'string'],
            'services'              => ['required', 'array'],
            'services.*'            => ['required', 'integer', Rule::exists(Service::class, 'id')],
            'additional_services'   => ['nullable', 'array'],
            'additional_services.*' => ['nullable', 'integer', Rule::exists(AdditionalService::class, 'id')],
        ];
    }
}
