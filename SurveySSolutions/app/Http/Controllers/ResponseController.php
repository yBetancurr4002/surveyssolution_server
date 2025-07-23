<?php

namespace App\Http\Controllers;

use App\Services\ResponseService;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function __construct(private ResponseService $service) {}

    public function store(Request $request, int $surveyId)
    {
        $validated = $request->validate([
            'responses' => 'required|array|min:1',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|string',
            'responses.*.response_numeric' => 'nullable|numeric',
            'responses.*.response_boolean' => 'nullable|boolean',
            'responses.*.response_date' => 'nullable|date',
            'responses.*.options' => 'nullable|array',
            'responses.*.options.*.option_key' => 'required_with:responses.*.options|string',
            'responses.*.options.*.option_value' => 'required_with:responses.*.options|string',
        ]);

        $this->service->storeResponses($surveyId, $validated['responses']);

        return response()->json(['message' => 'Responses saved'], 201);
    }
}
