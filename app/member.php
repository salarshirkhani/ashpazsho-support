<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class member extends Model
{
    use HasApiTokens;

    protected $table='members';

    protected $fillable = [
        'name', 'mobile', 'token', 'status','package'
    ];

    protected $hidden = [
        'remember_token', 'created_at', 'updated_at'
    ];
}
