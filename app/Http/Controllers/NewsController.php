<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\NewsType;
use App\News;

class NewsController extends Controller
{
	/**
	 * @param string
	 */
    public function list()
    {
    	$news = News::orderBy('id', 'DESC')->get();
    	// var_dump($news);die();
    	return view('admin.news.list', ['news' => $news]);
    }

    
    public function get_add()
    {
    	$category = Category::all();
    	return view('admin.news.add', ['category' => $category]);
    }

    public function add(Request $request)
    {
    	$news = new News;
    	$category = Category::all();
    	$news->title = $request->title;
    	$news->description = $request->description;
    	$news->content = $request->content;
    	$news->news_type_id = $request->news_type_id;
    	$news->high_light = $request->high_light;
    	$news->cut_title = changeTitle($request->title);
    	if ($request->hasFile('img')) {
    		$file = $request->file('img');
    		$name = $file->getClientOriginalName();
    		$image = str_random(4). "_" . $name;
    		while (file_exists('upload/news/'.$image)) {
    			$image = str_random(4). "_" . $name;
    		}
    		$file->move("upload/news", $image);
    		$news->img = $image;
    	} else {
    		$news->img = '';
    	}
    	$news->save();

    	return redirect('admin/news/them')->with('note', 'Thêm mới tin tức thành công!');
    }

    public function get_edit($id)
    {
    	$news = News::find($id);
    	// var_dump($news->news_type->category_id);die();
    	$category = Category::all();
    	$news_type = NewsType::where('category_id', $news->news_type->category_id)->get();

    	return view('admin.news.edit', ['news' => $news, 'category' => $category, 'news_type' => $news_type]);
    }

    public function edit(Request $request, $id)
    {
    	$news = News::find($id);
    	$news->title = $request->title;
    	$news->description = $request->description;
    	$news->content = $request->content;
    	$news->news_type_id = $request->news_type_id;
    	$news->high_light = $request->high_light;
    	$news->cut_title = changeTitle($request->title);
    	if ($request->hasFile('img')) {
    		$file = $request->file('img');
    		$name = $file->getClientOriginalName();
    		$image = str_random(4). "_" . $name;
    		while (file_exists('upload/news/'.$image)) {
    			$image = str_random(4). "_" . $name;
    		}
    		$file->move("upload/news", $image);
            if (file_exists("upload/news/".$news->img)) {
                unlink("upload/news/".$news->img);
            }
    		$news->img = $image;
    	} else {
    		$news->img = '';
    	}
    	$news->save();

    	return redirect('admin/news/sua/'.$id)->with('note', 'Sửa tin tức thành công!');
    }

    public function delete($id)
    {
    	$news = News::find($id);
    	$news->delete();

    	return redirect('admin/news/danhsach')->with('note', 'Đã xóa thành công!');
    }

}
