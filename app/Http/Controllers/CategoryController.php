<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function list() {
    	$categories = Category::all();
    	return view('admin.category.list', ['categories' => $categories]);
    }

    public function get_add() {
    	return view('admin.category.add');
    }

    public function add(Request $request) {
    	$category = new Category;
    	$category->name = $request->name;
    	$category->cut_name = changeTitle($request->name);
    	$category->save();
    	return redirect('admin/category/them')->with('note', 'Đã thêm thành công!');
    }

    public function get_edit($id) {
    	$category = Category::find($id);
    	return view('admin/category/edit', ['category' => $category]);
    }

    public function edit($id, Request $request) {
    	$category = Category::find($id);
    	$category->name = $request->name;
    	$category->save();
    	return redirect('admin/category/danhsach')->with('note', 'Sửa thành công!');
    }

    public function delete($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/danhsach')->with('note', 'Xoá thành công!');
    }
}
