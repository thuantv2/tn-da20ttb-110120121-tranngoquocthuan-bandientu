<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }

    public function add_admin()
    {
        $this->CheckAuth();
        return view('admin.add_admin');
    }

    public function all_admins()
    {
        $this->CheckAuth();
        $all_admins = DB::table('tbl_admin')->paginate(9);
        $manager_admin = view('admin.all_admins')->with('all_admins', $all_admins);
        return view('admin_layout')->with('admin.all_admins', $manager_admin);
    }

    public function save_admin(Request $request)
    {
        $this->CheckAuth();
        $data = array();
        $data['admin_name'] = $request->name;
        $data['admin_email'] = $request->email;
        $data['admin_phone'] = $request->phone;
        $data['admin_password'] = bcrypt($request->password);
        
        // Thử debug bằng cách dump dữ liệu trước khi insert để kiểm tra
        // dd($data);
    
        DB::table('tbl_admin')->insert($data);
        Session::put('message', 'Thêm quản trị viên thành công');
        return Redirect::to('/laravel/php/add-admin');
    }
    

    public function edit_admin($admin_id)
    {
        $this->CheckAuth();
        $edit_admin = DB::table('tbl_admin')->where('admin_id', $admin_id)->first();
        if (!$edit_admin) {
            // Xử lý khi không tìm thấy admin theo admin_id
            abort(404);
        }
        $manager_admin = view('admin.edit_admin')->with('edit_admin', $edit_admin);
        return view('admin_layout')->with('admin.edit_admin', $manager_admin);
    }
    

    public function update_admin(Request $request, $admin_id)
    {
        $this->CheckAuth();
        $data = array();
        $data['admin_name'] = $request->name;
        $data['admin_email'] = $request->email;
        $data['admin_phone'] = $request->phone;
        if ($request->password) {
            $data['admin_password'] = bcrypt($request->password);
        }
        DB::table('tbl_admin')->where('admin_id', $admin_id)->update($data);
        Session::put('message', 'Cập nhật quản trị viên thành công');
        return Redirect::to('/laravel/php/all-admins');
    }

    public function delete_admin($admin_id)
    {
        $this->CheckAuth();
        DB::table('tbl_admin')->where('admin_id', $admin_id)->delete();
        Session::put('message', 'Xóa quản trị viên thành công');
        return Redirect::to('/laravel/php/all-admins');
    }


    
}
