<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class procedure extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'title',
        'name',
        'email',
        'number',
        'city',
        'age',
        'sex',
        'explain',
        'description',
    ];

    public function for() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
