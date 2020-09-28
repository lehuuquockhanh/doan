@extends('layouts.app_user')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Tài Khoản</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home.User')}}">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Tài Khoản</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start My Account Area -->
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Đăng Ký</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="account__form">
                                <div class="input__box">
                                    <label>Tên Đăng Nhập<span>*</span></label>
                                    <input id="name" placeholder="Họ Và Tên" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>Email<span>*</span></label>
                                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>Mật Khẩu<span>*</span></label>
                                    <input id="password" placeholder="Mật Khẩu" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>Nhập Lại Mật Khẩu<span>*</span></label>
                                    <input id="password-confirm" placeholder="Nhập Lại Mật Khẩu" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
{{--                                    <div class="input-group-append">--}}
{{--                                        <div class="input-group-text">--}}
{{--                                            <span class="fa fa-lock"></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="form__btn">
                                    <button type="submit">Đăng Ký</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End My Account Area -->
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
