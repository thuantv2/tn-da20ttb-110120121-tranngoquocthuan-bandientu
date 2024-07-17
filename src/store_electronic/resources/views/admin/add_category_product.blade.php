@extends('admin_layout')
@section('admin_content')

<h6 class="font-weight-bolder mb-0">Thêm danh mục sản phẩm</h6>
<hr>

<form style="width: 1500px;" action="{{ URL::to('/laravel/php/save-category-product') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group ">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Tên danh mục</label>
    <input type="text" name="category_name" class="form-control" id="category-name" placeholder="Enter category name">
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Mô tả danh mục</label>
    <textarea style="resize: none;" rows="5" class="form-control" name="category_desc" id="category-description" rows="3"></textarea>
  </div>
  <label style="font-size:16px" for="category-parent">Trạng thái</label>
  <select name="category_status" class="form-control" id="category-parent">
    <option value="">None</option>
    <option value="1">Hiển thị</option>
    <option value="0">Không hiển thị</option>
  </select>
  
  <hr>
  <button type="submit" name="add_category_product" class="btn btn-primary">Add</button>
  <hr>
  <?php 
        $message = Session::get('message');
        if($message){
        echo '<span class="--bs-danger">',$message.'</span>';
        Session::put('message',null);
    }
    ?>
</form>


  @endsection