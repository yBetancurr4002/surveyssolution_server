<?php

namespace Tests\Unit;

use App\DTO\SurveyTypeDTO;
use App\Models\SurveyType;
use App\Services\SurveyTypeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyTypeServiceTest extends TestCase
{
    use RefreshDatabase;

    private SurveyTypeService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new SurveyTypeService();
    }

    public function test_it_creates_a_survey_type()
    {
        $dto = new SurveyTypeDTO(
            name: 'Type A',
            description: 'Test Type',
            survey_type_status_id: 1,
            updated_by: 1,
            created_by: 1,
        );

        $surveyType = $this->service->create($dto);

        $this->assertInstanceOf(SurveyType::class, $surveyType);
        $this->assertEquals('Type A', $surveyType->name);
    }
}
