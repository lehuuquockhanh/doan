<?php

namespace App\Http\Controllers;

use App\ChucVu;
use App\Consts\Consts;
use App\NhanVien;
use App\Blog;
use App\NhaXuatBan;
use App\TacGia;
use Illuminate\Http\Request;

class TacGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = TacGia::paginate(Consts::ITEM_PER_PAGE);
        return view('tacgia.index', [
            'items' => $items
        ])
            ->with('index', Consts::SIDEBAR_TAC_GIA);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tacgia.create', [
        ])
            ->with('index', Consts::SIDEBAR_TAC_GIA);
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
            'ten_tac_gia' => 'required',
            'dia_chi' => 'required',
            'ngay_sinh' => 'required',
            'hinh_anh' => 'required',
            'mo_ta1' => 'required',
            'mo_ta2' => 'required',
            'mo_ta3' => 'required'
        ]);

        $data = [
            'ten_tac_gia' => $request->get('ten_tac_gia'),
            'dia_chi' => $request->get('dia_chi'),
            'ngay_sinh' => $request->get('ngay_sinh'),
            'hinh_anh' => $request->get('hinh_anh'),
            'mo_ta1' => $request->get('mo_ta1'),
            'mo_ta2' => $request->get('mo_ta2'),
            'mo_ta3' => $request->get('mo_ta3')
        ];
//        dd($data);
        TacGia::create($data);

        return redirect()->route('tacgia.index')->with('message', 'Thêm Thành Công');
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
        $item = TacGia::find($id);
        return view('tacgia.edit', compact('item'))
            ->with('index', Consts::SIDEBAR_TAC_GIA);
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
            'ten_tac_gia' => 'required',
            'dia_chi' => 'required',
            'ngay_sinh' => 'required',
            'hinh_anh' => 'required'
        ]);

        $data = [
            'ten_tac_gia' => $request->get('ten_tac_gia'),
            'dia_chi' => $request->get('dia_chi'),
            'ngay_sinh' => $request->get('ngay_sinh'),
            'hinh_anh' => $request->get('hinh_anh'),
            'mo_ta1' => $request->get('mo_ta1'),
            'mo_ta2' => $request->get('mo_ta2'),
            'mo_ta3' => $request->get('mo_ta3'),
        ];
        TacGia::where('id', $id)
            ->update($data);
        return redirect()->route('tacgia.index')->with('message', 'Cập Nhật Thành Công');
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
        TacGia::Where('id', $id)->delete();
        return redirect()->route('tacgia.index')->with('message', 'Xóa Thành Công');
    }
}
