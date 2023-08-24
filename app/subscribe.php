<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscribe extends Model
{
    protected $table='subscribe';
    protected $fillable = [
        'user_id',
        'support_id',
        'type',
        'status',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function support() {
        return $this->belongsTo('App\support', 'support_id');
    }
}
