<?php

namespace Tests\Unit;

use App\DTO\QuestionDTO;
use App\Models\Question;
use App\Services\QuestionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionServiceTest extends TestCase
{
    use RefreshDatabase;

    private QuestionService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new QuestionService();
    }

    public function test_it_creates_a_question()
    {
        $dto = new QuestionDTO(
            survey_type_id: 1,
            question_text: 'Sample Question',
            question_type_id: 1,
            options: ['yes', 'no'],
            validation_rules: null,
            is_required: true,
            order_index: 1,
            is_active: true
        );

        $question = $this->service->create($dto);

        $this->assertInstanceOf(Question::class, $question);
        $this->assertEquals('Sample Question', $question->question_text);
    }
}
