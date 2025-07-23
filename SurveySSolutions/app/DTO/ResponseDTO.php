<?php

namespace App\DTO;

use Illuminate\Http\Request;

class ResponseDTO
{
    public function __construct(
        public readonly int $survey_id,
        public readonly int $question_id,
        public readonly ?string $response_value = null,
        public readonly ?float $response_numeric = null,
        public readonly ?bool $response_boolean = null,
        public readonly ?string $response_date = null,
        public readonly ?array $options = null
    ) {}

    public static function fromArray(array $data, int $survey_id): self
    {
        return new self(
            $survey_id,
            $data['question_id'],
            $data['response_value'] ?? null,
            $data['response_numeric'] ?? null,
            $data['response_boolean'] ?? null,
            $data['response_date'] ?? null,
            $data['options'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'survey_id' => $this->survey_id,
            'question_id' => $this->question_id,
            'response_value' => $this->response_value,
            'response_numeric' => $this->response_numeric,
            'response_boolean' => $this->response_boolean,
            'response_date' => $this->response_date,
        ];
    }

    public function options(): ?array
    {
        return $this->options;
    }
}
