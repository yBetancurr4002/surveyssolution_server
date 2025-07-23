<?php

namespace Database\Factories;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyFactory extends Factory
{
    protected $model = Survey::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'survey_type_id' => 1,
            'survey_status_id' => 1,
            'title' => $this->faker->sentence,
            'started_at' => now(),
            'completed_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
