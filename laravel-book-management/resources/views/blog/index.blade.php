@extends('layouts.app')
@section('content')
    @if(session()->get('message'))
        <div class="alert alert-success">
            <b>{{ session()->get('message') }}</b>
        </div>
    @endif
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('blog.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Thêm mới</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Mã Blog</th>
                                    <th>Tiêu Đề</th>
                                    <th>Thể Loại</th>
                                    <th>Hình Ảnh</th>
                                    <th>Mô Tả</th>
                                    <th>Mô Tả 2</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->ten_the_loai }}</td>
                                        <td>
                                            <img src="{{ \Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh) }}"
                                                 class="img-thumbnail" width="70">
                                        </td>
                                        <td>{{ $item->mo_ta }}</td>
                                        <td>{{ $item->mo_ta2 }}</td>

                                        <td>
                                            <div class="row">
                                                <a href="{{ route('blog.edit',$item->id)}}" class="nav-link border border-light rounded waves-effect bg-primary ml-3">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <form action="{{ route('blog.destroy', $item->id)}}" method="post" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="nav-link border border-light rounded waves-effect bg-danger ml-3" type="submit" >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã Blog</th>
                                    <th>Tiêu Đề</th>
                                    <th>Thể Loại</th>
                                    <th>Hình Ảnh</th>
                                    <th>Mô Tả</th>
                                    <th>Mô Tả 2</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                            {{ $items->links() }}
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>

        $(function() {

        });

    </script>
@endsection
