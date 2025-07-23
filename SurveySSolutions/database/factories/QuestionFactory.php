<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'survey_type_id' => 1,
            'question_text' => $this->faker->sentence,
            'question_type_id' => 1,
            'options' => json_encode(['yes', 'no']),
            'validation_rules' => null,
            'is_required' => true,
            'order_index' => 1,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
