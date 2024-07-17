@extends('welcome')
@section('content')

<hr>
<h3 style="color:green">Đơn hàng sản phẩm: @if ($order_by_id->order_status == 1)
            Chưa xác nhận
            @elseif ($order_by_id->order_status == 2)
            Đã xác nhận</h3>
            @elseif ($order_by_id->order_status == 3)
            Đã hoàn thành
            @else
            Đã huỷ
            @endif
<br>
<h6 class="font-weight-bolder mb-0">Thông tin</h6>

<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Tên</th>
      <th>Số điên thoại</th>
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

<h6 class="font-weight-bolder mb-0">Chi tiết giao hàng</h6>
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
<h6 class="font-weight-bolder mb-0">Chi tiết đơn hàng</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Tên sản phẩm</th>
      <th>Bộ nhớ lưu trữ</th>
      <th>Màu sắc</th>
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
@if ($order_by_id->payment_method == 2)
    <h5 style="color:green">Phương thức thanh toán: Paypal</h5>
@elseif ($order_by_id->payment_method == 3)
    <h5 style="color:green">Phương thức thanh toán: vnpayment</h5>
@else
    <h5 style="color:green">Phương thức thanh toán: Tiền mặt</h5>
@endif
<hr> 

<h4 style="color:red; text-align:center">Tổng tiền: {{ $order_by_id->order_total }} VNĐ</h2>
<br>

@endsection
