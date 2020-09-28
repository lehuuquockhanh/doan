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
                <div class="col-lg-12 col-12">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Lịch Sử Đặt Hàng</h3>
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Địa Chỉ</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Email</th>
                                    <th>Trạng Thái</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->ten_khach_hang }}</td>
                                        <td>{{ $item->dia_chi }}</td>
                                        <td>{{ $item->so_dien_thoai }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-pill badge-secondary">Đặt Hàng</span>
                                            @elseif($item->status == 2)
                                                <span class="badge badge-pill badge-info">Đã Thanh Toán</span>
                                            @elseif($item->status == 3)
                                                <span class="badge badge-pill badge-success">Đã Giao Hàng</span>
                                            @elseif($item->status == 4)
                                                <span class="badge badge-pill badge-danger">Đã Hủy</span>
                                            @endif

                                        </td>
                                        <td>
                                            <div class="row">
                                                <a href="#"
                                                   class="nav-link border border-light rounded waves-effect bg-primary ml-3" onclick="showDetail({{$item->id}})">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <form action="{{ route('donhang_user.destroy', $item->id)}}" method="post" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="nav-link border border-light rounded waves-effect bg-danger ml-3" type="submit" >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="myModal"
                                                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

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
@section('scripts')
    <script>

        $(function () {

        });
        function showDetail(id) {
            // $('.modal-content').html('OrderId=' + id);
            // $('#myModal').modal('show')
            $.ajax({
                url: "/history/donhang?id=" + id,
                type: "GET",
                data: {
                },
                success: function (response) {
                    $(".modal-content").html(response);
                    $("#myModal").modal();
                },
            });
        }
    </script>
@endsection
