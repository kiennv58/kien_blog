<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\NewsType;
use App\News;
use App\Slide;
use App\Comment;

class PageController extends Controller
{
	function __construct()
	{
		$top_view = News::orderBy('view', 'DESC')->limit(5)->get();
		$top_comment = Comment::orderBy('id', 'DESC')->limit(5)->get();
		$list_category = Category::all();
		view()->share(['list_category' => $list_category, 'top_view'=> $top_view, 'top_comment' => $top_comment]);
		// 
	}

	public function get_login()
    {
    	return view('pages.login');
    }

    public function login(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required|min:3|max:32'
    		],[
    		'email.required' => 'Bạn chưa nhập email',
    		'password.required' => 'Bạn chưa nhập password',
    		'password.min' => 'Password không được nhỏ hơn 3 kí tự',
    		'password.max' => 'Password không được lớn hơn 32 kí tự'
    		]);
    	// dd($request->password);
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		// dd(Auth::check());
    		return redirect('/');
    	} else {
    		return redirect('/dangnhap')->with('note', 'Sai tên đăng nhập hoặc mật khẩu');
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }

    public function home()
    {
    	$slides = Slide::limit(3)->get();
    	$news = News::paginate(8);
    	return view('pages.home', ['news' => $news, 'slides' => $slides, 'title_top' => 'BÀI VIẾT MỚI NHẤT']);
    }

    public function news_detail($id, $title)
    {
    	News::where('id', $id)->Increment('view');
    	$news = News::find($id);
    	$comments = $news->comment;
    	return view('pages.news_detail', ['news' => $news, 'comments' => $comments]);
    }

    public function list_news_of_category($id, $name)
    {
    	$category = Category::find($id);
    	$list_news = $category->news()->paginate(8);
    	return view('pages.group_news', ['category' => $category, 'list_news' => $list_news]);
    }

    public function list_news_of_news_type($id, $title)
    {
    	$news_type = NewsType::find($id);
    	$list_news = $news_type->news()->paginate(8);
    	return view('pages.group_news', ['news_type' => $news_type, 'list_news' => $list_news]);
    }

}
