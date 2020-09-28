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
                    <h1>Hàng Tồn Kho</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">>Hàng Tồn Kho</li>
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
                                {{--<a href="{{route('tacgia.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Thêm mới</a>--}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Tên Sách</th>
                                    <th>Số Lượng Đặt Hàng</th>
                                    <th>Tổng</th>
                                    <th>Số Lượng Còn Lại</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $item->ten_sach }}</th>
                                        <td>{{ $item->totalOrder }}</td>
                                        <td>{{ $item->so_luong }}</td>
                                        <td>{{ $item->so_luong - $item->totalOrder }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Tên Sách</th>
                                    <th>Số Lượng Đặt Hàng</th>
                                    <th>Tổng</th>
                                    <th>Số Lượng Còn Lại</th>
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
