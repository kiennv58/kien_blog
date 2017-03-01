<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    protected $table = "news_type";

    public function category() {
    	return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function news() {
    	return $this->hasMany('App\News', 'news_type_id', 'id');
    }
}
