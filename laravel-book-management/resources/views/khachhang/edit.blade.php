@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tài Khoản</h1>
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
                            <h3 class="card-title">Cập nhật <small></small></h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('taikhoan.update', $item->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Họ Tên</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{old('name', $item->name)}}"
                                           placeholder="Nhập Họ Tên">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{old('email', $item->email)}}" disabled
                                           placeholder="Nhập Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" value="{{old('password', $item->password)}}"
                                           placeholder="Nhập Password">
                                </div>
                                <div class="form-group">
                                    <label for="email">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="" disabled selected>Chọn Role</option>
                                        <option value="user" @if(old('role', $item->role) == 'User') @endif >User</option>
                                        <option value="admin" @if(old('role', $item->role) == 'admin') @endif >Admin</option>
{{--                                        <option value="manager" @if(old('role', $item->role) == 'manager') @endif >Manager</option>--}}
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập Nhật Chức Vụ</button>
                                <a class="btn btn-info btn-md" href="{{ route("taikhoan.index") }}"><i
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
