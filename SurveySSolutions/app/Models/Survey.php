<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'surveys';
    protected $primaryKey = 'id';
    public $timestamps = true;


    protected $fillable = [
        'user_id', 'survey_type_id', 'survey_status_id',
        'title', 'started_at', 'completed_at'
    ];

    protected $dates = ['started_at', 'completed_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function surveyType()
    {
        return $this->belongsTo(SurveyType::class, 'survey_type_id');
    }

    public function responses()
    {
        return $this->hasMany(Response::class, 'survey_id');
    }
}
