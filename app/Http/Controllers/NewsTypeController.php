<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsType;
use App\Category;

class NewsTypeController extends Controller
{
    public function list() {
    	$NewsTypes = NewsType::all();
    	return view('admin/news_type/list', ['news_types' => $NewsTypes]);
    }

    public function get_add() {
    	$category = Category::all();
    	return view('admin/news_type/add', ['category' => $category]);
    }

    public function add(Request $request) {
    	$news_type = new NewsType;
    	$news_type->category_id = $request->category_id;
    	$news_type->name = $request->name;
    	$news_type->cut_name = changeTitle($request->name);
    	$news_type->save();
    	return redirect('admin/news_type/them')->with('note', 'Them thanh cong');
    }

    public function get_edit($id) {
    	$news_type = NewsType::find($id);
    	$category = Category::all();
    	return view('admin/news_type/edit', ['news_type' => $news_type, 'category' => $category]);
    }

    public function edit($id, Request $request) {
    	$news_type = NewsType::find($id);
    	$news_type->category_id = $request->category_id;
    	$news_type->name = $request->name;
    	$news_type->save();
    	return redirect('admin/news_type/danhsach')->with('note', 'Sửa thanh cong');
    }

    public function delete($id) {
    	$news_type = NewsType::find($id);
    	$news_type->delete();
    	return redirect('admin/news_type/danhsach')->with('note', 'Xóa thành công');
    }
}
