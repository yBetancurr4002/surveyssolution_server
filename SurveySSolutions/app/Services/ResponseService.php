<?php

namespace App\Services;

use App\DTO\ResponseDTO;
use App\Models\Response;
use App\Models\ResponseOption;
use Illuminate\Support\Facades\DB;

class ResponseService
{
    public function storeResponses(int $surveyId, array $responseData): void
    {
        DB::transaction(function () use ($responseData, $surveyId) {
            foreach ($responseData as $resp) {
                $dto = ResponseDTO::fromArray($resp, $surveyId);

                $response = Response::updateOrCreate(
                    [
                        'survey_id' => $dto->survey_id,
                        'question_id' => $dto->question_id,
                    ],
                    $dto->toArray()
                );

                if ($dto->options()) {
                    $response->options()->delete();

                    foreach ($dto->options() as $opt) {
                        ResponseOption::create([
                            'response_id' => $response->id,
                            'option_key' => $opt['option_key'],
                            'option_value' => $opt['option_value'],
                        ]);
                    }
                }
            }
        });
    }
}
