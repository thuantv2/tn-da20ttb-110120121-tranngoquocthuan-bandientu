<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>StoreT</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('FE/img/core-img/logocuahang.png') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('FE/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('FE/style.css') }}">
    <script src="{{ asset('BE/ckeditor/ckeditor.js') }}"></script>
      <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor1');
      </script>

</head>



<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                  <a class="nav-brand" href="{{ URL::to('laravel/php/trangchu') }}"><img style="height: 40x; width: 90px;" src="{{ asset('FE/img/core-img/logocuahang.png') }}" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li>
                                <a style="color: black; font-size:larger; font-weight: bold;" href="{{ URL::to('laravel/php/product-home') }}">StoreTechnology</a>
                                <div class="megamenu">   
                                    @foreach($category as $key => $cate)
                                    <ul class="single-mega cn-col-4">                                        
                                        <a style="font-size:16px; font-weight:bold" href="{{ URL::to('laravel/php/show-category',$cate->category_id) }}" class="title">{{ $cate -> category_name }}</a>    
                                        @foreach($brand as $key => $br)
                                            @if($br->category_id == $cate->category_id )
                                                <a style="font-size:13px" href="{{ URL::to('laravel/php/show-brand',$br->brand_id) }}">{{ $br -> brand_name }}</a>
                                            @endif
                                        @endforeach                  
                                    </ul> 
                                     @endforeach                                                                      
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                    <!-- Nav End -->
            </nav>
            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->

                <div class="search-area">
                    <form action="{{ URL::to('laravel/php/search') }}" method="post">
                        {{ csrf_field() }}
                        <input type="search" name="keyword" id="headerSearch" placeholder="Bạn cần tìm gì ...">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->

                @if(session('id') != NULL )
                    <div class="favourite-area">
                        <a href=""><img src="{{ asset('FE/img/core-img/phone-call-svgrepo-com.svg') }}" alt=""></a>
                    </div>  
                @endif

                @if(session('id') != NULL )
                    <div class="favourite-area">
                        <a href="{{ URL::to('laravel/php/order-history') }}"><img src="{{ asset('FE/img/core-img/heart.svg') }}" alt=""></a>
                    </div>  
                @endif 

                @if(session('id') != NULL )
                    <div class="favourite-area">
                        <a href="{{ URL::to('laravel/php/order-history') }}"><img src="{{ asset('FE/img/core-img/shipping.svg') }}" alt=""></a>
                    </div>  
                @endif 

                @if(session('id') != NULL )
                <div class="user-login-info">
                    <a href="{{ URL::to('laravel/php/customer', Auth::id()) }}"><img src="{{ asset('FE/img/core-img/user.svg') }}" alt=""></a>
                </div>
                <div class="user-login-info">
                    <a href="{{ URL::to('laravel/php/logout') }}"><img src="{{ asset('FE/img/core-img/sign_out.svg') }}" alt=""></a>
                </div>
                @else
                <div class="user-login-info">
                    <a href="{{ URL::to('laravel/php/flogin') }}"><img src="{{ asset('FE/img/core-img/user.svg') }}" alt=""></a>
                </div>
                @endif
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="{{ asset('FE/img/core-img/bag.svg') }}" alt=""> <span></span></a>
                </div>
            </div>

        </div>
    </header>

    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="{{ asset('FE/img/core-img/bag.svg') }}" alt=""> <span></span></a>
        </div>

        <div class="cart-content d-flex">
            <?php
            $content = Cart::content();
            ?>
            <div class="cart-list">
                @foreach($content as $v_content)
                <div class="single-cart-item">
                    <a href="{{ URL::to('laravel/php/delete-to-cart/'.$v_content-> rowId) }}" class="product-image" style="width: 200px; height: 200px;">
                        <img src="{{ asset('uploads/product/'.$v_content-> options-> image) }}" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close"  aria-hidden="true"></i></span>
                            <span class="badge"></span>
                            <h6>{{ $v_content -> name }}</h6>
                            <p class="size">{{ $v_content -> options -> storage }}</p>
                            <p class="color">{{ $v_content -> options -> color }}</p>
                            <p class="price">{{number_format($v_content-> price).' VNĐ'}}</p>
                            
                        <div class="quantity d-flex align-items-center">
                            <form action="{{ route('update-cart') }}" method="POST">
                                {{ csrf_field() }}
                        <div class="cart-bag">        
                                <input type="hidden" name="rowId" value="{{ $v_content->rowId  }}">
                                <input type="number" name="qty" value="{{ $v_content->qty }}" min="1" max="10" class="qty-input">
                            </form>
                        </div>
                    </div>
                    
                    </div>
                </a>
            </div>
            @endforeach
        </div> 
            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>GIỎ HÀNG</h2>
                <ul class="summary-table">
                    <li><span>Tổng thu:</span> <span>{{Cart::subtotal().' VNĐ'}}</span></li>
                    <li><span>Vận chuyển</span> <span>Free</span></li>

                    <li><span>Giảm giá:</span><span>{{ Cart::discount().' VNĐ' }}</span></li>

                    <li><span>Tổng cộng:</span> <span>{{Cart::priceTotal().' VNĐ'}}</span></li>
                </ul>
                @if(session('id') != NULL )

                    <div class="checkout-btn mt-100">
                    <a href="{{ URL::to('laravel/php/checkout') }}" class="btn essence-btn">Thanh toán</a>
                </div>
                @else
                    <div class="checkout-btn mt-100">
                    <a href="{{ URL::to('laravel/php/flogin') }}" class="btn essence-btn">Thanh toán</a>
                </div>
                @endif
                
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->
    <section class="slide-home">
        <div class="slider">
          <div class="slider-wrapper">
            <div class="slider-slide">
              <img src="{{ asset('FE/img/banner-img/baner1.png') }}" alt="Slide 1">
            </div>
            <div class="slider-slide">
              <img src="{{ asset('FE/img/banner-img/bannersamsung.jpg') }}" alt="Slide 2">
            </div>            
            <div class="slider-slide">
              <img src="{{ asset('FE/img/banner-img/banner7.jpg') }}" alt="Slide 6">
            </div>
            <div class="slider-slide">
              <img src="{{ asset('FE/img/banner-img/banner6.jpg') }}" alt="Slide 5">
            </div>
          </div>
        </div>
    </div>

<div class="icon-shop ">
  <div class="container">
      <div class="row">
          <div class="col-md-3">
              <i class="ti-shield"></i>
              <b>Bảo hành</b>
              <p>Chính hãng 100%</p>
          </div>
          <div class="col-md-3">
              <i class="ti-exchange-vertical"></i>
              <b>Đổi mới</b>
              <p>Trong vòng 7 ngày</p>
          </div>
          <div class="col-md-3">
              <i class="ti-money"></i>
              <b>Giảm giá</b>
              <p>Nhiều sản phẩm giá tốt</p>
          </div>
          <div class="col-md-3">
              <i class="ti-time"></i>
              <b>Giao nhanh</b>
              <p>Nội thành Trà Vinh</p>
          </div>
      </div>
  </div>
</div>        

<style>
.cart-bag {
    display: flex;
    align-items: center;
}

.qty-input {
    width: 50px; /* Adjust width as needed */
    padding: 5px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-right: 5px;
}
.icon-shop {
    background-color: white; /* Màu nền  */
    padding: 60px 0; /* Khoảng cách padding */
    text-align: center; /* Căn giữa nội dung */
    width: 1000px;
    margin: auto;
}

.icon-shop .container {
    max-width: 1000px; /* Chiều rộng tối đa */
}

.icon-shop .col-md-3 {
    padding: 0 15px; /* Khoảng cách giữa các cột */
}

.icon-shop i {
    font-size: 36px; /* Kích thước icon */
    color: #dc0345; /* Màu của icon */
    display: block;
    margin-bottom: 15px; /* Khoảng cách giữa icon và tiêu đề */
}

.icon-shop b {
    font-size: 25px; /* Kích thước tiêu đề */
    color: #333333; /* Màu của tiêu đề */
    display: block;
    margin-bottom: 10px; /* Khoảng cách giữa tiêu đề và đoạn văn */
}

.icon-shop p {
    font-size: 18px; /* Kích thước đoạn văn */
    color: #777777; /* Màu của đoạn văn */
    line-height: 1.6; /* Độ cao dòng */
}

/* ----------- */
.slider {
    position: relative;
    overflow: hidden;
    width: 80%; /* Giảm chiều rộng của slider xuống 80% */
    max-width: 1200px; /* Đặt chiều rộng tối đa */
    margin: 0 auto; /* Căn giữa slider */
}

.slider-wrapper {
    display: flex;
    transition: transform 0.5s ease;
}

.slider-slide {
    box-sizing: border-box;
    width: 100%;
    flex: 0 0 100%;
}

.slider-slide img {
    display: block;
    margin: 0 auto; /* Căn giữa ảnh theo chiều ngang */
    width: 100%;
    height: auto;
}

.slider-prev,
.slider-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1;
    cursor: pointer;
}

.slider-prev {
    left: 20px;
}

.slider-next {
    right: 20px;
}



        </style>   
        <script>
             document.addEventListener('DOMContentLoaded', function() {
           var sliderWrapper = document.querySelector('.slider-wrapper');
            var sliderPrev = document.querySelector('.slider-prev');
            var sliderNext = document.querySelector('.slider-next');
            var slideWidth = document.querySelector('.slider-slide').clientWidth;
            var currentSlide = 0;

            function slideNext() {
              currentSlide++;
              if (currentSlide > sliderWrapper.children.length - 1) {
                currentSlide = 0;
              }
              sliderWrapper.style.transform = 'translateX(-' + slideWidth * currentSlide + 'px)';
            }

            var slideInterval = setInterval(slideNext, 5000);

            sliderPrev.addEventListener('click', function() {
              currentSlide--;
              if (currentSlide < 0) {
                currentSlide = sliderWrapper.children.length - 1;
              }
              sliderWrapper.style.transform = 'translateX(-' + slideWidth * currentSlide + 'px)';
            });

            sliderNext.addEventListener('click', slideNext);
        }
        </script> 
    </section>
    
 @yield('content')
  


    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img src="" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="shop.html">Cửa hàng</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Trạng thái đặt hàng</a></li>
                            <li><a href="#">Các lựa chọn thanh toán</a></li>
                            <li><a href="#">Vận chuyển và giao hàng</a></li>
                            <li><a href="#">Hướng dẫn</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6></h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy; All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">ThuanTran</a>
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <script src="{{ asset('FE/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('FE/js/popper.min.js') }}"></script>
    <script src="{{ asset('FE/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('FE/js/plugins.js') }}"></script>
    <script src="{{ asset('FE/js/classy-nav.min.js') }}"></script>
    <script src="{{ asset('FE/js/active.js') }}"></script>

</body>
</html>