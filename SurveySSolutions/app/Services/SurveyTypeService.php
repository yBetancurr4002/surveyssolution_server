<?php

namespace App\Services;

use App\Models\SurveyType;
use App\DTO\SurveyTypeDTO;

class SurveyTypeService
{
    public function create(SurveyTypeDTO $dto): SurveyType
    {
        return SurveyType::create($dto->toArray());
    }

    public function update(SurveyType $surveyType, SurveyTypeDTO $dto): SurveyType
    {
        $surveyType->update($dto->toArray());
        return $surveyType;
    }

    public function delete(SurveyType $surveyType): bool
    {
        return $surveyType->delete();
    }
}
