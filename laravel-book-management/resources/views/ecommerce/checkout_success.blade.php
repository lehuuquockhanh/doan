@extends('layouts.app_user')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Thanh Toán Thành Công</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Thanh Toán Thành Công</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <div class="container">
        <div class="badge badge-success">
            <h3>Đặt Hàng Thành Công</h3>
        </div>
    </div>

@endsection
@section('styles')
    <style>
        .mainmenu__nav .meninmenu li a {
            color: #fff;
        }
        .header__sidebar__right > li.shop_search > a {
            background: rgba(0, 0, 0, 0) url({{asset('users/images/icons/search_white.png')}}) no-repeat scroll 0 center !important;
        }
        .header__sidebar__right > li.wishlist > a {
            background: rgba(0, 0, 0, 0) url({{asset('users/images/icons/button-wishlist_white.png')}}) no-repeat scroll 0 center !important;
        }
        .header__sidebar__right > li.shopcart > a {
            background: rgba(0, 0, 0, 0) url({{asset('users/images/icons/cart_white.png')}}) no-repeat scroll 0 center !important;
        }
        .header__sidebar__right > li.setting__bar__icon > a {
            background: transparent url({{asset('users/images/icons/icon_setting_white.png')}}) no-repeat scroll left center !important;
        }
    </style>


@endsection
