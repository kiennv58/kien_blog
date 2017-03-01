<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    public function type() {
    	return $this->hasMany('App\NewsType', 'category_id', 'id');
    }

    public function news() {
    	return $this->hasManyThrough('App\News', 'App\NewsType', 'category_id', 'news_type_id', 'id');
    }
}
