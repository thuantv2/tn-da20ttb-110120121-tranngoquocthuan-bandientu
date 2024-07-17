@extends('admin_layout')
@section('admin_content')

<h6 class="font-weight-bolder mb-0">Thêm phiếu giảm giá</h6>
<hr>

<form style="width: 1500px;" action="{{ URL::to('/laravel/php/insert-coupon-code') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group ">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Tên phiếu</label>
    <input type="text" name="coupon_name" class="form-control" id="coupon-name" placeholder="">
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Mã phiếu</label>
    <input type="text" name="coupon_code" class="form-control" id="coupon-name" placeholder="">
  </div>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Số lượng phiếu</label>
    <input type="text" name="coupon_quantity" class="form-control" id="coupon-name" placeholder="">
  </div>
  <label style="font-size:16px" for="Coupon-parent">Loại phiếu</label>
  <select name="coupon_type" class="form-control" id="Coupon-parent">
    <option value="">None</option>
    <option value="1">Giảm theo % </option>
    <option value="2">Giảm theo số tiền VND </option>
  </select>
  <hr>
  <div class="form-group">
    <label style="font-size:16px" class="font-weight-bolder mb-0">Giá trị phiếu</label>
    <input type="text" name="coupon_value" class="form-control" id="coupon-name" placeholder="">
  </div>
  
  <hr>
  <button type="submit" name="add_coupon" class="btn btn-primary">Thêm</button>
  <hr>
</form>


  @endsection