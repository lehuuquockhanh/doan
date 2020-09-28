@extends('layouts.app_user')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Giỏ Hàng</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home.User')}}">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Giỏ Hàng</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->
    <div class="cart-main-area section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ol-lg-12">
                    <form action="{{route('cart.updateCart')}}" id="cartForm" method="post">
                        @csrf
                        <div class="table-content wnro__table table-responsive">
                            @if(isset($cart) && count($cart))
                                <table>
                                    <thead>
                                    <tr class="title-top">
                                        <th class="product-thumbnail">Hình Ảnh</th>
                                        <th class="product-name">Sản Phẩm</th>
                                        <th class="product-price">Giá Sản Phẩm</th>
                                        <th class="product-quantity">Số Lượng</th>
                                        <th class="product-quantity">Tồn Kho</th>
                                        <th class="product-subtotal">Giá</th>
                                        <th class="product-remove">Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $key => $item)
                                        <tr>
                                            <input type="hidden" name="product[{{$key}}][rowId]" value="{{$item->id}}">
                                            <td class="product-thumbnail"><a
                                                    href="{{route('home.product_detail', $item->ma_sach)}}"><img
                                                        src="{{\Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh)}}"
                                                        alt="product img"></a></td>
                                            <td class="product-name"><a href="#">{{$item->ten_sach}}</a></td>
                                            <td class="product-price"><span
                                                    class="amount">{{number_format($item->price)}}</span> VNĐ
                                            </td>
                                            <td class="product-quantity"><input onchange="check(this,{{$item->bookLeft}})" type="number" value="{{$item->quantity}}" name="product[{{$key}}][quantity]"></td>
                                            <td>{{$item->bookLeft}}</td>
                                            <td class="product-subtotal">{{number_format($item->sub_total)}} VNĐ</td>
                                            <td class="product-remove"><a
                                                    href="{{route('cart.remove', ['id'=> $item->id])}}">X</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </form>
                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                            <li><button class="btn btn-outline-primary" id="btnCheckout" onclick="location.href='{{route('home.checkout')}}'" >Thanh Toán</button></li>
                            <li><button class="btn btn-outline-secondary" id="btnUpdateCart" href="#" onclick="$('#cartForm').submit()">
                                    <i class="fa fa-refresh"></i>Cập Nhật Giỏ
                                </button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="cartbox__total__area">
                        <div class="cartbox-total d-flex justify-content-between">
                            {{--<ul class="cart__total__list">--}}
                            {{--<li>Cart total</li>--}}
                            {{--<li>Sub Total</li>--}}
                            {{--</ul>--}}
                            {{--<ul class="cart__total__tk">--}}
                            {{--<li>{{number_format($item->total)}} VNĐ</li>--}}
                            {{--<li>{{number_format($item->subtotal)}} VNĐ</li>--}}
                            {{--</ul>--}}
                        </div>
                        <div class="cart__total__amount">
                            <span>Tổng Cộng</span>
                            <span>{{number_format($cart->sum('sub_total'))}} VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
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
    <script>
        function check(data, stockLeft) {
            if(data.value > stockLeft) {
                alert('Bạn đã nhập quá số lượng tồn kho')
                $("#btnCheckout").prop('disabled', true);
                $("#btnUpdateCart").prop('disabled', true);
            } else {
                $("#btnCheckout").prop('disabled', false);
                $("#btnUpdateCart").prop('disabled', false);
            }
            console.log(data.value);
        }
    </script>

@endsection