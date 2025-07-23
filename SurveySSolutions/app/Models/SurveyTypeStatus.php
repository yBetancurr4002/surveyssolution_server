<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyTypeStatus extends Model
{
    protected $table = 'survey_type_statuses';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description'
    ];

    public function surveyTypes()
    {
        return $this->hasMany(SurveyType::class, 'survey_type_status_id');
    }
}
