<?php

namespace App\DTO;

class SurveyTypeDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description,
        public readonly int $survey_type_status_id,
        public readonly int $created_by,
        public readonly int $updated_by,
    ) {}

    public static function fromRequest(\Illuminate\Http\Request $request): self
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'survey_type_status_id' => 'sometimes|required|exists:survey_type_statuses,id',
            'created_by' => 'required|exists:users,id',
            'updated_by' => 'required|exists:users,id',
        ]);

        return new self(
            $validated['name'] ?? '',
            $validated['description'] ?? null,
            $validated['survey_type_status_id'] ?? 1,
            $validated['created_by'],
            $validated['updated_by'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'survey_type_status_id' => $this->survey_type_status_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
