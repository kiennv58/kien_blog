<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    public function news_type() {
    	return $this->belongsTo('App\NewsType', 'news_type_id', 'id');
    }

    public function comment() {
    	return $this->hasMany('App\Comment', 'news_id', 'id');
    }
}
