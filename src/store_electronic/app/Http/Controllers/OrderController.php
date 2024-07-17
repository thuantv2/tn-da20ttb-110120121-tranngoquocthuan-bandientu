<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Coupon;
use DB;
use Session;
use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use PDF;
use Carbon\Carbon;
use App\Models\Statistical;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }

     public function manage_order(){
        $this->CheckAuth();
        $all_order = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->select('tbl_order.*','users.name')
        ->orderby('tbl_order.order_id','desc')->paginate(10);
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);

        return view('admin_layout')->with('admin.manager_order',$manager_order);
     }

     public function view_order($orderId){
        $this->CheckAuth();
        $all_order = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->select('tbl_order.*','users.name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);

        $order_by_id = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
        ->select('tbl_order.*','users.*','tbl_shipping.*','tbl_order_details.*','tbl_product.*','tbl_payment.*')
        ->where('tbl_order.order_id','=',$orderId)
        ->first();

        $order_by_id_product = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
        ->select('tbl_order.*','users.*','tbl_shipping.*','tbl_order_details.*','tbl_product.*')
        ->where('tbl_order.order_id','=',$orderId)
        ->get();


        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id)->with('all_order',$all_order)->with('order_by_id_product',$order_by_id_product);

        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
     }

     public function updateStatus(Request $request, $id)
    {
        $this->CheckAuth();
        $status = $request->input('status');
        DB::table('tbl_order')->where('order_id',$id)->update(['order_status'=>$status]);

        // Redirect back to order view page
        return redirect()->back();
    }

    public function order_history()
    {    
        $user = DB::table('users')->where('id', Session::get('id'))->get();
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        $dt = DB::table('tbl_product')->where('category_id',1)->orderby('product_id', 'asc')->get();
        $ipad = DB::table('tbl_product')->where('category_id',6)->orderby('product_id','asc')->get();
        $laptop = DB::table('tbl_product')->where('category_id',2)->orderby('product_id','asc')->get();
        $watch = DB::table('tbl_product')->where('category_id',5)->orderby('product_id','asc')->get();
        $phukien = DB::table('tbl_product')->where('category_id',13)->orderby('product_id','asc')->get();
        $camera = DB::table('tbl_product')->where('category_id',14)->orderby('product_id','asc')->get();

        $all_order = DB::table('tbl_order')
        ->where('customer_id',Session::get('id'))
        ->orderby('order_id','desc')->paginate(10);
        return view('pages.order.order_history', compact('category', 'brand', 'dt', 'ipad', 'laptop', 'watch','phukien','camera', 'user', 'all_order'));
    }

    public function view_my_order($orderId){
        $user = DB::table('users')->where('id', Session::get('id'))->get();
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();


        $dt = DB::table('tbl_product')->where('category_id',1)->orderby('product_id', 'asc')->get();
        $ipad = DB::table('tbl_product')->where('category_id',6)->orderby('product_id','asc')->get();
        $laptop = DB::table('tbl_product')->where('category_id',2)->orderby('product_id','asc')->get();
        $watch = DB::table('tbl_product')->where('category_id',5)->orderby('product_id','asc')->get();
        $phukien = DB::table('tbl_product')->where('category_id',13)->orderby('product_id','asc')->get();
        $camera = DB::table('tbl_product')->where('category_id',14)->orderby('product_id','asc')->get();

        $all_order = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->select('tbl_order.*','users.name')
        ->orderby('tbl_order.order_id','desc')->get();

        $order_by_id = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
        ->select('tbl_order.*','users.*','tbl_shipping.*','tbl_order_details.*','tbl_product.*','tbl_payment.*')
        ->where('tbl_order.order_id','=',$orderId)
        ->first();

        $order_by_id_product = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
        ->select('tbl_order.*','users.*','tbl_shipping.*','tbl_order_details.*','tbl_product.*')
        ->where('tbl_order.order_id','=',$orderId)
        ->get();

        return view('pages.order.view_my_order', compact('category', 'brand', 'dt', 'ipad', 'laptop', 'watch','phukien','camera', 'user', 'all_order', 'order_by_id', 'order_by_id_product'));
     }

     public function cancel_order($order_id)
    {
        DB::table('tbl_order')->where('order_id',$order_id)-> update(['order_status'=>4]);
        return redirect()->back();
    }
    public function getStatisticsData()
    {
        $total_products = DB::table('tbl_product')->count();
        $total_orders = DB::table('tbl_order')->count();
        $completed_orders = DB::table('tbl_order')->where('order_status', 3)->count(); // Assuming 3 is the status for completed orders
        $canceled_orders = DB::table('tbl_order')->where('order_status', 4)->count(); // Assuming 4 is the status for canceled orders
        $active_users = DB::table('users')->count(); // Assuming you count active users this way
    
        return response()->json([
            'total_products' => $total_products,
            'total_orders' => $total_orders,
            'completed_orders' => $completed_orders,
            'canceled_orders' => $canceled_orders,
            'active_users' => $active_users,
        ]);
    }

    public function filter_by_date1(Request $request)
{
    $data = $request->all();

    // Lấy dữ liệu từ request
    $dashboard_value = $data['dashboard_value'];

    // Khởi tạo các biến ngày tháng
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

    // Tạo mảng để lưu dữ liệu trả về
    $chart_data = [];

    // Xử lý theo loại lọc
    switch ($dashboard_value) {
        case '7ngay':
            $get = Statistical::whereBetween('order_date', [$sub7days, $now])
                ->orderBy('order_date', 'ASC')
                ->get();
            break;
        case 'thangtruoc':
            $get = Statistical::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])
                ->orderBy('order_date', 'ASC')
                ->get();
            break;
        case 'thangnay':
            $get = Statistical::whereBetween('order_date', [$dauthangnay, $now])
                ->orderBy('order_date', 'ASC')
                ->get();
            break;
        case '365ngayqua':
            $get = Statistical::whereBetween('order_date', [$sub365days, $now])
                ->orderBy('order_date', 'ASC')
                ->get();
            break;
        default:
            // Mặc định lọc từ ngày đến ngày
            $from_date = $data['from_date'];
            $to_date = $data['to_date'];

            $get = Statistical::whereBetween('order_date', [$from_date, $to_date])
                ->orderBy('order_date', 'ASC')
                ->get();
            break;
    }

    // Đổ dữ liệu vào mảng chart_data
    foreach ($get as $val) {
        $chart_data[] = [
            'period' => $val->order_date,
            'order' => $val->total_order,
            'sales' => $val->sales,
            'profit' => $val->profit,
            'quantity' => $val->quantity
        ];
    }

    // Trả về JSON response
    return response()->json($chart_data);
}
public function filterBestSellingProducts(Request $request)
{
    // Lấy dữ liệu từ request nếu cần thiết
    $filter = $request->input('filter'); // Ví dụ: loại sản phẩm, thương hiệu,...

    // Xử lý lấy danh sách các sản phẩm bán chạy nhất
    $best_selling_products = DB::table('tbl_order_details')
        ->join('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
        ->select('tbl_product.*', DB::raw('SUM(tbl_order_details.quantity) as total_quantity'))
        ->groupBy('tbl_product.product_id')
        ->orderByDesc('total_quantity');

    // Áp dụng bộ lọc nếu có
    if ($filter) {
        // Ví dụ: Lọc theo loại sản phẩm
        $best_selling_products->where('tbl_product.category_id', $filter);
    }

    // Giới hạn số lượng sản phẩm bán chạy trả về
    $best_selling_products = $best_selling_products->limit(10)->get();

    return response()->json($best_selling_products);
}
}