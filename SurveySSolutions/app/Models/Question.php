<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'survey_type_id', 'question_text', 'question_type_id',
        'options', 'validation_rules', 'is_required',
        'order_index', 'is_active'
    ];

    protected $casts = [
        'options' => 'array',
        'validation_rules' => 'array',
        'is_required' => 'boolean',
        'is_active' => 'boolean'
    ];

    // Relaciones
    public function surveyType()
    {
        return $this->belongsTo(SurveyType::class, 'survey_type_id');
    }

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class, 'question_type_id');
    }

    // Respuestas a esta pregunta
    public function responses()
    {
        return $this->hasMany(Response::class, 'question_id');
    }
}
