<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    protected $table = 'user_statuses';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_status_id');
    }
}
