<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bookshop </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('users/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('users/images/icon.png')}}">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('users/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('users/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('users/style.css')}}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{asset('users/css/custom.css')}}">
@yield('styles', false)
<!-- Modernizer js -->
    <script src="{{asset('users/js/vendor/modernizr-3.5.0.min.js')}}"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
    <!-- Header -->
    <header id="wn__header" class="header__area header__absolute sticky__header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <div class="logo">
                        <a href="{{route('home.User')}}">
                            <img src="{{asset('users/images/logo/logo.png')}}" alt="logo images">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <nav class="mainmenu__nav">
                        <ul class="meninmenu d-flex justify-content-start">
                            <li class="drop with--one--item"><a href="{{route('home.User')}}">Home</a></li>
                            <li class="drop with--one--item"><a href="{{route('home.products')}}">Cửa Hàng</a></li>
                            <li class="drop"><a href="{{route('home.products')}}">Sách</a>
                                <div class="megamenu mega03">
                                    <ul class="item item03">
                                        @foreach($theloais as $key => $theloai)
                                            <li>
                                                <a href="{{route('home.products', ['categoryId' => $theloai->id])}}">{{$theloai->ten_the_loai}}
                                                </a></li>
                                        @endforeach
                                        {{--                                        <li><a href="shop-grid.html">Biography </a></li>--}}
                                        {{--                                        <li><a href="shop-grid.html">Business </a></li>--}}
                                        {{--                                        <li><a href="shop-grid.html">Cookbooks </a></li>--}}
                                        {{--                                        <li><a href="shop-grid.html">Health & Fitness </a></li>--}}
                                        {{--                                        <li><a href="shop-grid.html">History </a></li>--}}
                                    </ul>
                                </div>
                            </li>
                            <li class="drop with--one--item"><a href="{{route('home.about')}}">Giới Thiệu</a></li>
                            <li class="drop with--one--item"><a href="{{route('home.blogs')}}">Blogs</a></li>
                            <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                        <li class="shop_search"><a class="search__active" href="#"></a></li>
                        <li class="wishlist"><a href="#"></a></li>
                        <li class="shopcart"><a class="cartbox_active" href="#"><span
                                    class="product_qun">{{$cart->count()}}</span></a>
                            <!-- Start Shopping Cart -->
                            <div class="block-minicart minicart__active">
                                <div class="minicart-content-wrapper">
                                    <div class="micart__close">
                                        <span>Đóng</span>
                                    </div>
                                    <div class="items-total d-flex justify-content-between">
                                        <span>{{$cart->count()}} Sản Phẩm</span>
                                        <span>Tổng Tiền Giỏ Hàng</span>
                                    </div>
                                    <div class="total_amount text-right">
                                        <span>{{$cart->sum('sub_total')}}</span>
                                    </div>
                                    <div class="mini_action checkout">
                                        <a class="checkout__btn" href="{{route('home.checkout')}}">Đi Tới Thanh Toán</a>
                                    </div>
                                    <div class="single__items">
                                        <div class="miniproduct">
                                            @if(isset($cart) && count($cart))
                                                @foreach($cart as $item)
                                                    <div class="item01 d-flex">
                                                        <div class="thumb">
                                                            <a href="{{route('home.product_detail', $item->ma_sach)}}"><img
                                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh)}}"
                                                                    alt="product images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h6>
                                                                <a href="{{route('home.product_detail', $item->ma_sach)}}">{{$item->ten_sach}}</a>
                                                            </h6>
                                                            <span class="prize">{{number_format($item->price)}}</span>
                                                            <div class="product_prize d-flex justify-content-between">
                                                                <span class="qun">{{$item->quantity}}</span>
                                                                <ul class="d-flex justify-content-end">
                                                                    <li><a href="#"><i
                                                                                class="zmdi zmdi-settings"></i></a></li>
                                                                    <li><a href="{{route('cart.remove', ['id'=> $item->id])}}"><i class="zmdi zmdi-delete"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mini_action cart">
                                        <a class="cart__btn" href="{{route('cart.index')}}">Xem Và Chỉnh Sửa Giỏ Hàng</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Shopping Cart -->
                        </li>
                        <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                            <div class="searchbar__content setting__block">
                                <div class="content-inner">

                                    <div class="switcher-currency">
                                        <strong class="label switcher-label">
                                            <span>Tài Khoản Của Tôi</span>
                                        </strong>
                                        <div class="switcher-options">
                                            <div class="switcher-currency-trigger">
                                                <div class="setting__menu">
{{--                                                    <span><a href="#">Compare Product</a></span>--}}
{{--                                                    <span><a href="#">My Account</a></span>--}}
{{--                                                    <span><a href="#">My Wishlist</a></span>--}}
                                                    <span>
                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                            <a href="#" onclick="$('#logoutForm').submit()">Đăng Xuất</a>
                                                            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                                                @csrf

                                                            </form>
                                                        @else
                                                            <a href="{{route('home.signin')}}">Đăng Nhập</a>
                                                        @endif

                                                    </span>
                                                    <span><a href="{{route('home.register')}}">Tạo Tài Khoản</a></span>
                                                    <span><a href="{{route('order.history')}}">Lịch Sử Đặt Hàng</a></span>
                                                    <span><a href="{{route('user.profile')}}">Thông Tin</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Start Mobile Menu -->
            <div class="row d-none">
                <div class="col-lg-12 d-none">
                    <nav class="mobilemenu__nav">
                        <ul class="meninmenu">
                            <li><a href="{{'home.User'}}">Home</a></li>
                            <li><a href="{{route('home.products')}}">Cửa Hàng</a>
                            </li>
                            <li><a href="{{route('home.about')}}">Giới Thiệu</a></li>
                            <li><a href="{{route('home.blogs')}}">Blog</a></li>
                            <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- End Mobile Menu -->
            <div class="mobile-menu d-block d-lg-none">
            </div>
            <!-- Mobile Menu -->
        </div>
    </header>
    <!-- //Header -->
    <!-- Start Search Popup -->
    <div class="brown--color box-search-content search_active block-bg close__top">
        <form id="search_mini_form" class="minisearch" action="{{route('home.products')}}" >
            <div class="field__search">
                <input type="text" placeholder="Tìm Sản Phẩm Ở Đây..." name="keySearch">
                <div class="action">
                    <a href="#" onclick="$('#search_mini_form').submit()"><i class="zmdi zmdi-search"></i></a>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>Đóng</span>
        </div>
    </div>
    <!-- End Search Popup -->

@yield('content')
<!-- Footer Area -->
    <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
        <div class="footer-static-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__widget footer__menu">
                            <div class="ft__logo">
                                <a href="{{route('home.User')}}">
                                    <img src="{{asset('users/images/logo/3.png')}}" alt="logo">
                                </a>
                                <p>Đến cửa hàng chúng tôi giúp bạn có những kiến thức để phát triển bản thân</p>
                            </div>
                            <div class="footer__content">
                                <ul class="social__net social__net--2 d-flex justify-content-center">
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                    <li><a href="#"><i class="bi bi-google"></i></a></li>
                                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                    <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                </ul>
                                <ul class="mainmenu d-flex justify-content-center">
                                    <li><a href="index.html">Thịnh Hành</a></li>
                                    <li><a href="index.html">Siêu Giảm Giá</a></li>
                                    <li><a href="index.html">Tất Cả Sản Phẩm</a></li>
                                    <li><a href="index.html">Yêu Thích</a></li>
                                    <li><a href="index.html">Blog</a></li>
                                    <li><a href="index.html">Hổ Trợ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="copyright">
                            <div class="copy__right__inner text-left">
                                <p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free
                                        themes Cloud.</a> All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="payment text-right">
                            <img src="{{asset('users/images/icons/payment.png')}}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //Footer Area -->
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header modal__header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="{{asset('users/images/product/big-img/1.jpg')}}">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1>Simple Fabric Bags</h1>
                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#">4 customer reviews</a>
                                    </div>
                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$17.20</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    Designed for simplicity and made from high quality materials. Its sleek geometry and
                                    material combinations creates a modern look.
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Select size</h2>
                                    <ul class="color__list">
                                        <li class="l__size"><a title="L" href="#">L</a></li>
                                        <li class="m__size"><a title="M" href="#">M</a></li>
                                        <li class="s__size"><a title="S" href="#">S</a></li>
                                        <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                        <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social__net social__net--2 d-flex justify-content-start">
                                            <li class="facebook"><a href="#" class="rss social-icon"><i
                                                        class="zmdi zmdi-rss"></i></a></li>
                                            <li class="linkedin"><a href="#" class="linkedin social-icon"><i
                                                        class="zmdi zmdi-linkedin"></i></a></li>
                                            <li class="pinterest"><a href="#" class="pinterest social-icon"><i
                                                        class="zmdi zmdi-pinterest"></i></a></li>
                                            <li class="tumblr"><a href="#" class="tumblr social-icon"><i
                                                        class="zmdi zmdi-tumblr"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICKVIEW PRODUCT -->
</div>
<!-- //Main wrapper -->

<!-- JS Files -->
<script src="{{asset('users/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('users/js/popper.min.js')}}"></script>
<script src="{{asset('users/js/bootstrap.min.js')}}"></script>
<script src="{{asset('users/js/plugins.js')}}"></script>
<script src="{{asset('users/js/active.js')}}"></script>
@yield('scripts')
</body>
</html>
