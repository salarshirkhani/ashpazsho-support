<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'explain',
        'iframe',
        'content',
        'writer',
        'category',
        'pic',
        'file',
        'gtitle',
        'gexplain',
        'show_at',
    ];

    protected $table = 'posts';

    public function keywords() {
        return $this->belongsToMany('App\Keyword', 'service_keyword_relation', 'post_id', 'keyword_id')->withTimestamps();
    }

    public function postcategory() {
        return $this->belongsTo('App\postcategory', 'category');
    }

    public function comment() {
        return $this->hasMany('App\comment', 'post_id');
    }
}
