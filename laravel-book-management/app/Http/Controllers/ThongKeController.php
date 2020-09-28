<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\ChucVu;
use App\Consts\Consts;
use App\NhanVien;
use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = ChiTietDonHang::select('ten_sach', DB::raw('sum(chi_tiet_don_hang.so_luong) as totalOrder'), 'sach.so_luong')
            ->leftJoin('sach', 'chi_tiet_don_hang.ma_sach', 'sach.id')
            ->join('don_hang', 'chi_tiet_don_hang.ma_don_hang','don_hang.id')
            ->where('don_hang.status', '<>', 4)
            ->groupBy('ma_sach', 'ten_sach', 'sach.so_luong')
            ->paginate(Consts::ITEM_PER_PAGE);

        return view('thongke.index', [
            'items' => $items
        ])
            ->with('index', Consts::SIDEBAR_TON_KHO);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        //
        $items = ChiTietDonHang::select('ten_sach', DB::raw('sum(chi_tiet_don_hang.so_luong) as totalOrder'), 'sach.so_luong', 'gia_nhap', 'gia_ban', 'gia_khuyen_mai')
            ->leftJoin('sach', 'chi_tiet_don_hang.ma_sach', 'sach.id')
            ->join('don_hang', 'don_hang.id', 'chi_tiet_don_hang.ma_don_hang')
            ->where('don_hang.status', 3)
            ->groupBy('ma_sach', 'ten_sach', 'sach.so_luong', 'gia_nhap', 'gia_ban', 'gia_khuyen_mai')
            ->paginate(Consts::ITEM_PER_PAGE);

        return view('thongke.index2', [
            'items' => $items
        ])
            ->with('index', Consts::SIDEBAR_TIEN_LAI);
    }
}
