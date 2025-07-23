<?php

namespace App\Services;

use App\Models\Question;
use App\DTO\QuestionDTO;

class QuestionService
{
    public function create(QuestionDTO $dto): Question
    {
        return Question::create($dto->toArray());
    }

    public function update(Question $question, QuestionDTO $dto): Question
    {
        $question->update($dto->toArray());
        return $question;
    }

    public function delete(Question $question): bool
    {
        return $question->delete();
    }
}
