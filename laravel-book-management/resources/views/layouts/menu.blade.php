<aside class="main-sidebar sidebar-light-white elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image elevation-3"
             style="opacity: .8;max-height: 40px">
        <span class="brand-text font-weight-light">Quản Lý Sách</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar taikhoan panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item has-treeview @if(in_array($index, [\App\Consts\Consts::SIDEBAR_TAI_KHOAN, \App\Consts\Consts::SIDEBAR_PHAN_QUYEN])) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Hệ Thống
                            <i class="fas fa-angle-left right"></i>
                            {{--                                <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('taikhoan.index')}}"
                               class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_TAI_KHOAN])) active @endif">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Tài Khoản</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">--}}
{{--                                <i class="fas fa-circle nav-icon"></i>--}}
{{--                                <p>Phân Quyền</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
                <li class="nav-item has-treeview @if(in_array($index, [\App\Consts\Consts::SIDEBAR_NXB, \App\Consts\Consts::SIDEBAR_TAC_GIA, \App\Consts\Consts::SIDEBAR_THE_LOAI_SACH, \App\Consts\Consts::SIDEBAR_SACH])) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản Lý Sách
                            <i class="fas fa-angle-left right"></i>
                            {{--                                <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('nhaxuatban.index')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_NXB])) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Nhà Xuất Bản
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tacgia.index')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_TAC_GIA])) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Tác Giả
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('theloaisach.index')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_THE_LOAI_SACH])) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Thể loại Sách
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sach.index')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_SACH])) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Sách
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @if(in_array($index, [\App\Consts\Consts::SIDEBAR_DON_HANG])) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Quản Lý Đơn Hàng
                            <i class="fas fa-angle-left right"></i>
                            {{--                                <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('donhang.index')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_DON_HANG])) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Đơn Hàng
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @if(in_array($index, [\App\Consts\Consts::SIDEBAR_TON_KHO, \App\Consts\Consts::SIDEBAR_TIEN_LAI])) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Thống Kê
                            <i class="fas fa-angle-left right"></i>
                            {{--                                <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('thongke.index')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_TON_KHO])) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Hàng Tồn Kho
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('thongke.index2')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_TIEN_LAI])) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Tiền Lãi
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('blog.index')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_BLOG])) active @endif">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('khachhang.index')}}" class="nav-link @if(in_array($index, [\App\Consts\Consts::SIDEBAR_CUSTOMER])) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Khách Hàng
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
