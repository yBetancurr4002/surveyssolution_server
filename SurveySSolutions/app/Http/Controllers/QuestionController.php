<?php

namespace App\Http\Controllers;

use App\DTO\QuestionDTO;
use App\Models\Question;
use App\Services\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct(private QuestionService $service) {}

    public function index()
    {
        return response()->json(Question::all());
    }

    public function store(Request $request)
    {
        $dto = QuestionDTO::fromRequest($request);
        $question = $this->service->create($dto);

        return response()->json($question, 201);
    }

    public function show(Question $question)
    {
        return response()->json($question);
    }

    public function update(Request $request, Question $question)
    {
        $dto = QuestionDTO::fromRequest($request);
        $question = $this->service->update($question, $dto);

        return response()->json($question);
    }

    public function destroy(Question $question)
    {
        $this->service->delete($question);
        return response()->json(null, 204);
    }
}
