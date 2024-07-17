@extends('welcome')
@section('content')

<style>
    /* Căn giữa nội dung của col-lg-9 */
.col-lg-9 {
    margin: auto; /* Căn giữa theo chiều ngang */
    padding: 20px; /* Thêm padding nếu cần thiết */
}

/* Nếu muốn căn giữa theo chiều dọc trên màn hình lớn */
@media (min-width: 992px) {
    .mx-auto {
        margin-top: 50px; /* Ví dụ margin top */
    }
}

</style>
<div class="col-12 col-md-8 col-lg-9 mx-auto">
    <div class="shop_grid_product_area">
        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-flex align-items-center justify-content-between">
                    <div class="total-products">
                        <p><span>Tất cả sản phẩm</span></p>
                    </div>
                    <div class="product-sorting d-flex">
                        <p>Lọc:</p>
                        <form action="{{ url('/filter') }}" method="GET">
                            @csrf
                            <select name="sortBy" id="sortByselect" onchange="this.form.submit()" class="ml-2">
                                <option value="">Sắp xếp theo</option>
                                <option value="price_asc">Giá: Thấp đến Cao</option>
                                <option value="price_desc">Giá: Cao đến Thấp</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($filteredProducts as $product)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <div class="product-img">
                            <img src="{{ asset('uploads/product/'.$product->product_img) }}" alt="{{ $product->product_name }}">
                        </div>
                        <div class="product-description">
                            <h6>{{ $product->product_name }}</h6>
                            <p class="product-price">{{ number_format($product->product_price, 0, ',', '.') }} VNĐ</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
