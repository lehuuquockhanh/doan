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
                    <h1>Đơn Hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">>Đơn Hàng</li>
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
                                {{--                                <a href="{{route('tacgia.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Thêm mới</a>--}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Địa Chỉ</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Email</th>
                                    <th>Note</th>
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
                                        <td>{{ $item->note }}</td>
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
                                                <a href="{{route('donhang.edit', $item->id)}}" class="nav-link border border-light rounded waves-effect bg-success ml-3">
                                                    <i class="fa fa-check-circle"></i>
                                                </a>
                                                <form action="{{ route('donhang.destroy', $item->id)}}" method="post" >
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
                                                {{--                                                <form action="{{ route('tacgia.destroy', $item->id)}}" method="post" >--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    @method('DELETE')--}}
                                                {{--                                                    <button class="nav-link border border-light rounded waves-effect bg-danger ml-3" type="submit" >--}}
                                                {{--                                                        <i class="fa fa-trash"></i>--}}
                                                {{--                                                    </button>--}}
                                                {{--                                                </form>--}}
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Địa Chỉ</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Email</th>
                                    <th>Note</th>
                                    <th>Trạng Thái</th>
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

        $(function () {

        });
        function showDetail(id) {
            // $('.modal-content').html('OrderId=' + id);
            // $('#myModal').modal('show')
            $.ajax({
                url: "/donhang/" + id,
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
