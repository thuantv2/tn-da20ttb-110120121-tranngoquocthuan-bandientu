<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;
use App\Models\Admin;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->CheckAuth();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request-> admin_email;
        $admin_password = md5($request-> admin_password);

        $result = DB::table('tbl_admin')-> where ('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/laravel/php/dashboard');
        }else{
            Session::put('message','Sai tài khoản hoặc mật khẩu!');
            return Redirect::to('/laravel/php/admin');
        }
    }

    public function logout()
    {
        $this->CheckAuth();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/laravel/php/dashboard');
    }
// Trong AdminController.php
// Trong AdminController.php

public function filter_by_date(Request $request){
    $data = $request->all();
    $from_date = $data['from_date'];
    $to_date = $data['to_date'];

    $get = Statistic::whereBetween ('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();
    foreach($get as $key => $val) {

    $chart_data[] = array(
            'period'=> $val->order_date,
            'order'=> $val->total_order,
            'sales'=> $val->sales,
            'profit'=> $val->profit,
            'quantity'=> $val->quantity
    );
}
    echo $data = json_encode($chart_data);
}

}
