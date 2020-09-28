@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tác Giả</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm Mới</li>
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
                        <form role="form" id="quickForm" method="POST" action="{{route('tacgia.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_phong_ban">Tên Tác Giả</label>
                                    <input type="text" name="ten_tac_gia" class="form-control" id="ten_tac_gia" value="{{old('ten_tac_gia')}}"
                                           placeholder="Nhập Tên Tác Giả">
                                </div>
                                <div class="form-group">
                                    <label for="dia_chi">Địa Chỉ</label>
                                    <input type="text" name="dia_chi" class="form-control" id="dia_chi" value="{{old('dia_chi')}}"
                                           placeholder="Nhập Địa Chỉ">
                                </div>
                                <div class="form-group">
                                    <label for="ngay_sinh">Ngày Sinh</label>
                                    <input type="text" name="ngay_sinh" class="form-control" id="ngay_sinh" value="{{old('ngay_sinh')}}"
                                           placeholder="Nhập Ngày Sinh">
                                </div>
                                <div class="form-group">
                                    <label for="hinh_anh">Hình Ảnh</label>
                                    <input type="text" name="hinh_anh" class="form-control" id="hinh_anh" value="{{old('hinh_anh')}}"
                                           placeholder="Nhập Hình Ảnh">
                                </div>

                                <div class="form-group">
                                    <label for="mo_ta">Mô Tả</label>
                                    <input type="text" name="mo_ta1" class="form-control" id="mo_ta1" value="{{old('mo_ta1')}}"
                                           placeholder="Nhập Mô Tả">
                                </div>
                                <div class="form-group">
                                    <label for="mo_ta2">Mô Tả 2</label>
                                    <input type="text" name="mo_ta2" class="form-control" id="mo_ta2" value="{{old('mo_ta2')}}"
                                           placeholder="Nhập Mô Tả 2">
                                </div>
                                <div class="form-group">
                                    <label for="mo_ta2">Mô Tả 3</label>
                                    <input type="text" name="mo_ta3" class="form-control" id="mo_ta2" value="{{old('mo_ta3')}}"
                                           placeholder="Nhập Mô Tả 3">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" >Save</button>
                                <a class="btn btn-info btn-md"  href="{{ route("tacgia.index") }}"><i class="fa fa-arrow-left"></i> Quay Lại </a>
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
