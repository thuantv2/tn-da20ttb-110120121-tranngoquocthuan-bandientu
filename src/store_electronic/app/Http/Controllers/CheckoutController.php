<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Coupon;
use DB;
use Session;
use Mail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class CheckoutController extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }

    public function check_coupon(Request $request)
        {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon -> coupon_code,
                            'coupon_type' => $coupon -> coupon_type,
                            'coupon_value' => $coupon -> coupon_value,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                    'coupon_code' => $coupon -> coupon_code,
                    'coupon_type' => $coupon -> coupon_type,
                    'coupon_value' => $coupon -> coupon_value,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message',$coupon -> coupon_code);
            }
        }else{
            Session::put('coupon',null);
            return redirect()->back()->with('message','Apply voucher failed');
        }
    }

    public function unset_coupon()
    {
        $coupon = Session::get('coupon');
        if($coupon = true){
            Session::forget('coupon');
             return redirect()->back();
        }
    }

    public function checkout(){
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        return view('pages.checkout.fcheckout')->with('category',$category)->with('brand',$brand);
    }

    public function order_place(Request $request)
{
    $category = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'asc')->get();
    $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();

    // Insert shipping info
    $ship = array();
    $ship['shipping_name'] = $request->shipping_name;
    $ship['shipping_email'] = $request->shipping_email;
    $ship['shipping_address'] = $request->shipping_address;
    $ship['shipping_phone'] = $request->shipping_phone;
    $ship['shipping_note'] = $request->shipping_note;
    $ship_id = DB::table('tbl_shipping')->insertGetId($ship);
    Session::put('shipping_id', $ship_id);

    // Insert payment method
    $data = array();
    $data['payment_method'] = $request->payment_option;
    $data['payment_status'] = 'Pending';
    $payment_id = DB::table('tbl_payment')->insertGetId($data);

    // Insert order
    $order_data = array();
    $order_data['customer_id'] = Session::get('id');
    $order_data['shipping_id'] = Session::get('shipping_id');
    $order_data['payment_id'] = $payment_id;
    $order_data['order_total'] = number_format($request->total, 0, '.', ',');
    $order_data['order_status'] = '1';
    $order_id = DB::table('tbl_order')->insertGetId($order_data);

    // Insert order_details
    $content = Cart::content();
    foreach($content as $value){
        $order_d_data = array();
        $order_d_data['order_id'] = $order_id;
        $order_d_data['product_id'] = $value->id;
        $order_d_data['product_name'] = $value->name;
        $order_d_data['product_price'] = $value->price;
        $order_d_data['order_details_quantity'] = $value->qty;
        $order_d_data['product_color'] = $value->options->color;
        $order_d_data['product_storage'] = $value->options->storage;
        $result = DB::table('tbl_order_details')->insertGetId($order_d_data);

        // Update statistics
        $order_data['order_details_quantity'] = isset($order_data['order_details_quantity']) ? $order_data['order_details_quantity'] + $value->qty : $value->qty;
    }

    // Update statistics
    $this->updateStatistics($order_data);

    $order_info = [
        'shipping_name' => $request->shipping_name,
        'shipping_address' => $request->shipping_address,
        'shipping_phone' => $request->shipping_phone,
        'shipping_note' => $request->shipping_note, 
        'payment_method' => $request->payment_option, 
        'order_total' => number_format($request->total, 0, '.', ','),
    ];

    Session::put('order_info', $order_info);
    $request->session()->put('content', $content);
    $this->sendmail($request->shipping_email);
    $request->session()->flash('content', $content);
    Session::put('coupon', null);

    // Set payment success session
    if ($data['payment_method'] == 1) {
        // Cash
        Session::put('success_paypal', null);
        Session::put('success_momo', null);
        Session::put('success_vnpay', null);
    } elseif ($data['payment_method'] == 2) {
        // PayPal
        Session::put('success_paypal', 1);
        Session::put('success_momo', null);
        Session::put('success_vnpay', null);
    } elseif ($data['payment_method'] == 3) {
        // MOMO
        Session::put('success_paypal', null);
        Session::put('success_momo', 3);
        Session::put('success_vnpay', null);
    } elseif ($data['payment_method'] == 4) {
        // VNPay
        Session::put('success_paypal', null);
        Session::put('success_momo', null);
        Session::put('success_vnpay', 4);
    }
    

    Cart::destroy();
    return view('pages.checkout.cash')->with('order_info', $order_info)->with('category', $category)->with('brand', $brand);
}

    


    private function updateStatistics($order_data)
    {
        $today = Carbon::today()->toDateString();
        $statistical = Statistical::where('order_date', $today)->first();
    
    
        // if (!$statistical) {
        //     $statistical = new Statistical();
        //     $statistical->order_date = $today;
        //     $statistical->sales = 0;
        //     $statistical->profit = 0;
        //     $statistical->quantity = 0;
        //     $statistical->total_order = 0;
        // }
    
        // dd($order_data);
    
        // $statistical = Statistical::firstOrNew(['order_date' => date('Y-m-d')]);
        // $statistical->sales = isset($statistical->sales) ? $statistical->sales + floatval(str_replace(',', '', $order_data['order_total'])) : floatval(str_replace(',', '', $order_data['order_total']));
        // $statistical->profit = isset($statistical->profit) ? $statistical->profit + (floatval(str_replace(',', '', $order_data['order_total']))) : (floatval(str_replace(',', '', $order_data['order_total'])));
        // $statistical->quantity = isset($statistical->quantity) ? $statistical->quantity + $order_data['order_details_quantity'] : $order_data['order_details_quantity'];
        // $statistical->total_order = isset($statistical->total_order) ? $statistical->total_order + 1 : 1;
        // $statistical->save();
        // dd($statistical);
    
        // $statistical->save();
        if (!$statistical) {
            $statistical = new Statistical();
            $statistical->order_date = $today;
            $statistical->sales = 0;
            $statistical->profit = 0;
            $statistical->quantity = 0;
            $statistical->total_order = 0;
        }
    
        $content = Cart::content();
        $total_profit = 0;
    
        foreach ($content as $value) {
            // Tính toán lợi nhuận từng sản phẩm
            $product = Product::find($value->id);
            if ($product) {
                $product_price = floatval(str_replace(',', '', $value->price));
                $product_import = floatval(str_replace(',', '', $product->product_import)); // Giả sử product_import là trường chứa giá nhập của sản phẩm
                $profit_per_product = ($product_price - $product_import) * $value->qty;
                $total_profit += $profit_per_product;
            }
        }
    
        $statistical->sales = isset($statistical->sales) ? $statistical->sales + floatval(str_replace(',', '', $order_data['order_total'])) : floatval(str_replace(',', '', $order_data['order_total']));
        $statistical->profit = isset($statistical->profit) ? $statistical->profit + $total_profit : $total_profit;
        $statistical->quantity = isset($statistical->quantity) ? $statistical->quantity + $order_data['order_details_quantity'] : $order_data['order_details_quantity'];
        $statistical->total_order = isset($statistical->total_order) ? $statistical->total_order + 1 : 1;
    
        $statistical->save();
       
    }
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
public function momo_payment(Request $request)
{
    $total_bill = $request->input('momo');
    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

    $orderInfo = "Thanh toán qua ATM MoMo";
    $amount = $total_bill;
    $orderId = time() . "";
    $redirectUrl = "http://127.0.0.1:8000/laravel/php/checkout";
    $ipnUrl = "http://127.0.0.1:8000/laravel/php/checkout";
    $extraData = "";
    
    
    
        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there
    
        return redirect()->to($jsonResult['payUrl']);
}
public function vnpay_payment(Request $request)
    {
        $total_bill = $request->input('vnpay');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/laravel/php/checkout"; // Cập nhật URL trả về
        $vnp_TmnCode = "9UIOZWDY"; // Mã website của bạn tại VNPay
        $vnp_HashSecret = "ABS5VPWC9AAGOT9WIVBK1XVMA7GFCVZ8"; // Chuỗi bí mật

        $vnp_TxnRef = time(); // Mã giao dịch. Mỗi lần thanh toán bạn cần tạo một mã giao dịch duy nhất
        $vnp_OrderInfo = "Thanh toán hoá đơn";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $total_bill * 100; // Số tiền cần thanh toán (tính bằng VND)
        $vnp_Locale = "vn"; // Ngôn ngữ. Mặc định là tiếng Việt (vn)
        $vnp_BankCode = "NCB"; // Mã ngân hàng. Nếu không có, để trống.
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; // Địa chỉ IP của khách hàng
    
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
       
    }
    public function sendmail($to_email){
        $to_name = "StoreT";
        $order_info = Session::get('order_info');
        $data = array(
            "customer_name" => $order_info['shipping_name'],
            "shipping_address" => $order_info['shipping_address'],
            "shipping_phone" => $order_info['shipping_phone'],
            "shipping_note" => $order_info['shipping_note'],
            "payment_method" => $order_info['payment_method'],
            "cart_items" => Session::get('content'),
            "total" => $order_info['order_total']
        );
        
        Mail::send('pages.sendmail',$data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Xác nhận đơn hàng');
            $message->from($to_email,$to_name);//send from this mail
        });
        return redirect('laravel/php/trangchu')->with('message','');
    }

//     public function vnpay_return(Request $request)
// {
//     // Logic xử lý sau khi thanh toán thành công
//     // Bạn có thể lấy thông tin từ request và kiểm tra trạng thái thanh toán

//     // Hiển thị trang đơn hàng
//     return view('order-history'); // Thay 'order.success' bằng tên view của bạn
// }


}
