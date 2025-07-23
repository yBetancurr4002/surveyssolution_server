<?php

namespace App\DTO;

use Illuminate\Http\Request;

class SurveyDTO
{
    public function __construct(
        public readonly int $user_id,
        public readonly int $survey_type_id,
        public readonly int $survey_status_id,
        public readonly string $title,
        public readonly ?string $started_at = null,
        public readonly ?string $completed_at = null,
    ) {}

    public static function fromRequest(Request $request): self
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'survey_type_id' => 'required|exists:survey_types,id',
            'survey_status_id' => 'required|exists:survey_statuses,id',
            'title' => 'required|string|max:255',
            'started_at' => 'nullable|date',
            'completed_at' => 'nullable|date|after_or_equal:started_at',
        ]);

        return new self(
            $validated['user_id'],
            $validated['survey_type_id'],
            $validated['survey_status_id'],
            $validated['title'],
            $validated['started_at'] ?? null,
            $validated['completed_at'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'survey_type_id' => $this->survey_type_id,
            'survey_status_id' => $this->survey_status_id,
            'title' => $this->title,
            'started_at' => $this->started_at,
            'completed_at' => $this->completed_at,
        ];
    }
}
