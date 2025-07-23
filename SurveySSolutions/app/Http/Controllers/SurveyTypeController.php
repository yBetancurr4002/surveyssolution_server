<?php

namespace App\Http\Controllers;

use App\DTO\SurveyTypeDTO;
use App\Models\SurveyType;
use App\Services\SurveyTypeService;
use Illuminate\Http\Request;

class SurveyTypeController extends Controller
{
    public function __construct(private SurveyTypeService $service) {}

    public function index()
    {
        return response()->json(SurveyType::all());
    }

    public function store(Request $request)
    {
        $dto = SurveyTypeDTO::fromRequest($request);
        $surveyType = $this->service->create($dto);

        return response()->json($surveyType, 201);
    }

    public function show(SurveyType $surveyType)
    {
        return response()->json($surveyType);
    }

    public function update(Request $request, SurveyType $surveyType)
    {
        $dto = SurveyTypeDTO::fromRequest($request);
        $surveyType = $this->service->update($surveyType, $dto);

        return response()->json($surveyType);
    }

    public function destroy(SurveyType $surveyType)
    {
        $this->service->delete($surveyType);
        return response()->json(null, 204);
    }
}
