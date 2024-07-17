@extends('admin_layout')
@section('admin_content')


<hr>
<form method="POST" action="{{ url('laravel/php/update-status/'.$order_by_id->order_id) }}">
  @csrf
  <select name="status">
    <option style="background-color: #ffc107;" value="1" @if ($order_by_id->order_status == 1) selected @endif>Chưa xác nhận</option>
    <option style="background-color: #007bff;" value="2" @if ($order_by_id->order_status == 2) selected @endif>Đã xác nhận</option>
    <option style="background-color: #28a745;" value="3" @if ($order_by_id->order_status == 3) selected @endif>Đã hoàn thành</option>
    <option style="background-color: #dc3545;" value="4" @if ($order_by_id->order_status == 4) selected @endif>Đã huỷ</option>
  </select>
  <br>
  <br>
  <button class="btn btn-success" type="submit">Lưu</button>
</form>
<h6 class="font-weight-bolder mb-0">Thông tin</h6>

<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Tên</th>
      <th>Số điện thoại</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody >
    <tr>

      <td style="text-align: center;">
        {{ $order_by_id->name }}
      </td>
      <td style="text-align: center;">
        {{ $order_by_id->phone }}
      </td>

      <td style="text-align: center;">
        {{ $order_by_id->email }}
      </td>
    </tr>
  </tbody>
</table>
<br>
<hr>

<h6 class="font-weight-bolder mb-0">Chi tiết đơn hàng</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      
      <th>Địa chỉ</th>
      <th>Ghi chú</th>
    </tr>
  </thead>
  <tbody >
    <tr>
      <td style="text-align: center;">
        {{ $order_by_id->address }}
      </td>

      <td style="text-align: center;">
       {{  $order_by_id->shipping_note }}
      </td>
    </tr>
  </tbody>
</table>

<br><hr>
<hr>
<h6 class="font-weight-bolder mb-0">Chi tiết giao hàng</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Tên sản phẩm</th>
      <th>Bộ nhớ lưu trữ</th>
      <th>Màu sác</th>
      <th>Giá</th>
    </tr>
  </thead>
  <tbody >
    @foreach($order_by_id_product as $key => $value)
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <div class="ms-3">
              <p class="fw-bold mb-1">{{ $value->product_name }}</p>
            </div>
          </div>
        </td>

        <td style="text-align: center;">
          {{ $value->product_storage }}
        </td>

        <td style="text-align: center;">
          {{ $value->product_color }}
        </td>

        <td style="text-align: center;">
          {{number_format($value->product_price).' VNĐ'}}
        </td>
      </tr>
  @endforeach
  </tbody>
</table>
<br>
  @if(($order_by_id->payment_method) == 2)
    <h5 style="color:green">Phương thức thanh toán: Paypal</h5>
  @else
    <h5 style="color:green">Phương thức thanh toán: Tiền mặt</h5>
  @endif
<hr>
<h4 style="color:red; text-align:center">Tổng tiền: {{ $order_by_id->order_total }} VNĐ</h2>
{{-- <button class="order-status-btn">
  <span class="status waiting">Pending</span>
  <span class="status processing">Comfirm</span>
  <span class="status completed">Done</span>
  <span class="status cancelled">Cancelled</span>
</button> --}}
<a target="_blank" href="{{ url('laravel/php/print-order/'.$order_by_id->order_id ) }}" class="btn btn-info" type="submit">In hoá đơn</a>

<br>

@endsection
