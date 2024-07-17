@extends('welcome')
@section('content')
{{--  <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(public/FE/img/bg-img/bg-2.jpg);">
                        <div class="catagory-content">
                            <a href="#">Clothing</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(public/FE/img/bg-img/bg-2.jpg);">
                        <div class="catagory-content">
                            <a href="#">Clothing</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(public/FE/img/bg-img/bg-2.jpg);">
                        <div class="catagory-content">
                            <a href="#">Clothing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(public/FE/img/bg-img/bg-5.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>-60%</h6>
                                <h2>Global Sale</h2>
                                <a href="#" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### --> --}}

<!-- ##### New Arrivals Area Start ##### -->
<style>
.horizontal-list {
    display: flex; /* Make the list items flex containers */
    flex-wrap: wrap; /* Allow wrapping of items if they exceed container width */
    list-style: none; /* Remove default list styles */
    padding: 0; /* Remove default padding */
    margin: 0; /* Remove default margin */
}

.horizontal-list a {
    display: block; /* Display links as block elements */
    padding: 5px 10px; 
    margin-right: 10px; /* Add space between links (adjust as needed) */
    margin-bottom: 10px; /* Add space between rows (adjust as needed) */
    background-color: #f0f0f0; /* Optional: Add background color to links */
    border-radius: 5px; /* Optional: Add rounded corners to links */
    color: black; /* Set link text color */
    text-decoration: none; /* Remove underline from links */
}

.horizontal-list a:hover {
    background-color: #ddd; /* Optional: Change background color on hover */
}



.section-heading {
    padding: 10px;
    display: flex; /* Make the heading and list flex containers */
    justify-content: center; /* Center the items horizontally */
    align-items: center; /* Center the items vertically */
}

.section-heading h2 {
    margin-right: 280px; /* Add space between heading and list */
}

.menu-content {
    margin: 0; /* Remove default margin */
    padding: 0; /* Remove default padding */
}
.bannerHOME {
  width: 90%;
  max-width: 1200px;
  background-color:  #f0f0f0;
  border-radius: 10px;
  margin: 0 auto 30px;
  overflow: hidden; /* Để ảnh không bị tràn ra ngoài khung */
}
.imgbanner img {
    flex: 0 0 auto;
    width: 24%;
    margin-right: 7px; /* Khoảng cách giữa các ảnh */
    padding: 7px; /* Khoảng trống xung quanh ảnh */
    border-radius: 15px; /* Bo tròn góc ảnh */
}
.bannerHOME {
    width: 90%;
    max-width: 1200px;
    background-color: white;
    border-radius: 10px;
    margin: 0 auto 30px;
    position: relative;
}
.bannerHOME6 {
    width: 90%;
    max-width: 1200px;
    background-color: white;
    border-radius: 10px;
    margin: 0 auto 30px;
    position: relative;
}

.imgbanner1 {
    display: flex;
    overflow-x: hidden;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
}

.imgbanner1 img {
    flex: 0 0 auto;
    width: 49%;
    margin-right: 10px; /* Khoảng cách giữa các ảnh */
    padding: 10px; /* Khoảng trống xung quanh ảnh */
    border-radius: 15px; /* Bo tròn góc ảnh */
    scroll-snap-align: start;
}

button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.3);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
}

#prevBtn {
    left: 10px;
}

#nextBtn {
    right: 10px;
}


/* Điều chỉnh kích thước ảnh cho màn hình nhỏ hơn */
@media (max-width: 768px) {
  .bannerHOME .imgbanner img {
    width: 100%; /* Hiển thị 1 cột trên màn hình nhỏ hơn */
  }
}
.bannerDEAL1 {
  width: 90%; /* Giảm kích thước chiều rộng */
  max-width: 1200px; /* Đặt chiều rộng tối đa */
  background-color: orange;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  margin: 0 auto 30px; /* Giảm margin-bottom và căn giữa */
}
.bannerDEAL2 {
  width: 90%; /* Giảm kích thước chiều rộng */
  max-width: 1200px; /* Đặt chiều rộng tối đa */
  background-color: #B22222;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  margin: 0 auto 30px; /* Giảm margin-bottom và căn giữa */
}
.bannerDEAL3 {
  width: 90%; /* Giảm kích thước chiều rộng */
  max-width: 1200px; /* Đặt chiều rộng tối đa */
  background-color:  #f9f9f9;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  margin: 0 auto 30px; /* Giảm margin-bottom và căn giữa */
}
.bannerDEAL4 {
  width: 90%; /* Giảm kích thước chiều rộng */
  max-width: 1200px; /* Đặt chiều rộng tối đa */
  background-color:  #f9f9f9;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  margin: 0 auto 30px; /* Giảm margin-bottom và căn giữa */
}
.bannerDEAL5 {
  width: 90%; /* Giảm kích thước chiều rộng */
  max-width: 1200px; /* Đặt chiều rộng tối đa */
  background-color:  #FFFFFF;
  /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
  margin: 0 auto 30px; /* Giảm margin-bottom và căn giữa */
  padding: 30px;
}

</style>
<!-- BANNER -->
<div class="bannerHOME6">
    <div class="imgbanner1" id="imgContainer">
        
        <img src="{{ asset('FE/img/banner-img/bannerSSZIP.jpg') }}" alt="Slide 1">
        <img src="{{ asset('FE/img/banner-img/bannerWATCHSS.jpg') }}" alt="Slide 2">
        <img src="{{ asset('FE/img/banner-img/bannerOPPO.jpg') }}" alt="Slide 3">
        <img src="{{ asset('FE/img/banner-img/bannerHEADPHONE.jpg') }}" alt="Slide 4">
    </div>
    <button id="prevBtn">&lt;</button>
    <button id="nextBtn">&gt;</button>
</div>
 <!-- HOTSALECUOITUAN -->
 <div class="bannerDEAL5">
    <section class="new_arrivals_area section-padding-60 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 style="font-size: 3em;">
            HOT SALE <span style="color: #f00; font-size: 1.5em;">CUỐI TUẦN</span>
            </h2>
                <div class="section-heading text-center">
                    <ul id="menu" class="menu-content collapse show">
                            <!-- Single Item -->
                            <li class="horizontal-list">
                                @foreach($category as $key => $cate)
                                        <a href="{{ URL::to('laravel/php/show-category', $cate->category_id) }}" style="color: black; text-decoration: none">
                                            {{ $cate->category_name }}
                                        </a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                        
            </div>
        </div>
                        <div id="countdown-clock" class="box-countdown with-box-tab">
                            
                            <ul id="countdown" class="box-time">
                                    <p class="title" style="color:#CC0033; font-size: 1.5em;">Bắt đầu sau:&ensp;</p>
                                <li>
                                    <span class="time" style="color:#222222;background:#FFF0BF;">00</span>
                                </li>
                                <li>
                                    <span class="time" style="color:#222222;background:#FFF0BF;">59</span>
                                </li>
                                <li>
                                    <span class="time" style="color:#222222;background:#FFF0BF;">59</span>
                                </li>
                            </ul>
                         </div>


        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                
                    @foreach($camera->concat($laptop) as $key => $value)

                    <div class="single-product-wrapper">

                        <div class="product-img">
                            <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
           
                        <div class="product-description">
                            <span>STORET</span>
                            <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                <h6>{{($value->product_name)}}</h6>
                            </a>
                            <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                
                            <div class="hover-content">
               
                                <div class="add-to-cart-btn">
                                    <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                    <div class="add-to-cart-btn">
                                    {{ csrf_field() }}
                                    <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                    <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                    </div>
                                </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

<div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                    @foreach($watch->concat($ipad) as $key => $value)
                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                            <!-- Hover Thumb -->
                            {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>STORET</span>
                            <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                <h6>{{($value->product_name)}}</h6>
                            </a>
                            <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Thêm vào giỏ hàng -->
                                <div class="add-to-cart-btn">
                                    <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                    <div class="add-to-cart-btn">
                                    {{ csrf_field() }}
                                    <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                    <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                    </div>
                                </form> 
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
</div>

<!-- ĐIỆN THOẠI NỔI BẬT NHẤT -->
<div class="bannerDEAL1">
    <img src="{{ asset('FE/img/banner-img/bannerDEAL.png') }}" alt="Slide 1">
    <section class="new_arrivals_area section-padding-60 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>ĐIỆN THOẠI NỔI BẬT NHẤT</h2>
                    <ul id="menu" class="menu-content collapse show">
                            <!-- Single Item -->
                            <li class="horizontal-list">
                                @foreach($brand as $key => $br)
                                    @if(in_array($br->brand_id, [31, 30, 28, 29, 10]))
                                        <a href="{{ URL::to('laravel/php/show-brand', $br->brand_id) }}" style="color: black; text-decoration: none">
                                            {{ $br->brand_name }}
                                        </a>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">   
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                
                    @foreach($dt as $key => $value)
                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                            <!-- Hover Thumb -->
                            {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>STORET</span>
                            <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                <h6>{{($value->product_name)}}</h6>
                            </a>
                            <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Thêm vào giỏ hàng -->
                                <div class="add-to-cart-btn">
                                    <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                    <div class="add-to-cart-btn">
                                    {{ csrf_field() }}
                                    <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                    <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                    </div>
                                </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<div class="container">
        <div class="row">   
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                    @foreach($dt as $key => $value)
                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                            <!-- Hover Thumb -->
                            {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>STORET</span>
                            <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                <h6>{{($value->product_name)}}</h6>
                            </a>
                            <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Thêm vào giỏ hàng -->
                                <div class="add-to-cart-btn">
                                    <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                    <div class="add-to-cart-btn">
                                    {{ csrf_field() }}
                                    <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                    <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                    </div>
                                </form> 
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
</div>
<!-- IPAD -->
<div class="bannerDEAL3">
<img src="{{ asset('FE/img/banner-img/banneripad.png') }}" alt="Slide 3">
    <section class="new_arrivals_area section-padding-60 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>MÁY TÍNH BẢNG</h2>
                        <ul id="menu" class="menu-content collapse show">
                            <!-- Single Item -->
                            <li class="horizontal-list">
                                @foreach($brand as $key => $br)
                                    @if(in_array($br->brand_id, [22, 32, 33, 34, 35]))
                                        <a href="{{ URL::to('laravel/php/show-brand', $br->brand_id) }}" style="color: black; text-decoration: none">
                                            {{ $br->brand_name }}
                                        </a>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @foreach($ipad as $key => $value)
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                                <!-- Hover Thumb -->
                                {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>STORET</span>
                                <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                    <h6>{{($value->product_name)}}</h6>
                                </a>
                                <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Thêm vào giỏ hàng -->
                                    <div class="add-to-cart-btn">
                                        <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                        <div class="add-to-cart-btn">
                                        {{ csrf_field() }}
                                        <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                        <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form> 
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
</div>
<!-- LAPTOP -->
<div class="bannerDEAL2">
<img src="{{ asset('FE/img/banner-img/bannerlaptop.png') }}" alt="Slide 2">
    <section class="new_arrivals_area section-padding-60 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>LAPTOP HOT NHẤT HIỆN NAY</h2>
                        <ul id="menu" class="menu-content collapse show">
                            <!-- Single Item -->
                            <li class="horizontal-list">
                                @foreach($brand as $key => $br)
                                    @if(in_array($br->brand_id, [15, 36, 37, 38, 39, 40]))
                                        <a href="{{ URL::to('laravel/php/show-brand', $br->brand_id) }}" style="color: black; text-decoration: none">
                                            {{ $br->brand_name }}
                                        </a>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @foreach($laptop as $key => $value)
                        <!-- Single Product -->
                        <div class="single-product-wrapper-laptop">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                                <!-- Hover Thumb -->
                                {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>STORET</span>
                                <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                    <h6>{{($value->product_name)}}</h6>
                                </a>
                                <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Thêm vào giỏ hàng -->
                                    <div class="add-to-cart-btn">
                                        <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                        <div class="add-to-cart-btn">
                                        {{ csrf_field() }}
                                        <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                        <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @foreach($laptop as $key => $value)
                        <!-- Single Product -->
                        <div class="single-product-wrapper-laptop">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                                <!-- Hover Thumb -->
                                {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>STORET</span>
                                <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                    <h6>{{($value->product_name)}}</h6>
                                </a>
                                <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Thêm vào giỏ hàng -->
                                    <div class="add-to-cart-btn">
                                        <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                        <div class="add-to-cart-btn">
                                        {{ csrf_field() }}
                                        <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                        <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form> 
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
</div>
<!-- ĐONGHO -->
<div class="bannerDEAL4">
<img src="{{ asset('FE/img/banner-img/bannerdongho.png') }}" alt="Slide 4">
    <section class="new_arrivals_area section-padding-60 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>ĐỒNG HỒ THÔNG MINH</h2>
                        <ul id="menu" class="menu-content collapse show">
                            <!-- Single Item -->
                            <li class="horizontal-list">
                                @foreach($brand as $key => $br)
                                    @if(in_array($br->brand_id, [23, 24, 25, 26, 41, 42, 44, 45, 46]))
                                        <a href="{{ URL::to('laravel/php/show-brand', $br->brand_id) }}" style="color: black; text-decoration: none">
                                            {{ $br->brand_name }}
                                        </a>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @foreach($watch as $key => $value)
                        <!-- Single Product -->
                        <div class="single-product-wrapper-dongho">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                                <!-- Hover Thumb -->
                                {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>STORET</span>
                                <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                    <h6>{{($value->product_name)}}</h6>
                                </a>
                                <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Thêm vào giỏ hàng -->
                                    <div class="add-to-cart-btn">
                                        <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                        <div class="add-to-cart-btn">
                                        {{ csrf_field() }}
                                        <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                        <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form> 
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
</div>

<!-- GỢI Ý HÔM NAY -->
<div class="parent-container">
    <section class="new_arrivals_area section-padding-60 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>GỢI Ý HÔM NAY</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                    @foreach($dt->concat($ipad) as $key => $value)
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                                <!-- Hover Thumb -->
                                {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>STORET</span>
                                <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                    <h6>{{($value->product_name)}}</h6>
                                </a>
                                <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Thêm vào giỏ hàng -->
                                    <div class="add-to-cart-btn">
                                        <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                        <div class="add-to-cart-btn">
                                        {{ csrf_field() }}
                                        <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                        <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>

        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                    @foreach($ipad->concat($laptop) as $key => $value)
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('uploads/product/'.$value->product_img) }}" alt="">

                                <!-- Hover Thumb -->
                                {{-- <img class="hover-img" src="public/FE/img/product-img/product-2.jpg" alt=""> --}}

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>STORET</span>
                                <a href="{{ URL::to('laravel/php/product-detail/'.$value->product_id) }}">
                                    <h6>{{($value->product_name)}}</h6>
                                </a>
                                <p class="product-price">{{number_format($value->product_price).' VNĐ'}}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Thêm vào giỏ hàng -->
                                    <div class="add-to-cart-btn">
                                        <form action="{{ URL::to('laravel/php/save-cart') }}" method="POST">
                                        <div class="add-to-cart-btn">
                                        {{ csrf_field() }}
                                        <input name="product_id_hidden" type="hidden" value="{{ $value->product_id }}">
                                        <button type="submit" class="btn essence-btn">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form> 
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
</div>
<div class="bannerHOME">
<h2>CHUYÊN TRANG THƯƠNG HIỆU</h2>     
  <div class="imgbanner">
    <img src="{{ asset('FE/img/banner-img/apple-chinh-hang-home.jpg') }}" alt="Slide 1">
    <img src="{{ asset('FE/img/banner-img/gian-hang-samsung-home.jpg') }}" alt="Slide 2">
    <img src="{{ asset('FE/img/banner-img/SIS asus.jpg') }}" alt="Slide 3">
    <img src="{{ asset('FE/img/banner-img/xiaomi.jpg') }}" alt="Slide 4">
  </div>

</div>
    <!-- ##### New Arrivals Area End ##### -->
    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('FE/img/core-img/dt.png') }}" alt="">
        </div>
        <div class="single-brands-logo">
            <img src="{{ asset('FE/img/core-img/ipad.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('FE/img/core-img/laptop.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('FE/img/core-img/dongho.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('FE/img/core-img/camera.png') }}" alt="">
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy ra các phần tử li chứa thời gian đếm ngược
        const countdownElements = document.querySelectorAll('#countdown .time');

        // Đặt thời gian ban đầu là 3600 giây (60 phút)
        let remainingTime = 3600;

        function updateCountdown() {
            // Chia thời gian còn lại thành giờ, phút, giây
            let hours = Math.floor(remainingTime / 3600);
            let minutes = Math.floor((remainingTime % 3600) / 60);
            let seconds = remainingTime % 60;

            // Hiển thị lên giao diện
            countdownElements[0].textContent = ('0' + hours).slice(-2);
            countdownElements[1].textContent = ('0' + minutes).slice(-2);
            countdownElements[2].textContent = ('0' + seconds).slice(-2);

            // Giảm thời gian còn lại đi 1 giây
            remainingTime--;

            // Nếu thời gian còn lại là âm (hết thời gian), đặt lại là 3600 giây (60 phút)
            if (remainingTime < 0) {
                remainingTime = 3600; // Đặt lại là 3600 giây
            }
        }

        // Gọi hàm updateCountdown ban đầu và cập nhật mỗi giây
        updateCountdown(); // Cập nhật ban đầu
        setInterval(updateCountdown, 1000); // Cập nhật mỗi giây
    });
</script>

<!-- Đảm bảo mã JavaScript này nằm ở cuối tệp HTML hoặc trong một tệp .js riêng -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imgContainer = document.getElementById('imgContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        const images = imgContainer.querySelectorAll('img');
        let currentIndex = 0;
        const intervalTime = 2000; // Thời gian chuyển đổi (2 giây)

        // Hàm tự động chuyển đổi ảnh
        function autoSlide() {
            setInterval(() => {
                currentIndex++;
                if (currentIndex >= images.length) {
                    currentIndex = 0;
                }
                scrollToImage(currentIndex);
            }, intervalTime);
        }

        // Xử lý sự kiện click cho nút prev
        prevBtn.addEventListener('click', () => {
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = images.length - 1;
            }
            scrollToImage(currentIndex);
        });

        // Xử lý sự kiện click cho nút next
        nextBtn.addEventListener('click', () => {
            currentIndex++;
            if (currentIndex >= images.length) {
                currentIndex = 0;
            }
            scrollToImage(currentIndex);
        });

        // Hàm di chuyển đến ảnh với chỉ số index
        function scrollToImage(index) {
            const imageWidth = imgContainer.offsetWidth;
            imgContainer.scrollTo({
                left: imageWidth * index,
                behavior: 'smooth'
            });
        }

        // Bắt đầu tự động chuyển đổi ảnh khi trang được tải
        autoSlide();
    });
</script>


// Bắt đầu tự động chuyển đổi ảnh khi trang được tải
autoSlide();

</script>




@endsection