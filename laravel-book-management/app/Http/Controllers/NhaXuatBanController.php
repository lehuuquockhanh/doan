<?php

namespace App\Http\Controllers;

use App\ChucVu;
use App\Consts\Consts;
use App\NhanVien;
use App\Blog;
use App\NhaXuatBan;
use Illuminate\Http\Request;

class NhaXuatBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = NhaXuatBan::paginate(Consts::ITEM_PER_PAGE);
        return view('nhaxuatban.index', [
            'items' => $items
        ])
            ->with('index', Consts::SIDEBAR_NXB);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nhaxuatban.create', [
        ])
            ->with('index', Consts::SIDEBAR_NXB);
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
            'ten_nha_xuat_ban' => 'required',
            'hinh_anh' => 'required',
            'dia_chi' => 'required',
            'mo_ta' => 'required',
            'mo_ta2' => 'required'
        ]);

        $data = [
            'ten_nha_xuat_ban' => $request->get('ten_nha_xuat_ban'),
            'hinh_anh' => $request->get('hinh_anh'),
            'dia_chi' => $request->get('dia_chi'),
            'mo_ta' => $request->get('mo_ta'),
            'mo_ta2' => $request->get('mo_ta2'),
        ];

        NhaXuatBan::create($data);

        return redirect()->route('nhaxuatban.index')->with('message', 'Thêm Thành Công');
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
        $item = NhaXuatBan::find($id);
        return view('nhaxuatban.edit', compact('item'))
            ->with('index', Consts::SIDEBAR_NXB);
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
        $request->validate([
            'ten_nha_xuat_ban' => 'required',
            'hinh_anh' => 'required',
            'dia_chi' => 'required',
            'mo_ta' => 'required',
            'mo_ta2' => 'required'
        ]);

        $data = [
            'ten_nha_xuat_ban' => $request->get('ten_nha_xuat_ban'),
            'hinh_anh' => $request->get('hinh_anh'),
            'dia_chi' => $request->get('dia_chi'),
            'mo_ta' => $request->get('mo_ta'),
            'mo_ta2' => $request->get('mo_ta2'),
        ];

        NhaXuatBan::where('id', $id)
            ->update($data);
        return redirect()->route('nhaxuatban.index')->with('message', 'Cập Nhật Thành Công');
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
        NhaXuatBan::Where('id', $id)->delete();
        return redirect()->route('nhaxuatban.index')->with('message', 'Xóa THành Công');
    }
}
