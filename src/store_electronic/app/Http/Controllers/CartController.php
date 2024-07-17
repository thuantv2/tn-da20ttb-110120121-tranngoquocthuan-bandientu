<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Statistical;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $category = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', 1)->orderby('product_id', 'desc')->limit(4)->get();

        $productId = $request->product_id_hidden;
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = 1;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = 1;
        $data['options']['image'] = $product_info->product_img;
        $data['options']['storage'] = $product_info->product_storage;
        $data['options']['color'] = $product_info->product_color;

        Cart::add($data);
        return redirect()->back();
    }

    public function delete_to_cart($rowId)
    {
        $category = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', 1)->orderby('product_id', 'desc')->limit(4)->get();

        Cart::remove($rowId);

        return redirect()->back()->with('category', $category)->with('brand', $brand)->with('all_product', $all_product);
    }
    public function update_cart(Request $request) {
        Cart::update($request->rowId, $request->qty);
    
        // Update product_sold and product_quantity in tbl_product
        $item = Cart::get($request->rowId);
        $productId = $item->id;
    
        // Increment product_sold by the purchased quantity
        DB::table('tbl_product')
            ->where('product_id', $productId)
            ->increment('product_sold', $request->qty);
    
        // Decrement product_quantity by the purchased quantity
        DB::table('tbl_product')
            ->where('product_id', $productId)
            ->decrement('product_quantity', $request->qty);
    
        // Return any response if necessary
    }
    

}
