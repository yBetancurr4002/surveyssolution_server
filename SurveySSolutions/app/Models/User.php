<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'person_id',
        'email',
        'password',
        'user_status_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'password' => 'hashed'
    ];

    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'person_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\UserStatus::class, 'user_status_id');
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'user_id');
    }

    public function createdSurveyTypes()
    {
        return $this->hasMany(SurveyType::class, 'created_by');
    }

    public function updatedSurveyTypes()
    {
        return $this->hasMany(SurveyType::class, 'updated_by');
    }
}
