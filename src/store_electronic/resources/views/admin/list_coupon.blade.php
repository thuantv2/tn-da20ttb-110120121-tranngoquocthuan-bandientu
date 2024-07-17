@extends('admin_layout')
@section('admin_content')


<hr>
<h6 class="font-weight-bolder mb-0">Phiếu giảm giá</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Tên phiếu</th>
      <th>Mã phiếu</th>
      <th>Số lượng phiếu</th>
      <th>Loại phiếu</th>
      <th>Giá trị phiếu</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody >

  	@foreach($coupon as $key => $cp)
    <tr>
      <td>
        <div class="d-flex align-items-center">
         {{--  <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              /> --}}
          <div class="ms-3">
            <p class="fw-bold mb-1">{{ $cp->coupon_name }}</p>
          </div>
        </div>
      </td>
      <td>
        {{ $cp->coupon_code }}
      </td>
      <td>
      	{{ $cp->coupon_quantity }}
      </td>
      <td>
        <?php
        if($cp-> coupon_type ==1){
          ?>
          Giảm giá theo %
          <?php
        }
        ?>

        <?php
        if($cp-> coupon_type ==2){
          ?>
          Giảm giá theo số tiền VNĐ
          <?php
        }
        ?>
      </td>
      <td>
        {{ $cp->coupon_value }}
      </td>
      <td style="text-align: center;">
      	<a onclick="return confirm('Are you sure you want delete?')" href="{{URL::to('laravel/php/delete-coupon/'.$cp->coupon_id)}}" type="button" class="btn btn-danger">Xoá</a>

      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection