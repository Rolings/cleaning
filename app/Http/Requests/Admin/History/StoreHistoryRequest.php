<?php

namespace App\Http\Requests\Admin\History;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class StoreHistoryRequest extends FormRequest
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
            'event_date_at' => Carbon::parse($this->event_date_at),
            'active'        => isset($this->active)
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
            'title'         => ['required', 'string'],
            'description'   => ['required', 'string'],
            'event_date_at' => ['required', 'date'],
            'active'        => ['required', 'boolean'],
        ];
    }
}
