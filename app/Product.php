<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'explain',
        'content',
        'price',
		'pic',
		'category'
    ];

    public function keywords() {
        return $this->belongsToMany('App\Keyword', 'product_keyword_relation', 'product_id', 'keyword_id')->withTimestamps();
    }
    
    public function category() {
        return $this->belongsTo('App\Category', 'category');
    }

    public function comment() {
        return $this->hasMany('App\comment', 'product_id');
    }

}
