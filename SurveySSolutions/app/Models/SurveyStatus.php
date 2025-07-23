<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyStatus extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'survey_status_id');
    }
}
