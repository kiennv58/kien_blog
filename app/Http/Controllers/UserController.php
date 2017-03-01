<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    
    /**
     * Danh sách user
     * @return [type] [description]
     */
    public function list() {
    	$users = User::all();
    	return view('admin/user/list', ['users' => $users]);
    }

    /**
     * Trả về màn hình thêm người dùng mới
     * @return [type] [description]
     */
    public function get_add() {
    	return view('admin/user/add');
    }

    /**
     * Thêm người dùng mới
     * @param Request $request [description]
     */
    public function add(Request $request) {
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->level = $request->level;
    	$user->password = bcrypt($request->password);
    	$user->save();
    	return redirect('admin/user/them')->with('note', 'Thêm thành công');
    }

    /**
     * Trả về màn hình sửa thông tin người dùng
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function get_edit($id) {
    	$user = User::find($id);
    	return view('admin/user/edit', ['user' => $user]);
    }

    /**
     * Sửa thông tin user
     * @param  [type]  $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function edit($id, Request $request) {
    	$user = User::find($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->level = $request->level;
    	$user->password = bcrypt($request->password);
    	$user->save();

    	return redirect('admin/user/danhsach')->with('note', 'Sửa thành công');
    }

    /**
     * Xóa user
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id) {
    	$user = User::find($id);
    	$user->delete();

    	return redirect('admin/user/danhsach')->with('note', 'Xóa thành công');
    }
}
