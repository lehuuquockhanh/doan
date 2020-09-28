@extends('layouts.app_user')
@section('content')
    <!-- Start Slider area -->
    <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        <!-- Start Single Slide -->
        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider__content">
                            <div class="contentbox">
                                <h2>Mua Cuốn <span> Sách </span></h2>
                                <h2>Yêu <span>Thích </span></h2>
                                <h2>Của Bạn Từ <span> Đây </span></h2>
                                <a class="shopbtn" href="#">Mua Sắm Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider__content">
                            <div class="contentbox">
                                <div class="contentbox">
                                    <h2>Mua Cuốn <span> Sách </span></h2>
                                    <h2>Yêu <span>Thích </span></h2>
                                    <h2>Của Bạn Từ <span> Đây </span></h2>
                                    <a class="shopbtn" href="#">Mua Sắm Ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
    <!-- End Slider area -->
    <!-- Start BEst Seller Area -->
    <section class="wn__product__area brown--color pt--80  pb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center">
                        <h2 class="title__be--2">Sản Phẩm <span class="color--theme"> Mới</span></h2>
                        <p>Có rất nhiều những cuốn sách bổ ích đang giúp bạn phát triển bản thân</p>
                    </div>
                </div>
            </div>
            <!-- Start Single Tab Content -->
            <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                <!-- Start Single Product -->
                @foreach($sachMois as $key => $item)
                    <div class="product product__style--3">

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="{{route('home.product_detail', $item->id)}}"><img
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
                                <h4><a href="{{route('home.product_detail', $item->id)}}">{{$item->ten_sach}}</a></h4>
                                <ul class="prize d-flex">
                                    <li>{{ number_format($item->gia_khuyen_mai ? $item->gia_khuyen_mai : $item->gia->gia_ban) }}</li>
                                    @if($item->gia_khuyen_mai)
                                        <li class="old_prize">{{$item->gia_ban}}</li>
                                    @endif
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links">
                                            <li><a class="cart" href="#" onclick="addToCart({{$item->id}})"><i
                                                        class="bi bi-shopping-bag4"></i></a>
                                            </li>
                                            <li><a class="wishlist" href="wishlist.html"><i
                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                            <li><a data-toggle="modal" title="Quick View"
                                                   class="quickview modal-view detail-link" href="#productmodal"><i
                                                        class="bi bi-search"></i></a></li>
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
                    </div>
                @endforeach
            </div>
            <!-- End Single Tab Content -->
        </div>
    </section>
    <!-- Start BEst Seller Area -->
    <!-- Start NEwsletter Area -->
    <section class="wn__newsletter__area bg-image--2">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
                    <div class="section__title text-center">
                        <h2>Ở Lại với chúng tôi</h2>
                    </div>
                    <div class="newsletter__block text-center">
                        <p>Theo dõi bản tin của chúng tôi ngay bây giờ và cập nhật các bộ sưu tập mới, lookbook mới nhất
                            và cung cấp độc quyền.</p>
                        <form action="#">
                            <div class="newsletter__box">
                                <input type="email" placeholder="Nhập Email của bạn">
                                <button>Theo dõi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End NEwsletter Area -->
    <!-- Start Best Seller Area -->
    <section class="wn__bestseller__area bg--white pt--80  pb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center">
                        <h2 class="title__be--2">Tất cả <span class="color--theme">Sản Phẩm</span></h2>
                        <p>Đến với cửa hàng chúng tôi để giúp bạn có những kiến thức và hổ trợ bạn hành trang phát triển bản thân</p>
                    </div>
                </div>
            </div>
            <div class="row mt--50">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="product__nav nav justify-content-center" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab">All</a>
                        @foreach($theloais as $key => $theloai)
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-{{$theloai->id}}"
                               role="tab">{{$theloai->ten_the_loai}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab__container mt--60">
                <!-- Start Single Tab Content -->
                <div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
                    <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                        @foreach($allBook as $key => $item)
                            <div class="single__product">
                                <!-- Start Single Product -->

                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="product product__style--3">
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
                                        <div class="product__content content--center content--center">
                                            <h4>
                                                <a href="{{route('home.product_detail', $item->id)}}">{{$item->ten_sach}}</a>
                                            </h4>
                                            <ul class="prize d-flex">
                                                <li>{{ number_format($item->gia_khuyen_mai ? $item->gia_khuyen_mai : $item->gia->gia_ban) }}</li>
                                                @if($item->gia_khuyen_mai)
                                                    <li class="old_prize">{{$item->gia_ban}}</li>
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
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- End Single Tab Content -->

                <!-- Start Single Tab Content -->
                @foreach($bookByCate as $key => $items)
                    <div class="row single__tab tab-pane fade" id="nav-{{$key}}" role="tabpanel">
                        <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                            @foreach($items as $key2 => $item)
                                <div class="single__product">
                                    <!-- Start Single Product -->
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="product product__style--3">
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
                                                    <a href="{{route('home.product_detail', $item->id)}}">{{$item->ten_sach}}</a>
                                                </h4>
                                                <ul class="prize d-flex">
                                                    <li>{{ number_format($item->gia_khuyen_mai ? $item->gia_khuyen_mai : $item->gia->gia_ban) }}</li>
                                                    @if($item->gia_khuyen_mai)
                                                        <li class="old_prize">{{$item->gia_ban}}</li>
                                                    @endif
                                                </ul>
                                                <div class="action">
                                                    <div class="actions_inner">
                                                        <ul class="add_to_links">
                                                            <li><a class="cart" href="#"
                                                                   onclick="addToCart({{$item->id}})"><i
                                                                        class="bi bi-shopping-bag4"></i></a></li>
                                                            <li><a class="wishlist" href="wishlist.html"><i
                                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                                            <li><a class="compare" href="#"><i
                                                                        class="bi bi-heart-beat"></i></a>
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
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Start BEst Seller Area -->
    <!-- Start Recent Post Area -->
    <section class="wn__recent__post bg--gray ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center">
                        <h2 class="title__be--2">Our <span class="color--theme">Blog</span></h2>
                        <p>Tổng hợp các bài viết hưu ích cho các bạn</p>
                    </div>
                </div>
            </div>
            <div class="row mt--50">
                @foreach($blogs as $key => $blog)
                    <div class="col-md-6 col-lg-4 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <h3><a href="blog-details.html">{{$blog->title}}</a></h3>
                                <p>{{$blog->mo_ta}}</p>
                                <div class="post__time">
                                    <span class="day">{{$blog->created_at}}</span>
                                    <div class="post-meta">
                                        <ul>
                                            <li><a href="#"><i class="bi bi-love"></i>72</a></li>
                                            <li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Recent Post Area -->
    <!-- Best Sale Area -->
    <section class="best-seel-area pt--80 pb--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center pb--50">
                        <h2 class="title__be--2">Sản Phẩm <span class="color--theme">Bán Chạy </span></h2>
                        <p>Dưới đây là những sản phẩm bán chạy nhất của cửa hàng chúng tôi</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider center">
            <!-- Single product start -->
            @foreach($bestSeller as $key => $item)
                <div class="product product__style--3">
                    <div class="product__thumb">
                        <a class="first__img" href="{{route('home.product_detail', $item->id)}}"><img
                                src="{{\Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh)}}"
                                alt="product image"></a>
                    </div>
                    <div class="product__content content--center">
                        <div class="action">
                            <div class="actions_inner">
                                <ul class="add_to_links">
                                    <li><a class="cart" href="#" onclick="addToCart({{$item->id}})"><i
                                                class="bi bi-shopping-bag4"></i></a></li>
                                    <li><a class="wishlist" href="wishlist.html"><i
                                                class="bi bi-shopping-cart-full"></i></a></li>
                                    <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                    <li><a data-toggle="modal" title="Quick View"
                                           class="quickview modal-view detail-link"
                                           href="#productmodal"><i class="bi bi-search"></i></a></li>
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
    </section>
    <!-- Best Sale Area Area -->
    <form action="{{ route('cart.store') }}" method="POST" id="cartForm">
        {{ csrf_field() }}
        <input type="hidden" value="" id="id" name="id">
    </form>
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
