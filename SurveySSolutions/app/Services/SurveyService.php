<?php

namespace App\Services;

use App\Models\Survey;
use App\DTO\SurveyDTO;

class SurveyService
{
    public function create(SurveyDTO $dto): Survey
    {
        return Survey::create($dto->toArray());
    }

    public function update(Survey $survey, SurveyDTO $dto): Survey
    {
        $survey->update($dto->toArray());
        return $survey;
    }

    public function delete(Survey $survey): bool
    {
        return $survey->delete();
    }

    public function results(Survey $survey): Survey
    {
        return $survey->load(['responses.question', 'responses.options']);
    }
}
