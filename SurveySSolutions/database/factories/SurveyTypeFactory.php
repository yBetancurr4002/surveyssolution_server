<?php

namespace Database\Factories;

use App\Models\SurveyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyTypeFactory extends Factory
{
    protected $model = SurveyType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'survey_type_status_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
