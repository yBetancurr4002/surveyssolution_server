<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseOption extends Model
{
    protected $table = 'response_options';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['response_id', 'option_key', 'option_value'];

    public function response()
    {
        return $this->belongsTo(Response::class, 'response_id');
    }
}
