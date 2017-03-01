<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\NewsType;
use App\News;

class AjaxController extends Controller
{
	public function get_news_type($category_id)
    {
        $news_types = NewsType::where('category_id', $category_id)->get();
        foreach ($news_types as $news_type) {
            echo "<option value='" . $news_type->id . "'>" . $news_type->name . "</option>";
        }
    }
}
