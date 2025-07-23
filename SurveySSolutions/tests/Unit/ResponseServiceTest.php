<?php

namespace Tests\Unit;

use App\Services\ResponseService;
use App\Models\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResponseServiceTest extends TestCase
{
    use RefreshDatabase;

    private ResponseService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new ResponseService();
    }

    public function test_it_stores_responses()
    {
        $surveyId = 1;

        $responses = [
            [
                'question_id' => 1,
                'response_value' => 'Yes',
                'response_numeric' => null,
                'response_boolean' => null,
                'response_date' => null,
                'options' => [
                    ['option_key' => 'A', 'option_value' => 'Option A']
                ]
            ],
            [
                'question_id' => 2,
                'response_value' => '42',
                'response_numeric' => 42,
                'response_boolean' => null,
                'response_date' => null,
            ]
        ];

        $this->service->storeResponses($surveyId, $responses);

        $this->assertDatabaseHas('responses', [
            'survey_id' => $surveyId,
            'question_id' => 1,
            'response_value' => 'Yes',
        ]);

        $this->assertDatabaseHas('response_options', [
            'option_key' => 'A',
            'option_value' => 'Option A',
        ]);
    }
}
