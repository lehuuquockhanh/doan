@extends('layouts.app_user')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Sản Phẩm</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Sản Phẩm</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Shop Page -->
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="wedget__categories poroduct--cat">
                            <h3 class="wedget__title">Danh mục sản phẩm</h3>
                            <ul>
                                @foreach($theloais as $key => $theloai)
                                    <li>
                                        <a href="{{route('home.products', ['categoryId' => $theloai->id])}}">{{$theloai->ten_the_loai}}
                                            <span>({{$theloai->total_book}})</span></a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="wedget__categories pro--range">
                            <h3 class="wedget__title">Lọc theo giá</h3>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form action="{{route('home.products')}}" method="GET">
                                        @csrf
                                        <div id="slider-range"></div>
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output">
                                                    <span>Giá :</span><input type="text" id="amount" name="price" readonly="">
                                                </div>
                                                <div class="price--filter">
                                                    <button type="submit" class="btn btn-secondary">Lọc</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </aside>
                        <aside class="wedget__categories poroduct--tag">
                            <h3 class="wedget__title">Tags Sản Phẩm</h3>
                            <ul>
                                @foreach($theloais as $key => $theloai)
                                    <li>
                                        <a href="{{route('home.products', ['categoryId' => $theloai->id])}}">{{$theloai->ten_the_loai}}
                                            <span>{{$theloai->total_book}}</span></a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="wedget__categories sidebar--banner">
                            <img src="{{asset('users/images/others/banner_left.jpg')}}" alt="banner images">
                            <div class="text">
                                <h2>Sản Phẩm Mới</h2>
                                <h6>Giảm<br> <strong>40%</strong></h6>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                                <div class="shop__list nav justify-content-center" role="tablist">
                                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i
                                            class="fa fa-th"></i></a>
                                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i
                                            class="fa fa-list"></i></a>
                                </div>
                                <p>Showing {{$books->firstItem()}}–{{$books->lastItem()}} of {{$books->total()}} results</p>
                                <div class="orderby__wrapper">
                                    <span>Sort By</span>
                                    <select class="shot__byselect">
                                        <option>Default sorting</option>
                                        <option>HeadPhone</option>
                                        <option>Furniture</option>
                                        <option>Jewellery</option>
                                        <option>Handmade</option>
                                        <option>Kids</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab__container">
                        <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                            <div class="row">
                                <!-- Start Single Product -->
                                @foreach($books as $key => $book)
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img"
                                               href="{{route('home.product_detail', $book->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $book->hinh_anh)}}"
                                                    alt="product image"></a>
                                            <a class="second__img animation1"
                                               href="{{route('home.product_detail', $book->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $book->hinh_anh_1)}}"
                                                    alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">Siêu Giảm Giá</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4>
                                                <a href="{{route('home.product_detail', $book->id)}}">{{$book->ten_sach}}</a>
                                            </h4>
                                            <ul class="prize d-flex">
                                                @if($book->gia_khuyen_mai)
                                                    <li>{{ number_format($book->gia_khuyen_mai)}} VNĐ</li>
                                                    <li class="old_prize">{{number_format($book->gia_ban)}} VNĐ</li>
                                                @else
                                                    <li>{{number_format($book->gia_ban)}} VNĐ</li>
                                                @endif
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="cart" href="#" onclick="addToCart({{$book->id}})"><i
                                                                    class="bi bi-shopping-bag4"></i></a></li>
                                                        <li><a class="wishlist" href="wishlist.html"><i
                                                                    class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                                        </li>
                                                        <li><a data-toggle="modal" title="Quick View"
                                                               class="quickview modal-view detail-link"
                                                               href="#productmodal"><i class="bi bi-search"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__hover--content">
                                                <ul class="rating d-flex">
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="align-center">
                                {{ $books->links() }}
                            </div>

                        </div>
                        <div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
                            <div class="list__view__wrapper">
                                <!-- Start Single Product -->
                                @foreach($books as $key => $book)
                                    <div class="list__view">
                                        <div class="thumb">
                                            <a class="first__img"
                                               href="{{route('home.product_detail', $book->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $book->hinh_anh)}}"
                                                    alt="product images"></a>
                                            <a class="second__img animation1"
                                               href="{{route('home.product_detail', $book->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $book->hinh_anh_1)}}"
                                                    alt="product images"></a>
                                        </div>
                                        <div class="content">
                                            <h2>
                                                <a href="{{route('home.product_detail', $book->id)}}">{{$book->ten_sach}}</a>
                                            </h2>
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="prize__box">
                                                @if($book->gia_khuyen_mai)
                                                    <li>{{ number_format($book->gia_khuyen_mai)}} VNĐ</li>
                                                    <li class="old__prize">{{number_format($book->gia_ban)}} VNĐ</li>
                                                @else
                                                    <li>{{number_format($book->gia_ban)}} VNĐ</li>
                                                @endif
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                                augue nec est tristique auctor. Donec non est at libero vulputate
                                                rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                                vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                            <ul class="cart__action d-flex">
                                                <li class="cart"><a href="#" onclick="addToCart({{$book->id}})">Add to cart</a></li>
                                                <li class="wishlist"><a href="cart.html"></a></li>
                                                <li class="compare"><a href="cart.html"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
    <!-- Best Sale Area Area -->
    <form action="{{ route('cart.store') }}" method="POST" id="cartForm">
        {{ csrf_field() }}
        <input type="hidden" value="" id="id" name="id">
    </form>
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
@section('scripts')
    <script>

        $(function () {

        });

        function addToCart(id) {
            $("#id").val(id);
            // alert($("#id").val())
            $("#cartForm").submit();
        }
    </script>
@endsection
