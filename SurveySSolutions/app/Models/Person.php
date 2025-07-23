<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'first_name', 'last_name', 'birth_date',
        'email', 'document_number', 'gender', 'phone'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'person_id');
    }
}
