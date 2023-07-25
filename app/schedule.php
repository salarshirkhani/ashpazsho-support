<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $fillable=['user_id','content','doctor_id','name','email','mobile'];
    
    public function for() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function doctor() {
        return $this->belongsTo('App\User', 'doctor_id');
    }

}
