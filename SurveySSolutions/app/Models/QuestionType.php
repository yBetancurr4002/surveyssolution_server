<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    protected $table = 'question_types';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'question_type_id');
    }
}
