<?php

namespace App\Http\Requests\Admin\Price;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id'          => ['required', 'exists:services,id'],
            'room_type_id'        => ['required', 'exists:room_types,id'],
            'room_quantity'       => ['required', 'numeric', 'between:0.5,10.0'],
            'price_by_unit'       => ['required', 'numeric', 'regex:/^\d+(\.5|\.0)?$/'],
            'price_for_next_unit' => ['required', 'numeric', 'regex:/^\d+(\.5|\.0)?$/'],
        ];
    }
}
