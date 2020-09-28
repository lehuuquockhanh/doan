<?php

namespace App\Http\Controllers;

use App\ChucVu;
use App\Consts\Consts;
use App\NhanVien;
use App\Blog;
use App\NhaXuatBan;
use App\TacGia;
use App\TheLoaiSach;
use App\Utils\FileUtils;
use Illuminate\Http\Request;

class TheLoaiSachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = TheLoaiSach::paginate(Consts::ITEM_PER_PAGE);
        return view('theloaisach.index', [
            'items' => $items
        ])
            ->with('index', Consts::SIDEBAR_THE_LOAI_SACH);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('theloaisach.create', [
        ])
            ->with('index', Consts::SIDEBAR_THE_LOAI_SACH);
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
            'ten_the_loai' => 'required',
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mo_ta' => 'required'
        ]);
        $hinh_anh = FileUtils::uploadImage($request->hinh_anh, FileUtils::CATEGORY_PATH);
        $data = [
            'ten_the_loai' => $request->get('ten_the_loai'),
            'hinh_anh' => $hinh_anh,
            'mo_ta' => $request->get('mo_ta')
        ];
//        dd($data);
        TheLoaiSach::create($data);

        return redirect()->route('theloaisach.index')->with('message', 'Thêm Thành Công');
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
        $item = TheLoaiSach::find($id);
        return view('theloaisach.edit', compact('item'))
            ->with('index', Consts::SIDEBAR_THE_LOAI_SACH);
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
        $imageName = $request->get('hidden_image');
        $hinh_anh = $request->file('hinh_anh');
        if ($hinh_anh != null) {
            $request->validate([
                'ten_the_loai' => 'required',
                'hinh_anh' => 'required',
                'mo_ta' => 'required'
            ]);
//            dd($hinh_anh);
            $imageName = FileUtils::uploadImage($hinh_anh, FileUtils::CATEGORY_PATH);
        } else {
            $request->validate([
                'ten_the_loai' => 'required',
                'mo_ta' => 'required'
            ]);
        }
//        dd($imageName);

        $data = [
            'ten_the_loai' => $request->get('ten_the_loai'),
            'hinh_anh' => $imageName,
            'mo_ta' => $request->get('mo_ta')
        ];
        TheLoaiSach::where('id', $id)
            ->update($data);
        return redirect()->route('theloaisach.index')->with('message', 'Cập Nhật Thành Công');
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
        TheLoaiSach::Where('id', $id)->delete();
        return redirect()->route('theloaisach.index')->with('message', 'Xóa Thành Công');
    }
}
