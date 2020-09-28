<?php

namespace App\Http\Controllers;

use App\ChucVu;
use App\Consts\Consts;
use App\NhanVien;
use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = User::where('role', 'user')->paginate(Consts::ITEM_PER_PAGE);
        return view('khachhang.index', [
            'datas' => $datas
        ])
            ->with('index', Consts::SIDEBAR_CUSTOMER);
    }
}
