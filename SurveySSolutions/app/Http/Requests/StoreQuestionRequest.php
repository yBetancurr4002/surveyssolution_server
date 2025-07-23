<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'survey_type_id' => 'required|exists:survey_types,id',
            'question_text' => 'required|string',
            'question_type_id' => 'required|exists:question_types,id',
            'options' => 'nullable|array',
            'validation_rules' => 'nullable|array',
            'is_required' => 'boolean',
            'order_index' => 'nullable|integer',
            'is_active' => 'boolean',
        ];
    }
}
