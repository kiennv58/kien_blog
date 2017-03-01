<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Category;
use App\User;

Route::get('/', function () {
    return view('welcome');
});
Route::get('faker', function() {
	$faker = Faker\Factory::create();
	$limit = 5;
	for ($i=0; $i < $limit; $i++) { 
		echo $faker . '<br>';
	}
});
Route::get('test', 'PageController@home');

// ADMIN ROUTE
// Route::get('admin/dangnhap', 'UserController@get_admin_login');
// Route::post('admin/dangnhap', 'UserController@admin_login');
Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function() {
	Route::group(['prefix' => 'category'], function() {
		Route::get('danhsach', 'CategoryController@list');
		Route::get('sua/{id}', 'CategoryController@get_edit');
		Route::post('sua/{id}', 'CategoryController@edit');
		Route::get('them', 'CategoryController@get_add');
		Route::post('them', 'CategoryController@add');
		Route::get('xoa/{id}', 'CategoryController@delete');
	});

	Route::group(['prefix' => 'news_type'], function() {
		Route::get('danhsach', 'NewsTypeController@list');
		Route::get('sua/{id}', 'NewsTypeController@get_edit');
		Route::post('sua/{id}', 'NewsTypeController@edit');
		Route::get('them', 'NewsTypeController@get_add');
		Route::post('them', 'NewsTypeController@add');
		Route::get('xoa/{id}', 'NewsTypeController@delete');
	});

	Route::group(['prefix' => 'user'], function() {
		Route::get('danhsach', 'UserController@list');
		Route::get('sua/{id}', 'UserController@get_edit');
		Route::post('sua/{id}', 'UserController@edit');
		Route::get('them', 'UserController@get_add');
		Route::post('them', 'UserController@add');
		Route::get('xoa/{id}', 'UserController@delete');
	});

	Route::group(['prefix' => 'news'], function() {
		Route::get('danhsach', 'NewsController@list');
		Route::get('sua/{id}', 'NewsController@get_edit');
		Route::post('sua/{id}', 'NewsController@edit');
		Route::get('them', 'NewsController@get_add');
		Route::post('them', 'NewsController@add');
		Route::get('xoa/{id}', 'NewsController@delete');
	});

	Route::group(['prefix' => 'slide'], function() {
		Route::get('danhsach', 'SlideController@list');
		Route::get('sua/{id}', 'SlideController@get_edit');
		Route::post('sua/{id}', 'SlideController@edit');
		Route::get('them', 'SlideController@get_add');
		Route::post('them', 'SlideController@add');
		Route::get('xoa/{id}', 'SlideController@delete');
	});

	Route::group(['prefix' => 'ajax'], function() {
		Route::get('news_type/{cagegory_id}', 'AjaxController@get_news_type');
	});
});

// ROUTE FRONT END
Route::get('/', 'PageController@home');
Route::get('news-detail/{id}-{title}', [
	'as' => 'news.detail',
	'uses' => 'PageController@news_detail'
	]);
Route::get('category/{id}-{name}', [
	'as' => 'category.list',
	'uses' => 'PageController@list_news_of_category'
	]);
Route::get('news_type/{id}-{name}', [
	'as' => 'news_type.list',
	'uses' => 'PageController@list_news_of_news_type'
	]);
Route::get('dangnhap', 'PageController@get_login');
Route::post('dangnhap', 'PageController@login');
Route::get('dangxuat', 'PageController@logout');
Route::post('comment/{news_id}', 'CommentController@add');