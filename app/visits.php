<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visits extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'procedure',
        'visit_date',
        'percentage',
    ];

    public function for() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
