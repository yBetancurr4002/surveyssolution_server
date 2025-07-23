<?php

namespace App\Http\Controllers;

use App\DTO\SurveyDTO;
use App\Models\Survey;
use App\Services\SurveyService;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function __construct(private SurveyService $service) {}

    public function index()
    {
        return response()->json(Survey::all());
    }

    public function store(Request $request)
    {
        $dto = SurveyDTO::fromRequest($request);
        $survey = $this->service->create($dto);

        return response()->json($survey, 201);
    }

    public function show(Survey $survey)
    {
        return response()->json($survey);
    }

    public function update(Request $request, Survey $survey)
    {
        $dto = SurveyDTO::fromRequest($request);
        $survey = $this->service->update($survey, $dto);

        return response()->json($survey);
    }

    public function destroy(Survey $survey)
    {
        $this->service->delete($survey);
        return response()->json(null, 204);
    }

    public function results(Survey $survey)
    {
        $survey = $this->service->results($survey);
        return response()->json($survey);
    }
}
