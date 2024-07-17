@extends('welcome')
@section('content')

<section>
	<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Thông tin đơn hàng của bạn</h3>
          <p class="card-text">Tên: {{ Session::get('order_info.shipping_name') }}</p>
          <p class="card-text">Số điên thoại: {{ Session::get('order_info.shipping_phone') }}</p>
          <p class="card-text">Địa chỉ: {{ Session::get('order_info.shipping_address') }}</p>
          <table class="table">
            <thead>
              <tr>
                <th>Sản phẩm</th>
                <th>Bộ nhớ lưu trữ</th>
                <th>Màu sắc</th>
                <th>Giá</th>
              </tr>
            </thead>
            <tbody>
        	@php
        	$content = session('content');
        	@endphp
            @foreach($content as $v_content)
              <tr>
                <td>{{ $v_content -> name }}</td>
                <td>{{ $v_content -> options->storage }}</td>
                <td>{{$v_content -> options->color }}</td>
                <td>{{ number_format($v_content -> price, 0, '.', ',') }}</td>
              </tr>
            </tbody>
            @endforeach
      </table>
      <h4 class="card-title">Tổng tiền đơn hàng: {{ Session::get('order_info.order_total') }} VNĐ</h4>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Đặt hàng thành công!</h2>
          <p class="card-text"> 
          Cảm ơn bạn đã đặt hàng.</p>
          <a href="{{ URL::to('laravel/php/trangchu')}}" class="btn btn-primary">Tiếp tục mua sắm</a>
          <!-- Nút xem lịch sử đơn hàng -->
          <a href="{{ URL::to('laravel/php/order-history')}}" class="btn btn-secondary">lịch sử đơn hàng</a>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<hr>
</div>

@endsection