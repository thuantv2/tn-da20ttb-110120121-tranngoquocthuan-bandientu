@extends('welcome')

@section('content')
    <!-- ##### New Arrivals Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="shop_sidebar_area">
                    <div class="widget-area">
                        <h6 class="widget-title mb-30">THƯƠNG HIỆU SẢN PHẨM</h6>
                        <div class="catagories-menu1">
                            <ul id="menu" class="menu-content collapse show">
                                <!-- Single Item -->
                                <li class="horizontal-list">
                                @isset($laptop)
                                    @foreach($laptop as $key => $value)
                                        @if($value->laptop)
                                            <a href="{{ URL::to('laravel/php/index', $value->laptop) }}" style="color: black; text-decoration: none">
                                                {{ $value->laptop }}
                                            </a>
                                        @endif
                                    @endforeach
                                @endisset
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .horizontal-list {
                    display: flex;
                    flex-wrap: wrap;
                    list-style: none;
                    padding: 0;
                }
                .horizontal-list a {
                    display: block;
                    padding: 5px 10px;
                    margin-right: 10px;
                    margin-bottom: 10px;
                    background-color: #f0f0f0;
                    border-radius: 5px;
                    color: black;
                    text-decoration: none;
                }
                .horizontal-list a:hover {
                    background-color: #ddd;
                }
            </style>
        </div> <!-- Closing the style container -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @foreach($category_by_id as $key => $product)
                            <div class="single-product-wrapper">
                                <div class="product-img">
                                    <img src="{{ asset('uploads/product/'.$product->product_img) }}" alt="">
                                    <div class="product-favourite">
                                        <a href="#" class="favme fa fa-heart"></a>
                                    </div>
                                </div>
                                <div class="product-description">
                                    <span></span>
                                    <a href="{{ URL::to('laravel/php/product-detail/'.$product->product_id) }}">
                                        <h6>{{ $product->product_name }}</h6>
                                    </a>
                                    <p class="product-price">{{ number_format($product->product_price).' VNĐ' }}</p>
                                    <div class="hover-content">
                                        <div class="add-to-cart-btn">
                                            <a href="{{ URL::to('laravel/php/product-detail/'.$product->product_id) }}" class="btn essence-btn">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
