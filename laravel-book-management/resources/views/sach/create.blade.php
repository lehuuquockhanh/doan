@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sách</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sách</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Mới <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" method="POST" action="{{route('sach.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_sach">Tên Sách</label>
                                    <input type="text" name="ten_sach" class="form-control" id="ten_sach"
                                           value="{{old('ten_sach')}}"
                                           placeholder="Nhập Tên Sách">
                                </div>
                                <div class="form-group">
                                    <label for="ngay_xuat_ban">Ngày Xuất Bản</label>
                                    <input type="text" name="ngay_xuat_ban" class="form-control" id="ngay_xuat_ban"
                                           value="{{old('ngay_xuat_ban')}}"
                                           placeholder="Ngày Xuất Bản">
                                </div>
                                <div class="form-group">
                                    <label for="hinh_anh">Hình Ảnh</label>
                                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
{{--                                    <input type="text" name="hinh_anh" class="form-control" id="hinh_anh"--}}
{{--                                           value="{{old('hinh_anh')}}"--}}
{{--                                           placeholder="Nhập Hình Ảnh">--}}
                                </div>
                                <div class="form-group">
                                    <label for="hinh_anh_1">Hình Ảnh 1</label>
                                    <input type="file" class="form-control" id="hinh_anh_1" name="hinh_anh_1">
                                    {{--                                    <input type="text" name="hinh_anh" class="form-control" id="hinh_anh"--}}
                                    {{--                                           value="{{old('hinh_anh')}}"--}}
                                    {{--                                           placeholder="Nhập Hình Ảnh">--}}
                                </div>
                                <div class="form-group">
                                    <label for="tac_gia">Tác Giả</label>
                                    <select class="form-control" id="tac_gia" name="tac_gia">
                                        <option value="" disabled selected>Chọn Tác Giả</option>
                                        @foreach($tacgias as $key => $tacgia)
                                            <option value="{{$tacgia->id}}"
                                                    @if($tacgia->id == old('tac_gia')) selected @endif>{{$tacgia->ten_tac_gia}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="nha_xuat_ban">Nhà Xuất Bản</label>
                                    <select class="form-control" id="nha_xuat_ban" name="nha_xuat_ban">
                                        <option value="" disabled selected>Chọn Tác Giả</option>
                                        @foreach($nhaxuatbans as $key => $nxb)
                                            <option value="{{$nxb->id}}"
                                                    @if($nxb->id == old('nha_xuat_ban')) selected @endif>{{$nxb->ten_nha_xuat_ban}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="the_loai">Thể Loại Sách</label>
                                    <select class="form-control" id="the_loai" name="the_loai">
                                        <option value="" disabled selected>Chọn Thể Loại</option>
                                        @foreach($theloais as $key => $theloai)
                                            <option value="{{$theloai->id}}"
                                                    @if($theloai->id == old('the_loai')) selected @endif>{{$theloai->ten_the_loai}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="so_luong">Số Lượng</label>
                                    <input type="number" name="so_luong" class="form-control" id="so_luong"
                                           value="{{old('so_luong')}}"
                                           placeholder="Nhập Số Lượng">
                                </div>
                                <div class="form-group">
                                    <label for="gia_nhap">Giá Nhập Vào</label>
                                    <input type="number" name="gia_nhap" class="form-control" id="gia_nhap"
                                           value="{{old('gia_nhap')}}"
                                           placeholder="Nhập giá nhập vào">
                                </div>
                                <div class="form-group">
                                    <label for="gia_ban">Giá Nhập Bán Ra</label>
                                    <input type="number" name="gia_ban" class="form-control" id="gia_ban"
                                           value="{{old('gia_ban')}}"
                                           placeholder="Nhập giá bán">
                                </div>
                                <div class="form-group">
                                    <label for="gia_khuyen_mai">Giá Khuyến Mại</label>
                                    <input type="number" name="gia_khuyen_mai" class="form-control" id="gia_khuyen_mai"
                                           value="{{old('gia_khuyen_mai')}}"
                                           placeholder="Nhập giá khuyến mại">
                                </div>
                                <div class="form-group">
                                    <label for="mo_ta">Mô Tả</label>
                                    <input type="text" name="mo_ta" class="form-control" id="mo_ta"
                                           value="{{old('mo_ta')}}"
                                           placeholder="Nhập Mô Tả">
                                </div>
                                <div class="form-group">
                                    <label for="mo_ta2">Mô Tả</label>
                                    <input type="text" name="mo_ta2" class="form-control" id="mo_ta2"
                                           value="{{old('mo_ta2')}}"
                                           placeholder="Nhập Mô Tả 2">
                                </div>
                                <div class="custom-control custom-checkbox text-left">
                                    <input type="checkbox" class="custom-control-input" name="is_pin" id="defaultUnchecked">
                                    <label class="custom-control-label" for="defaultUnchecked">Ghim</label>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-info btn-md" href="{{ route("sach.index") }}"><i
                                        class="fa fa-arrow-left"></i> Quay Lại </a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


@endsection
@section('scripts')
    <script>


    </script>
@endsection
