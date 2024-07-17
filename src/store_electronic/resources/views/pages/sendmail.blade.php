<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!-- Add Bootstrap classes to HTML elements -->
    <div class="container">
        <p style="font-style: bold" class="mt-5">Xin chào bạn: {{ $customer_name }},</p>

        <p>Cảm ơn bạn dã mua hàng ở bên StoreT. Đây là thông tin đơn hàng:</p>

        <ul>
            <li>Tên: {{ $customer_name }}</li>
            <li>Địa chỉ: {{ $shipping_address }}</li>
            <li>Số điện thoại: {{ $shipping_phone }}</li>
            <li>Ghi chú: {{ $shipping_note }}</li>
            @if($payment_method == 2)
            <li>Phương thức thanh toán: Paypal</li>
        @elseif($payment_method == 1)
            <li>Phương thức thanh toán: Tiền mặt</li>
        @elseif($payment_method == 3)
            <li>Phương thức thanh toán: MOMO</li>
        @endif

        </ul>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Bộ nhớ lưu trữ</th>
                    <th>màu sắc</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart_items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price) }} VNĐ</td>
                    <td>{{ $item->options->storage }}</td>
                    <td>{{ $item->options->color }}</td>
                    <td>{{ number_format($item->subtotal) }} VNĐ</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Tổng tiền</td>
                    <td>{{ $total }} VNĐ</td>
                </tr>
            </tfoot>
        </table>

        <p>Chúng tôi sẽ liên hệ với bạn trong khoảng thời gian sớm nhất để xác nhận đơn hàng và giao hàng cho bạn nhanh chóng.</p>

        <p>Thân mến,</p>
        <strong>StoreT</strong>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
