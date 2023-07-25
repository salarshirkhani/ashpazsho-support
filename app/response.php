<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'status',
        'content',
        'pic',
        'file',
    ];

    public function for() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
