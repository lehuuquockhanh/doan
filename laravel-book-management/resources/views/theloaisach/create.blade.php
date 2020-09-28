@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thể Loại Sách</h1>
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
                        <form role="form" id="quickForm" method="POST" action="{{route('theloaisach.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_phong_ban">Tên Thể Loại</label>
                                    <input type="text" name="ten_the_loai" class="form-control" id="ten_the_loai" value="{{old('ten_the_loai')}}"
                                           placeholder="Nhập Tên Thể Loại">
                                </div>
                                <div class="form-group">
                                    <label for="hinh_anh">Hình Ảnh</label>
                                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
{{--                                    <input type="text" name="hinh_anh" class="form-control" id="hinh_anh" value="{{old('hinh_anh')}}"--}}
{{--                                           placeholder="Nhập Hình Ảnh">--}}
                                </div>
                                <div class="form-group">
                                    <label for="mo_ta">Mô Tả</label>
                                    <input type="text" name="mo_ta" class="form-control" id="mo_ta" value="{{old('mo_ta')}}"
                                           placeholder="Nhập Mô Tả">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" >Save</button>
                                <a class="btn btn-info btn-md"  href="{{ route("theloaisach.index") }}"><i class="fa fa-arrow-left"></i> Quay Lại </a>
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
