@extends('welcome')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

 <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(public/FE/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Thủ tục thanh toán</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
   
    <div class="checkout_area section-padding-80">
        
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 ">
                    <form id="checkout-form" action="{{ URL::to('laravel/php/order-place') }}" method="post">
                    {{ csrf_field() }}
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-page-heading mb-30">
                            <h5>Địa chỉ thanh toán</h5>
                        </div>
                            <?php
                            if (Session::has('id')) {
                                 $user = DB::table('users')->where('id', Session::get('id'))->first();?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Tên <span>*</span></label>
                                    <input name="shipping_name" type="text" class="form-control" id="name" value="{{ $user->name }}" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Địa chỉ Email <span>*</span></label>
                                    <input name="shipping_email" type="email" class="form-control" id="email_address" value="{{ $user->email }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Số điện thoại <span>*</span></label>
                                    <input name="shipping_phone" type="number" class="form-control" id="phone_number" min="0" value="{{ $user->phone }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Địa chỉ<span>*</span></label>
                                    <input name="shipping_address" type="text" class="form-control mb-3" id="address" value="{{ $user->address }}" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="note">Ghi chú</label>
                                    <textarea style="resize: none;" name="shipping_note" class="form-control" id="note" rows="4"></textarea>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation" style="width: 600px">
                        <?php
                        $content = Cart::content();
                        $int = Cart::priceTotal();
                        $totalPriceWithoutDot = str_replace(',', '', $int);
                        $totalPrice = (int) $totalPriceWithoutDot;
                        ?>
                        <div class="cart-page-heading">
                            <h5>Đơn hàng của bạn</h5>
                        </div>
                        <ul class="order-details-form mb-4">
                            <li><span>Sản phẩm</span> <span>Tổng tiền</span></li>
                            @foreach($content as $v_content)
                            <li><span>{{ $v_content->name }}</span> <span>{{number_format($v_content->price).' VNĐ'}}</span></li>
                            @endforeach
                            <li><span>Giao hàng</span> <span>Miễn phí</span></li>
                            <li><span>Phiếu giảm giá</span>
                                <span>
                                <?php 
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<span class="--bs-voucher">',$message.'</span>';
                                    Session::put('message', null);
                                }
                                ?> </span>
                                <span>
                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_type'] == 1)
                                            Giảm giá theo {{ $cou['coupon_value'] }} %
                                            @php
                                                $dis = ($totalPrice*$cou['coupon_value'])/100;
                                            @endphp
                                        @elseif($cou['coupon_type'] == 2)
                                            Giảm giá theo {{number_format($cou['coupon_value'],0,',',',').'VNĐ'}}
                                            <?php
                                                $dis = ($cou['coupon_value']);
                                            ?>
                                        @endif
                                    @endforeach
                                @else
                                    0 VNĐ
                                @endif
                                </span>
                            </li>
                            <li><span>Tổng tiền</span> <span>
                             @if(Session::get('coupon'))
                                <?php
                                    $total_bill = $totalPrice - $dis;
                                ?>
                                <input type="hidden" name="total" value="<?php echo $total_bill; ?>">
                                {{ number_format($total_bill,0,',',',').' VNĐ' }}
                            @else
                                <?php
                                    $total_bill = $totalPrice;
                                ?>
                                <input type="hidden" name="total" value="<?php echo $total_bill; ?>">
                                {{ number_format($total_bill,0,',',',').' VNĐ' }}
                            @endif
                            </span></li>
                        </ul>

                        <style>
                            .card-header:hover {
                            background-color: #f8f9fa;
                            color: green;
                            cursor: pointer;
                            pointer-events: auto; 
                        }
                        .payment-method i.checked {
                           color: green;
                        }
                        </style>
                            @if(Session::get('success_paypal') == 1)
                                {{-- PayPal --}}
                                <input type="hidden" name="payment_option" value="2">
                                <h5 style="color:green">Thanh toán thành công PayPal</h5>
                                <?php Session::forget('success_paypal'); ?>

                            @elseif(Session::get('success_momo') == 3)
                                {{-- MOMO --}}
                                <input type="hidden" name="payment_option" value="3">
                                <h5 style="color:green">Thanh toán thành công MOMO</h5>
                                <?php Session::forget('success_momo'); ?>

                            @elseif(Session::get('success_vnpay') == 4)
                                {{-- VNPay --}}
                                <input type="hidden" name="payment_option" value="4">
                                <h5 style="color:green">Thanh toán thành công VNPay</h5>
                                <?php Session::forget('success_vnpay'); ?>

                            @else
                                
                                <input type="hidden" name="payment_option" value="1">
                            @endif

                        <button type="submit" name="send" class="btn essence-btn">Đặt hàng</button>
                    </div>
                </div>
                </form>
            </div>
            <hr style="width: 1270px;">
            @if(Session::get('success_paypal') != 1 && Session::get('success_momo') != 3 && Session::get('success_vnpay') != 4)

            <form style="float: right;" method="post" action="{{ url('laravel/php/check-coupon') }}">
                {{ csrf_field() }}
                <label for="coupon">Voucher</label>
                <input style="width: 300px;" class="form-control" type="text" name="coupon">
                <br>
                <button class="btn essence-btn" type="submit" name="check_coupon">Áp dụng</button>
            </form>
            @endif
            <label for="name">Thanh toán trực tuyến</label>
            <br>
            
            <?php 
                $vnd_to_usd = $total_bill/23452;
                $total_paypal = round($vnd_to_usd, 2);
                \Session::put('total_paypal', $total_paypal);
            ?>
            
            <input type="hidden" name="paypal" value="{{ round($vnd_to_usd, 2) }}">
            <a class="btn essence-btn" href="{{ route('processTransaction') }}">Paypal</a>


            <form action="{{ url('/momo_payment') }}" method="POST">
                @csrf
                <input type="hidden" name="momo" value="{{$total_bill }}">
                <br>
                <button type="submit" class="btn essence-btn" name="payUrl">MOMO</button>
            </form>

            
            <form action="{{ route('vnpay_payment') }}" method="POST">
                @csrf
                <input type="hidden" name="vnpay" value="{{ $total_bill }}">
            <br>
                <button type="submit" class="btn essence-btn" name="redirect">VNPay</button>
            </form>
        </div>
    
    <br>
    <br>
</div>
    
    <!-- ##### Checkout Area End ##### -->
@endsection

<script>
    document.getElementById('checkout-form').addEventListener('submit', function(event) {
        var phone = document.getElementById('phone_number').value;
        var address = document.getElementById('address').value;

        if (phone.trim() === '' || address.trim() === '') {
            alert('Số điện thoại và địa chỉ là bắt buộc.');
            event.preventDefault();
        }
    });
</script>
