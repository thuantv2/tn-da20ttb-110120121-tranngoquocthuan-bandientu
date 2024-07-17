<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }
    
     public function add_product()
    {
        $this->CheckAuth();
        $category = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        return view ('admin.add_product')->with('category',$category)->with('brand',$brand);
    }

    public function all_product()
    {
        $this->CheckAuth();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->orderBy('tbl_product.product_id', 'desc')
        ->paginate(6);
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $this->CheckAuth();
    
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_desc' => 'required',
            'product_content' => 'required',
            'product_price' => 'required',
            'product_storage' => 'required',
            'product_color' => 'required',
        ]);
    
        $data = [
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_desc' => $request->product_desc,
            'product_content' => $request->product_content,
            'product_price' => $request->product_price,
            'product_storage' => $request->product_storage,
            'product_color' => $request->product_color,
            'product_status' => $request->product_status,
            'product_import' => $request->product_import,
            'product_sold' => $request->product_sold,
            'product_quantity' => $request->product_quantity,
        ];
    
        $image = $request->file('product_img');
        if ($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/product'), $imageName);
            $data['product_img'] = $imageName;
        } else {
            $data['product_img'] = ''; // Handle default image or validation error
        }
    
        DB::table('tbl_product')->insert($data);
    
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/laravel/php/add-product');
    }
    


    public function active_product($product_id)
    {
        $this->CheckAuth();
        DB::table('tbl_product')->where('product_id',$product_id)-> update(['product_status'=>0]);

        return Redirect::to('/laravel/php/all-product');
    }

    public function inactive_product($product_id)
    {
        $this->CheckAuth();
        DB::table('tbl_product')->where('product_id',$product_id)-> update(['product_status'=>1]);

        return Redirect::to('/laravel/php/all-product');
    }

    public function edit_product($product_id)
    {
        $this->CheckAuth();
        $category = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')-> where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('category',$category)->with('brand',$brand);
        return view ('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function update_product(Request $request, $product_id)
{
    $this->CheckAuth();

    $data = [
        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
        'product_desc' => $request->product_desc,
        'product_content' => $request->product_content,
        'product_price' => $request->product_price,
        'product_storage' => $request->product_storage,
        'product_color' => $request->product_color,
    ];

    $image = $request->file('product_img');
    if ($image) {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/product'), $imageName);
        $data['product_img'] = $imageName;
    }

    DB::table('tbl_product')->where('product_id', $product_id)->update($data);

    Session::put('message', 'Cập nhật sản phẩm thành công');
    return Redirect::to('/laravel/php/all-product');
}

    public function delete_product($product_id)
    {
        $this->CheckAuth();
        DB::table('tbl_product')->where('product_id',$product_id)-> delete();
        return Redirect::to('/laravel/php/all-product');
    }


    //FE

    public function product_detail($product_id){
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        $product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id',$product_id)->get();

        foreach($product as $key => $value){
            $category_id = $value -> category_id;
        }

        $realated_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('pages.product.show_detail')->with('category',$category)->with('brand',$brand)->with('product',$product)->with('realated_product',$realated_product);
    }

    //all home
    public function product_home()
    {
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        
        $show = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('product_status',1)
        ->orderby('tbl_product.product_id','desc')
        ->paginate(9);

        return view('pages.product.product_home')->with('category',$category)->with('brand',$brand)->with('show',$show);
    }


    
}
