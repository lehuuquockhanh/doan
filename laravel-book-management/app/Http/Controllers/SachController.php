<?php

namespace App\Http\Controllers;

use App\ChucVu;
use App\Consts\Consts;
use App\NhanVien;
use App\Blog;
use App\NhaXuatBan;
use App\Sach;
use App\TacGia;
use App\TheLoaiSach;
use App\Utils\FileUtils;
use Illuminate\Http\Request;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Sach::select('sach.*', 'ten_nha_xuat_ban', 'ten_tac_gia', 'ten_the_loai')
            ->leftJoin('the_loai_sach', 'sach.the_loai', 'the_loai_sach.id')
            ->leftJoin('tac_gia', 'sach.tac_gia', 'tac_gia.id')
            ->leftJoin('nha_xuat_ban', 'sach.nha_xuat_ban', 'nha_xuat_ban.id')
            ->orderBy('sach.id')
            ->paginate(Consts::ITEM_PER_PAGE);
        return view('sach.index', [
            'items' => $items
        ])
            ->with('index', Consts::SIDEBAR_SACH);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tacgias = TacGia::all();
        $nhaxuatbans = NhaXuatBan::all();
        $theloais = TheLoaiSach::all();
        return view('sach.create', [
            'tacgias' => $tacgias,
            'nhaxuatbans' => $nhaxuatbans,
            'theloais' => $theloais
        ])
            ->with('index', Consts::SIDEBAR_SACH);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ten_sach' => 'required',
            'ngay_xuat_ban' => 'required',
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'hinh_anh_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'hinh_anh_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'hinh_anh_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'hinh_anh_4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tac_gia' => 'required',
            'nha_xuat_ban' => 'required',
            'the_loai' => 'required',
            'so_luong' => 'required',
            'gia_nhap' => 'required',
            'gia_ban' => 'required',

        ]);
        $hinh_anh = FileUtils::uploadImage($request->hinh_anh, FileUtils::SACH_PATH);
        $hinh_anh_1 = FileUtils::uploadImage($request->hinh_anh_1, FileUtils::SACH_PATH);
//        $hinh_anh1 = FileUtils::uploadImage($request->hinh_anh_1);
//        $hinh_anh2 = FileUtils::uploadImage($request->hinh_anh_2);
//        $hinh_anh3 = FileUtils::uploadImage($request->hinh_anh_3);
//        $hinh_anh4 = FileUtils::uploadImage($request->hinh_anh_4);
//        dd($hinh_anh, $hinh_anh_1);
        $data = [
            'ten_sach' => $request->get('ten_sach'),
            'ngay_xuat_ban' => $request->get('ngay_xuat_ban'),
            'hinh_anh' => $hinh_anh,
            'hinh_anh_1' => $hinh_anh_1,
//            'hinh_anh_2' => $hinh_anh2,
//            'hinh_anh_3' => $hinh_anh3,
//            'hinh_anh_4' => $hinh_anh4,
            'tac_gia' => $request->get('tac_gia'),
            'nha_xuat_ban' => $request->get('nha_xuat_ban'),
            'the_loai' => $request->get('the_loai'),
            'so_luong' => $request->get('so_luong'),
            'gia_nhap' => $request->get('gia_nhap'),
            'gia_ban' => $request->get('gia_ban'),
            'gia_khuyen_mai' => $request->get('gia_khuyen_mai'),
            'ghim' => $request->get('ghim'),
            'mo_ta' => $request->get('mo_ta'),
            'mo_ta2' => $request->get('mo_ta2'),
            'ghim' => is_null($request->get('is_pin')) ? false : true,

        ];
//        dd($data);
        Sach::create($data);

        return redirect()->route('sach.index')->with('message', 'Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tacgias = TacGia::all();
        $nhaxuatbans = NhaXuatBan::all();
        $theloais = TheLoaiSach::all();
        $item = Sach::find($id);
        return view('sach.edit', [
            'item' => $item,
            'tacgias' => $tacgias,
            'nhaxuatbans' => $nhaxuatbans,
            'theloais' => $theloais
        ])
            ->with('index', Consts::SIDEBAR_SACH);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $imageName = $request->get('hidden_image');
        $hinh_anh = $request->hinh_anh;

        $imageName_1 = $request->get('hidden_image_1');
        $hinh_anh_1 = $request->hinh_anh_1;
        if ($hinh_anh != null) {
            $request->validate([
                'ten_sach' => 'required',
                'ngay_xuat_ban' => 'required',
                'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'tac_gia' => 'required',
                'nha_xuat_ban' => 'required',
                'the_loai' => 'required',
                'so_luong' => 'required',
                'gia_nhap' => 'required',
                'gia_ban' => 'required',
            ]);
            $imageName = FileUtils::uploadImage($hinh_anh, FileUtils::SACH_PATH);
        } else {
            $request->validate([
                'ten_sach' => 'required',
                'ngay_xuat_ban' => 'required',
                'tac_gia' => 'required',
                'nha_xuat_ban' => 'required',
                'the_loai' => 'required',
                'so_luong' => 'required',
                'gia_nhap' => 'required',
                'gia_ban' => 'required',

            ]);
        }
        if ($hinh_anh_1 != null) {
            $request->validate([
                'ten_sach' => 'required',
                'ngay_xuat_ban' => 'required',
                'hinh_anh_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'tac_gia' => 'required',
                'nha_xuat_ban' => 'required',
                'the_loai' => 'required',
                'so_luong' => 'required',
                'gia_nhap' => 'required',
                'gia_ban' => 'required',
            ]);
            $imageName_1 = FileUtils::uploadImage($hinh_anh_1, FileUtils::SACH_PATH);
        } else {
            $request->validate([
                'ten_sach' => 'required',
                'ngay_xuat_ban' => 'required',
                'tac_gia' => 'required',
                'nha_xuat_ban' => 'required',
                'the_loai' => 'required',
                'so_luong' => 'required',
                'gia_nhap' => 'required',
                'gia_ban' => 'required',

            ]);
        }

        $data = [
            'ten_sach' => $request->get('ten_sach'),
            'ngay_xuat_ban' => $request->get('ngay_xuat_ban'),
            'hinh_anh' => $imageName,
            'hinh_anh_1' => $imageName_1,
            'tac_gia' => $request->get('tac_gia'),
            'nha_xuat_ban' => $request->get('nha_xuat_ban'),
            'the_loai' => $request->get('the_loai'),
            'so_luong' => $request->get('so_luong'),
            'gia_nhap' => $request->get('gia_nhap'),
            'gia_ban' => $request->get('gia_ban'),
            'gia_khuyen_mai' => $request->get('gia_khuyen_mai'),
            'ghim' => $request->get('ghim'),
            'mo_ta' => $request->get('mo_ta'),
            'mo_ta2' => $request->get('mo_ta2'),
            'ghim' => is_null($request->get('is_pin')) ? false : true,
        ];
        Sach::where('id', $id)
            ->update($data);
        return redirect()->route('sach.index')->with('message', 'Cập Nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Sach::Where('id', $id)->delete();
        return redirect()->route('sach.index')->with('message', 'Xóa Thành Công');
    }
}
