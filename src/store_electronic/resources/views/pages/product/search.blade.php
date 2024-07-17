@extends('welcome')
@section('content')
 <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">      
                    <div class="section-heading text-center">   
                        <h2>Kết quả</h2>         
                    </div>                   
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @foreach($search_product as $key => $product)
                        
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
                                    <h6>{{($product->product_name)}}</h6>
                                </a>
                                <p class="product-price">{{number_format($product->product_price).' VNĐ'}}</p>                         
                                <div class="hover-content">
                                    <div class="add-to-cart-btn">
                                        <button href="{{ URL::to('laravel/php/product-detail/'.$product->product_id) }}" class="btn essence-btn">Thêm vào giỏ hàng</button>
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

