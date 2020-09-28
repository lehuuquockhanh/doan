@extends('layouts.app_user')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Chi tiết sản phẩm</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Chi tiết sản phẩm</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start main Content -->
    <div class="maincontent bg--white pt--80 pb--55">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="wn__single__product">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="wn__fotorama__wrapper">
                                    <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                        <a href="1.jpg"><img
                                                src="{{\Illuminate\Support\Facades\URL::to('/' . $book->hinh_anh)}}"
                                                alt=""></a>
                                        <a href="2.jpg"><img
                                                src="{{\Illuminate\Support\Facades\URL::to('/' . $book->hinh_anh_1)}}"
                                                alt=""></a>
                                        <a href="3.jpg"><img src="images/product/3.jpg" alt=""></a>
                                        <a href="4.jpg"><img src="images/product/4.jpg" alt=""></a>
                                        <a href="5.jpg"><img src="images/product/5.jpg" alt=""></a>
                                        <a href="6.jpg"><img src="images/product/6.jpg" alt=""></a>
                                        <a href="7.jpg"><img src="images/product/7.jpg" alt=""></a>
                                        <a href="8.jpg"><img src="images/product/8.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="product__info__main">
                                    <h1>{{$book->ten_sach}}</h1>
                                    <div class="product-reviews-summary d-flex">
                                        <ul class="rating-summary d-flex">
                                            <li><i class="zmdi zmdi-star-outline"></i></li>
                                            <li><i class="zmdi zmdi-star-outline"></i></li>
                                            <li><i class="zmdi zmdi-star-outline"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                        </ul>
                                    </div>
                                    <div class="prize-box">
                                        @if($book->gia_khuyen_mai)
                                            <li>{{ number_format($book->gia_khuyen_mai)}} VNĐ</li>
                                            <li style="text-decoration: line-through">{{number_format($book->gia_ban)}}
                                                VNĐ
                                            </li>
                                        @else
                                            <li>{{number_format($book->gia_ban)}} VNĐ</li>
                                        @endif
                                        <li>Tồn kho : {{$soLuongTonKho}}</li>
                                        <input type="hidden" name="tonkho" id="tonkho" value="{{$soLuongTonKho}}">
                                    </div>

                                    <div class="product__overview">
                                        <p>{{$book->mo_ta}}</p>
                                        <p></p>
                                    </div>
                                    <div class="box-tocart d-flex">
                                        <span>SL</span>
                                        <input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty"
                                               type="number">
                                        <div class="addtocart__actions">
                                            <button class="tocart" type="button" title="Add to Cart"
                                                    onclick="addToCart({{$book->id}})">Thêm Vào Giỏ
                                            </button>
                                        </div>
                                        <div class="product-addto-links clearfix">
                                            <a class="wishlist" href="#"></a>
                                            <a class="compare" href="#"></a>
                                        </div>
                                    </div>
                                    <div class="product_meta">
											<span class="posted_in">Loại:
												<a href="#">{{$categoryDetail->ten_the_loai}}</a>,
											</span>
                                    </div>
                                    <div class="product-share">
                                        <ul>
                                            <li class="categories-title">Chia sẻ :</li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-social-twitter icons"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-social-tumblr icons"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-social-facebook icons"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-social-linkedin icons"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product__info__detailed">
                        <div class="pro_details_nav nav justify-content-start" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details"
                               role="tab">Chi Tiết</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Nhận Xét</a>
                        </div>
                        <div class="tab__container">
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                                <div class="description__attribute">
                                    <p>{{$book->mo_ta}}</p>
                                </div>
                            </div>
                            <!-- End Single Tab Content -->
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                                <div class="review__attribute">
                                    <h1>Customer Reviews</h1>
                                    <h2>Hastech</h2>
                                    <div class="review__ratings__type d-flex">
                                        <div class="review-ratings">
                                            <div class="rating-summary d-flex">
                                                <span>Quality</span>
                                                <ul class="rating d-flex">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>

                                            <div class="rating-summary d-flex">
                                                <span>Price</span>
                                                <ul class="rating d-flex">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="rating-summary d-flex">
                                                <span>value</span>
                                                <ul class="rating d-flex">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Hastech</p>
                                            <p>Review by Hastech</p>
                                            <p>Posted on 11/6/2018</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-fieldset">
                                    <h2>You're reviewing:</h2>
                                    <h3>Chaz Kangeroo Hoodie</h3>
                                    <div class="review-field-ratings">
                                        <div class="product-review-table">
                                            <div class="review-field-rating d-flex">
                                                <span>Quality</span>
                                                <ul class="rating d-flex">
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="review-field-rating d-flex">
                                                <span>Price</span>
                                                <ul class="rating d-flex">
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="review-field-rating d-flex">
                                                <span>Value</span>
                                                <ul class="rating d-flex">
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review_form_field">
                                        <div class="input__box">
                                            <span>Nickname</span>
                                            <input id="nickname_field" type="text" name="nickname">
                                        </div>
                                        <div class="input__box">
                                            <span>Summary</span>
                                            <input id="summery_field" type="text" name="summery">
                                        </div>
                                        <div class="input__box">
                                            <span>Review</span>
                                            <textarea name="review"></textarea>
                                        </div>
                                        <div class="review-form-actions">
                                            <button>Submit Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab Content -->
                        </div>
                    </div>
                    <div class="wn__related__product pt--80 pb--50">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">Sản Phẩm Liên Quan</h2>
                        </div>
                        <div class="row mt--60">
                            <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                                <!-- Start Single Product -->
                                @foreach($booksRelate as $key => $item)
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img"
                                               href="{{route('home.product_detail', $item->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh)}}"
                                                    alt="product image"></a>
                                            <a class="second__img animation1"
                                               href="{{route('home.product_detail', $item->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh_1)}}"
                                                    alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">Siêu Giảm Giá</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4>
                                                <a href="{{route('home.product_detail', $book->id)}}">{{$item->ten_sach}}</a>
                                            </h4>
                                            <ul class="prize d-flex">
                                                @if($item->gia_khuyen_mai)
                                                    <li>{{ number_format($item->gia_khuyen_mai)}} VNĐ</li>
                                                    <li class="old_prize">{{number_format($item->gia_ban)}} VNĐ</li>
                                                @else
                                                    <li>{{number_format($item->gia_ban)}} VNĐ</li>
                                                @endif

                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="cart" href="#" onclick="addToCart({{$item->id}})"><i
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

                            <!-- Start Single Product -->
                            </div>
                        </div>
                    </div>
                    <div class="wn__related__product">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">Upsell Sản Phẩm</h2>
                        </div>
                        <div class="row mt--60">
                            <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                                <!-- Start Single Product -->
                                @foreach($upsellBooks as $key => $book)
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img"
                                               href="{{route('home.product_detail', $book->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $book->hinh_anh)}}"
                                                    alt="product image"></a>
                                            <a class="second__img animation1"
                                               href="{{route('home.product_detail', $book->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh_1)}}"
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
                                                        <li><a class="cart" href="#" onclick="addToCart({{$item->id}})"><i
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
                            <!-- Start Single Product -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="wedget__categories poroduct--cat">
                            <h3 class="wedget__title">Danh Mục Sản Phẩm</h3>
                            <ul>
                                @foreach($categories as $key => $theloai)
                                    <li>
                                        <a href="{{route('home.products', ['categoryId' => $theloai->id])}}">{{$theloai->ten_the_loai}}
                                            <span>({{$theloai->total_book}})</span></a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="wedget__categories pro--range">
                            <h3 class="wedget__title">Lọc Theo Giá</h3>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form action="#" method="GET">
                                        <div id="slider-range"></div>
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output">
                                                    <span>Giá :</span><input type="text" id="amount" readonly="">
                                                </div>
                                                <div class="price--filter">
                                                    <a href="#">Lọc</a>
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
                                @foreach($categories as $key => $theloai)
                                    <li>
                                        <a href="{{route('home.products', ['categoryId' => $theloai->id])}}">{{$theloai->ten_the_loai}}
                                            <span>({{$theloai->total_book}})</span></a></li>
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
            </div>
        </div>
    </div>
    <!-- End main Content -->
    <!-- Start Search Popup -->
    <div class="box-search-content search_active block-bg close__top">
        <form id="search_mini_form--2" class="minisearch" action="#">
            <div class="field__search">
                <input type="text" placeholder="Search entire store here...">
                <div class="action">
                    <a href="#"><i class="zmdi zmdi-search"></i></a>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>close</span>
        </div>
    </div>
    <!-- End Search Popup -->
    <form action="{{ route('cart.store') }}" method="POST" id="cartForm">
        {{ csrf_field() }}
        <input type="hidden" value="" id="id" name="id">
        <input type="hidden" value="" id="quantity" name="quantity">
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
            $("#quantity").val($("#qty").val());
            // alert($("#id").val())
            let tonkho = $("#tonkho").val();
            let qty = $("#qty").val();
            if (Number(qty) > Number(tonkho)) {
                alert('Nhập quá số lượng tồn kho')
            } else {
                $("#cartForm").submit();
            }


        }
    </script>
@endsection
