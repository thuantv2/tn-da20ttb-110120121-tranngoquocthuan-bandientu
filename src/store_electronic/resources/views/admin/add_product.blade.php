@extends('admin_layout')
@section('admin_content')

<h6 class="font-weight-bolder mb-0">Thêm sản phẩm</h6>
<hr>

<form style="width: 1500px;" action="{{ URL::to('/laravel/php/save-product') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Tên sản phẩm</label>
    <input type="text" name="product_name" class="form-control" id="product-name" placeholder="Nhập tên sản phẩm" required>
  </div>
  <div class="form-group">
    <label style="font-size:16px" for="product-parent">Danh mục sản phẩm</label>
    <select name="category_id" class="form-control" id="product-parent" required>
      @foreach($category as $cate)
      <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label style="font-size:16px" for="product-parent">Thương hiệu sản phẩm</label>
    <select name="brand_id" class="form-control" id="product-parent" required>
      @foreach($brand as $br)
      <option value="{{ $br->brand_id }}">{{ $br->brand_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Nhập sản phẩm</label>
    <input type="text" name="product_import" class="form-control" id="product-import" placeholder="Nhập sản phẩm" required>
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Giá sản phẩm</label>
    <input type="text" name="product_price" class="form-control" id="product-price" placeholder="Nhập giá sản phẩm" required>
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Số lượng sản phẩm</label>
    <input type="number" name="product_quantity" class="form-control" id="product-quantity" placeholder="Nhập số lượng sản phẩm" required>
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Bộ nhớ sản phẩm</label>
    <input type="text" name="product_storage" class="form-control" id="product-storage" placeholder="Nhập bộ nhớ sản phẩm">
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Màu sắc sản phẩm</label>
    <input type="text" name="product_color" class="form-control" id="product-color" placeholder="Nhập màu sắc sản phẩm">
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Hình ảnh sản phẩm</label>
    <input type="file" name="product_img" class="form-control" id="product-img" required>
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Nội dung sản phẩm</label>
    <textarea style="resize: none;" rows="5" class="form-control" name="product_content" id="editor" placeholder="Nhập nội dung sản phẩm" required></textarea>
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Miêu tả sản phẩm</label>
    <textarea style="resize: none;" rows="5" class="form-control" name="product_desc" id="editor1" placeholder="Nhập miêu tả sản phẩm" required></textarea>
  </div>
  <div class="form-group">
    <label style="font-size:16px" for="product-parent">Trạng thái</label>
    <select name="product_status" class="form-control" id="product-parent" required>
      <option value="1">Hiển thị</option>
      <option value="0">Không hiển thị</option>
    </select>
  </div>
  
  <hr>
  <button type="submit" name="add_product" class="btn btn-primary">Thêm sản phẩm</button>
  <hr>
  
  @if(Session::has('message'))
  <div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
  </div>
  @endif

</form>

@endsection
