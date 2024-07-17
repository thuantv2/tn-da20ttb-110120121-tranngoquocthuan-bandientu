@extends('admin_layout')
@section('admin_content')

<h6 class="font-weight-bolder mb-0">Sửa sản phẩm</h6>
<hr>
@foreach($edit_product as $key => $pro)
<form style="width: 1500px;" action="{{ URL::to('/laravel/php/update-product',$pro->product_id) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group ">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Tên sản phẩm</label>
    <input type="text" name="product_name" class="form-control" id="product-name" placeholder="Enter product name" value="{{ $pro -> product_name }}">
  </div>
  <label style="font-size:16px" for="product-parent">Danh mục sản phẩm </label>
  <select name="category_id" class="form-control" id="product-parent">
    @foreach($category as $key => $cate)
      @if($cate->category_id == $pro->category_id )
      <option selected value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
      @else
      <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
      @endif
    @endforeach
  </select>
  <br>
  <label style="font-size:16px" for="product-parent">Thương hiệu sản phẩm </label>
  <select name="brand_id" class="form-control" id="product-parent">
    @foreach($brand as $key => $br)
      @if($br->brand_id == $pro->brand_id)
      <option selected value="{{ $br->brand_id }}">{{ $br->brand_name }}</option>
      @else
      <option value="{{ $br->brand_id }}">{{ $br->brand_name }}</option>
      @endif
    @endforeach
  </select>
  <br>
   <div class="form-group ">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Giá sản phẩm</label>
    <input type="text" value="{{ $pro -> product_price }}" name="product_price" class="form-control" id="product-price" placeholder="Enter price">
  </div>
  <div class="form-group ">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Bộ nhớ sản phẩm</label>
    <input type="text" value="{{ $pro -> product_storage }}" name="product_storage" class="form-control" id="product-storage" placeholder="Enter storage">
  </div>
  <div class="form-group ">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Màu sắc sản phẩm </label>
    <input type="text" value="{{ $pro -> product_color }}" name="product_color" class="form-control" id="product-color" placeholder="Enter color">
  </div>
  <div class="form-group ">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Hình ảnh sản phẩm</label>
    <input type="file" name="product_img" class="form-control" id="product-img" >
    <img src="{{ asset('uploads/product/'.$pro->product_img) }}" height="100px" width="100px" alt="">
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Nội dung sản phẩm</label>
    <textarea style="resize: none;" rows="5" class="form-control" name="product_content" id="product-description" rows="3">{{ $pro -> product_content }}</textarea>
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Miêu tả sản phẩm/label>
    <textarea style="resize: none;" rows="5" class="form-control" name="product_desc" id="product-description" rows="3">{{ $pro -> product_desc }}</textarea>
  </div>
  
  <hr>
  <button type="submit" name="update_product" class="btn btn-primary">Lưu</button>
  <hr>
  <?php 
        $message = Session::get('message');
        if($message){
        echo '<span class="--bs-danger">',$message.'</span>';
        Session::put('message',null);
    }
    ?>
</form>
@endforeach

  @endsection