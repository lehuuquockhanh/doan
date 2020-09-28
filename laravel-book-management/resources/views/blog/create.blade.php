@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
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
                        <form role="form" id="quickForm" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tieu_de">Tiêu Đề</label>
                                    <input type="text" name="tieu_de" class="form-control" id="tieu_de"
                                           value="{{old('tieu_de')}}"
                                           placeholder="Nhập Tiêu Đề">
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
                                    <label for="hinh_anh">Hình Ảnh</label>
                                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
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
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-info btn-md" href="{{ route("blog.index") }}"><i
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
