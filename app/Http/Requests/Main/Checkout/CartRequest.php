<?php

namespace App\Http\Requests\Main\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            $fullName = explode(' ', $this->input('name'));

            $this->merge([
                'first_name' => $fullName[0],
                'last_name'  => $fullName[1] ?? '',
                'order_at'      => $this->input('phone')
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'       => ['sometimes', 'nullable', 'string'],
            'first_name' => ['sometimes', 'nullable', 'string'],
            'last_name'  => ['sometimes', 'nullable', 'string'],
            'offer_id'   => ['sometimes', 'nullable', 'integer', 'exists:offers,id'],
            'phone'      => ['sometimes', 'nullable'],
            // 'phone'       => ['sometimes', 'nullable', 'regex:/^(?:\+1\s?)?(\(\d{3}\)|\d{3})([\s.-]?)\d{3}([\s.-]?)\d{4}$/'],
            'comment'    => ['sometimes', 'nullable', 'string'],
        ];
    }
}
