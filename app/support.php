<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class support extends Model
{
    protected $table='supports';

    protected $fillable = [
        'slug', 'subject', 'status', 'departmant','profile','description'
    ];

    public function chat() {
        return $this->hasMany('App\chat', 'support_id');
    }

    
}
