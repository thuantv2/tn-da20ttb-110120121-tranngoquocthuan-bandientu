<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Mail;
use App\Models\Product;


class HomeController extends Controller
{
        public function index()
        {
            $category = DB::table('tbl_category_product')->where('category_status', 1)->orderBy('category_id', 'asc')->get();
            $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
            $dt = DB::table('tbl_product')->where('category_id', 1)->orderBy('product_id', 'asc')->get();
            $ipad = DB::table('tbl_product')->where('category_id', 6)->orderBy('product_id', 'asc')->get();
            $laptop = DB::table('tbl_product')->where('category_id', 2)->orderBy('product_id', 'asc')->get();
            $watch = DB::table('tbl_product')->where('category_id', 5)->orderBy('product_id', 'asc')->get();
            $phukien = DB::table('tbl_product')->where('category_id', 13)->orderBy('product_id', 'asc')->get();
            $camera = DB::table('tbl_product')->where('category_id', 14)->orderBy('product_id', 'asc')->get();
            
            $products = DB::table('tbl_product')->get();
            
            return view('pages.home')
                ->with('category', $category)
                ->with('brand', $brand)
                ->with('dt', $dt)
                ->with('ipad', $ipad)
                ->with('laptop', $laptop)
                ->with('watch', $watch)
                ->with('phukien', $phukien)
                ->with('camera', $camera)
                ->with('products', $products);
        }
    

    public function information(){
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        $user = DB::table('users')->where('id', Session::get('id'))->get();
        return view('pages.user_info')->with('category',$category)->with('brand',$brand)->with('user',$user);
    }

    public function update_user(Request $request, $id)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'email|unique:users,email,'.$id,
        'phone' => 'required|numeric',
        'address' => 'required'
        ]);
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        
        return redirect()->back();
    }

    // public function search(Request $request)
    // {
    //     $key = $request->keyword;
    //     $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
    //     $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();


    //     $search_product = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->get();

    //     return view('pages.product.search')->with('category',$category)->with('brand',$brand)->with('search_product',$search_product);
    // }
// Controller method

// ProductController.php
public function filter(Request $request)
{
    $sortBy = $request->input('sortBy');
    
    $query = DB::table('tbl_product');
    
    if ($sortBy == 'price_asc') {
        $query->orderByRaw('CAST(product_price AS DECIMAL(15,2)) ASC');
    } elseif ($sortBy == 'price_desc') {
        $query->orderByRaw('CAST(product_price AS DECIMAL(15,2)) DESC');
    }
    
    $filteredProducts = $query->get();
    
    $category = DB::table('tbl_category_product')->where('category_status', 1)->orderBy('category_id', 'asc')->get();
    $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

    return view('pages.product.filter')->with('category', $category)->with('brand', $brand)->with('filteredProducts', $filteredProducts);
}

}
