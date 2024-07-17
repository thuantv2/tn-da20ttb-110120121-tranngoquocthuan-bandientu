<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }

    public function add_user()
    {
        $this->CheckAuth();
        return view('admin.add_user');
    }

    public function all_users()
    {
        $this->CheckAuth();
        $all_users = DB::table('users')->paginate(9);
        $manager_user = view('admin.all_users')->with('all_users', $all_users);
        return view('admin_layout')->with('admin.all_users', $manager_user);
    }

    public function save_user(Request $request)
    {
        $this->CheckAuth();
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['password'] = bcrypt($request->password);
        DB::table('users')->insert($data);
        Session::put('message', 'Thêm người dùng thành công');
        return Redirect::to('/laravel/php/add-user');
    }

    public function edit_user($user_id)
    {
        $this->CheckAuth();
        $edit_user = DB::table('users')->where('id', $user_id)->get();
        $manager_user = view('admin.edit_user')->with('edit_user', $edit_user);
        return view('admin_layout')->with('admin.edit_user', $manager_user);
    }

    public function update_user(Request $request, $user_id)
    {
        $this->CheckAuth();
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        DB::table('users')->where('id', $user_id)->update($data);
        Session::put('message', 'Cập nhật người dùng thành công');
        return Redirect::to('/laravel/php/all-users');
    }

    public function delete_user($user_id)
    {
        $this->CheckAuth();
        DB::table('users')->where('id', $user_id)->delete();
        Session::put('message', 'Xóa người dùng thành công');
        return Redirect::to('/laravel/php/all-users');
    }
}
