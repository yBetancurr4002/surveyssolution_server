<?php

namespace Tests\Unit;

use App\DTO\SurveyDTO;
use App\Models\Survey;
use App\Services\SurveyService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyServiceTest extends TestCase
{
    use RefreshDatabase;

    private SurveyService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new SurveyService();
    }

    public function test_it_creates_a_survey()
    {
        $dto = new SurveyDTO(
            user_id: 1,
            survey_type_id: 1,
            survey_status_id: 1,
            title: 'Test Survey',
            started_at: now()->toDateTimeString(),
            completed_at: null
        );

        $survey = $this->service->create($dto);

        $this->assertInstanceOf(Survey::class, $survey);
        $this->assertEquals('Test Survey', $survey->title);
    }

    public function test_it_updates_a_survey()
    {
        $survey = Survey::factory()->create();

        $dto = new SurveyDTO(
            user_id: $survey->user_id,
            survey_type_id: $survey->survey_type_id,
            survey_status_id: $survey->survey_status_id,
            title: 'Updated Survey',
            started_at: now()->toDateTimeString(),
            completed_at: null
        );

        $updated = $this->service->update($survey, $dto);

        $this->assertEquals('Updated Survey', $updated->title);
    }

    public function test_it_deletes_a_survey()
    {
        $survey = Survey::factory()->create();

        $result = $this->service->delete($survey);

        $this->assertTrue($result);
        $this->assertDatabaseMissing('surveys', ['id' => $survey->id]);
    }
}
