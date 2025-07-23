<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'survey_id', 'question_id', 'response_value',
        'response_numeric', 'response_boolean', 'response_date'
    ];

    protected $casts = [
        'response_boolean' => 'boolean'
    ];

    protected $dates = ['response_date'];

    // Relaciones
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    // Opciones múltiples seleccionadas
    public function options()
    {
        return $this->hasMany(ResponseOption::class, 'response_id');
    }
}
