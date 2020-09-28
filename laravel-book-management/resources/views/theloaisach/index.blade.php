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
                    <h1>Thể Loại Sách</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thể Loại Sách</li>
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
                                <a href="{{route('theloaisach.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Thêm mới</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Mã Thể Lọai</th>
                                    <th>Tên Thể Loại</th>
                                    <th>Hình Ảnh</th>
                                    <th>Mô tả</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->ten_the_loai }}</td>
                                        <td>
                                            <img src="{{ \Illuminate\Support\Facades\URL::to('/' . $item->hinh_anh) }}"
                                                 class="img-thumbnail" width="70">
{{--                                            <img src="images/{{ $item->hinh_anh }}" style="max-width: 70px; height: auto">--}}
                                        </td>
                                        <td>{{ $item->mo_ta }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('theloaisach.edit',$item->id)}}" class="nav-link border border-light rounded waves-effect bg-primary ml-3">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <form action="{{ route('theloaisach.destroy', $item->id)}}" method="post" >
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
                                    <th>Mã Thể Lọai</th>
                                    <th>Tên Thể Loại</th>
                                    <th>Hình Ảnh</th>
                                    <th>Mô tả</th>
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
