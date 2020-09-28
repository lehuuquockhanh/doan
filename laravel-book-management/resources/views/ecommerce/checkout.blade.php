@extends('layouts.app_user')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Thanh Toán</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Thanh Toán</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Checkout Area -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/>
    @endif
    <section class="wn__checkout__area section-padding--lg bg__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="customer_details">
                        <h3>Chi Tiết Hóa Đơn</h3>
                        <div class="customar__field">
                            <form method="post" action="{{route('home.checkout.store')}}">
                                @csrf
                                <div class="input_box">
                                    <label>Tên Khách Hàng <span>*</span></label>
                                    <input type="text" name="ten_khach_hang">
                                </div>
                                <div class="input_box">
                                    <label>Địa Chỉ <span>*</span></label>
                                    <input type="text" name="dia_chi">
                                </div>
                                <div class="input_box">
                                    <label>Địa Chỉ 2</label>
                                    <input type="text" name="dia_chi_2">
                                </div>
                                <div class="margin_between">
                                    <div class="input_box space_between">
                                        <label>Số Điện Thoại <span>*</span></label>
                                        <input type="text" name="so_dien_thoai">
                                    </div>

                                    <div class="input_box space_between">
                                        <label>Email address <span>*</span></label>
                                        <input type="email" name="email">
                                    </div>
                                </div>
                                <div class="input_box">
                                    <label>Mô Tả</label>
                                    <input type="text" name="mo_ta">
                                </div>
                                <input type="radio" name="payment_method" value="cod" checked> COD
                                <input type="radio" name="payment_method" value="vnpay"> VN Pay
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info"> Đặt Hàng</button>
                                </div>

                            </form>

                        </div>
{{--                        <div class="create__account">--}}
{{--                            <div class="wn__accountbox">--}}
{{--                                <input class="input-checkbox" name="createaccount" value="1" type="checkbox">--}}
{{--                                <span>Create an account ?</span>--}}
{{--                            </div>--}}
{{--                            <div class="account__field">--}}
{{--                                <form action="#">--}}
{{--                                    <label>Account password <span>*</span></label>--}}
{{--                                    <input type="text" placeholder="password">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
{{--                    <div class="customer_details mt--20">--}}
{{--                        <div class="differt__address">--}}
{{--                            <input name="ship_to_different_address" value="1" type="checkbox">--}}
{{--                            <span>Ship to a different address ?</span>--}}
{{--                        </div>--}}
{{--                        <div class="customar__field differt__form mt--40">--}}
{{--                            <div class="margin_between">--}}
{{--                                <div class="input_box space_between">--}}
{{--                                    <label>First name <span>*</span></label>--}}
{{--                                    <input type="text">--}}
{{--                                </div>--}}
{{--                                <div class="input_box space_between">--}}
{{--                                    <label>last name <span>*</span></label>--}}
{{--                                    <input type="text">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="input_box">--}}
{{--                                <label>Company name <span>*</span></label>--}}
{{--                                <input type="text">--}}
{{--                            </div>--}}
{{--                            <div class="input_box">--}}
{{--                                <label>Country<span>*</span></label>--}}
{{--                                <select class="select__option">--}}
{{--                                    <option>Select a country…</option>--}}
{{--                                    <option>Afghanistan</option>--}}
{{--                                    <option>American Samoa</option>--}}
{{--                                    <option>Anguilla</option>--}}
{{--                                    <option>American Samoa</option>--}}
{{--                                    <option>Antarctica</option>--}}
{{--                                    <option>Antigua and Barbuda</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="input_box">--}}
{{--                                <label>Address <span>*</span></label>--}}
{{--                                <input type="text" placeholder="Street address">--}}
{{--                            </div>--}}
{{--                            <div class="input_box">--}}
{{--                                <input type="text" placeholder="Apartment, suite, unit etc. (optional)">--}}
{{--                            </div>--}}
{{--                            <div class="input_box">--}}
{{--                                <label>District<span>*</span></label>--}}
{{--                                <select class="select__option">--}}
{{--                                    <option>Select a country…</option>--}}
{{--                                    <option>Afghanistan</option>--}}
{{--                                    <option>American Samoa</option>--}}
{{--                                    <option>Anguilla</option>--}}
{{--                                    <option>American Samoa</option>--}}
{{--                                    <option>Antarctica</option>--}}
{{--                                    <option>Antigua and Barbuda</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="input_box">--}}
{{--                                <label>Postcode / ZIP <span>*</span></label>--}}
{{--                                <input type="text">--}}
{{--                            </div>--}}
{{--                            <div class="margin_between">--}}
{{--                                <div class="input_box space_between">--}}
{{--                                    <label>Phone <span>*</span></label>--}}
{{--                                    <input type="text">--}}
{{--                                </div>--}}
{{--                                <div class="input_box space_between">--}}
{{--                                    <label>Email address <span>*</span></label>--}}
{{--                                    <input type="email">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
                    <div class="wn__order__box">
                        <h3 class="onder__title">Đơn Hàng Của Bạn</h3>
                        <ul class="order__total">
                            <li>Tên Sản Phẩm</li>
                            <li>Tổng</li>
                        </ul>
                        <ul class="order_product">
                            @foreach($cart as $key => $item)
                                <li>{{$item->ten_sach}} × <b>{{$item->quantity}}</b><span>{{number_format($item->sub_total)}}</span></li>
                            @endforeach
                        </ul>

                        <ul class="total__amount">
                            <li>Tổng Tiền Đơn Hàng<span>{{number_format($cart->sum('sub_total'))}} VNĐ</span></li>
                        </ul>
                    </div>
                    <div id="accordion" class="checkout_accordion mt--30" role="tablist">
                        <div class="payment">
                            <div class="che__header" role="tab" id="headingThree">
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="payment-body">Thanh Toán Bằng Tiền Mặt Khi Giao Hàng.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Checkout Area -->
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
