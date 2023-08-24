<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{

    protected $fillable=['support_id', 'sender_id', 'content', 'status','file','img','voice'];
    
    public function for() {
        return $this->belongsTo('App\support', 'support_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'sender_id');
    }
}
