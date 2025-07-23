<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyType extends Model
{
    protected $table = 'survey_types';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name', 'description', 'survey_type_status_id',
        'created_by', 'updated_by'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

