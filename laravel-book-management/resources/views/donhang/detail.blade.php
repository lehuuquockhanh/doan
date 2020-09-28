<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Sách</th>
        <th>Số Lượng</th>
        <th>Tổng Tiền</th>
    </tr>
    </thead>
    <tbody>
        @foreach($items as $key => $item)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->ma_don_hang}}</td>
                <td>{{$item->ten_sach}}</td>
                <td>{{$item->so_luong}}</td>
                <td>{{$item->tong_tien}}</td>
            </tr>
        @endforeach

    </tbody>
</table>
