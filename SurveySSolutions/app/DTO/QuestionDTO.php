<?php

namespace App\DTO;

use Illuminate\Http\Request;

class QuestionDTO
{
    public function __construct(
        public readonly int $survey_type_id,
        public readonly string $question_text,
        public readonly int $question_type_id,
        public readonly ?array $options = null,
        public readonly ?array $validation_rules = null,
        public readonly bool $is_required = true,
        public readonly int $order_index = 0,
        public readonly bool $is_active = true
    ) {}

    public static function fromRequest(Request $request): self
    {
        $validated = $request->validate([
            'survey_type_id' => 'required|exists:survey_types,id',
            'question_text' => 'required|string',
            'question_type_id' => 'required|exists:question_types,id',
            'options' => 'nullable|array',
            'validation_rules' => 'nullable|array',
            'is_required' => 'boolean',
            'order_index' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        return new self(
            $validated['survey_type_id'],
            $validated['question_text'],
            $validated['question_type_id'],
            $validated['options'] ?? null,
            $validated['validation_rules'] ?? null,
            $validated['is_required'] ?? true,
            $validated['order_index'] ?? 0,
            $validated['is_active'] ?? true
        );
    }

    public function toArray(): array
    {
        return [
            'survey_type_id' => $this->survey_type_id,
            'question_text' => $this->question_text,
            'question_type_id' => $this->question_type_id,
            'options' => $this->options,
            'validation_rules' => $this->validation_rules,
            'is_required' => $this->is_required,
            'order_index' => $this->order_index,
            'is_active' => $this->is_active,
        ];
    }
}
