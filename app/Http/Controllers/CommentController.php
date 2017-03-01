<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\News;

class CommentController extends Controller
{
    public function add(Request $request, $news_id)
    {
    	$comment = new Comment;
    	$comment->news_id = $news_id;
    	$comment->user_id = $request->user_id;
    	$comment->content = $request->content;

    	$comment->save();
    	return redirect()->route('news.detail', [$news_id, 'title']);
    }

}
