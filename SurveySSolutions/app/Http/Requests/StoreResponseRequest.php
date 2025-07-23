<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResponseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'responses' => 'required|array|min:1',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|string',
            'responses.*.response_numeric' => 'nullable|numeric',
            'responses.*.response_boolean' => 'nullable|boolean',
            'responses.*.response_date' => 'nullable|date',
            'responses.*.options' => 'nullable|array',
            'responses.*.options.*.option_key' => 'required_with:responses.*.options|string',
            'responses.*.options.*.option_value' => 'required_with:responses.*.options|string',
        ];
    }
}
