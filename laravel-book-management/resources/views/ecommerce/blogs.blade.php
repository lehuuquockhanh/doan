@extends('layouts.app_user')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Trang Blog</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Blog</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Blog Area -->
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-page">
                        <div class="page__header">
                            <h2>Danh Mục: Blog</h2>
                        </div>
                        <!-- Start Single Post -->
                        @foreach($blogs as $key => $item)
                            <article class="blog__post d-flex flex-wrap">
                                <div class="thumb">
                                    <a href="blog-details.html">
                                        <img src="{{\Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh)}}" alt="blog images">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4><a href="blog-details.html">{{$item->title}}</a></h4>
                                    <ul class="post__meta">
                                        <li>Đăng Bài: <a href="#">Quốc Khánh</a></li>
                                        <li class="post_separator">/</li>
                                        <li>{{$item->created_at}}</li>
                                    </ul>
                                    <p>{{$item->mo_ta2}}</p>
                                    <div class="blog__btn">
                                        <a href="blog-details.html">Mở Rộng</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <!-- End Single Post -->

                    </div>
                    {{ $blogs->links() }}
{{--                    <ul class="wn__pagination">--}}
{{--                        <li class="active"><a href="#">1</a></li>--}}
{{--                        <li><a href="#">2</a></li>--}}
{{--                        <li><a href="#">3</a></li>--}}
{{--                        <li><a href="#">4</a></li>--}}
{{--                        <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>--}}
{{--                    </ul>--}}
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    <div class="wn__sidebar">
                        <!-- Start Single Widget -->
                        
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

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
