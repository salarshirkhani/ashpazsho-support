<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class time extends Model
{
    protected $table='times';
    protected $fillable=['user_id','date','start_time','finish_time'];
    protected $casts = [
        'date' => 'date',
    ];
    
    public function for() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
