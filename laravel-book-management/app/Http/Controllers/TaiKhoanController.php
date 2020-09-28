<?php

namespace App\Http\Controllers;

use App\ChucVu;
use App\Consts\Consts;
use App\NhanVien;
use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = User::paginate(Consts::ITEM_PER_PAGE);
        return view('taikhoan.index', [
            'datas' => $datas
        ])
            ->with('index', Consts::SIDEBAR_TAI_KHOAN);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $chucVus = ChucVu::all();
//        $phongBans = Blog::all();
        return view('taikhoan.create', [
        ])
            ->with('index', Consts::SIDEBAR_TAI_KHOAN);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],
        ]);

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
        ];

        User::create($data);

        return redirect()->route('taikhoan.index')->with('message', 'Thêm Thành Công');
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
//        $phongBans = Blog::all();
//        $chucVus = ChucVu::all();
        $item = User::find($id);
        return view('taikhoan.edit', compact('item'))
//            ->with('phongBans', $phongBans)
//            ->with('chucVus', $chucVus)
            ->with('index', Consts::SIDEBAR_TAI_KHOAN);
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
            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],
        ]);

        $data = [
            'name' => $request->get('name'),
//            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
        ];

        //
        User::where('id', $id)
            ->update($data);
//        Blog::updateOrCreate([
//            'MaPhongBan' => $id
//        ], $phongban);
        return redirect()->route('taikhoan.index')->with('message', 'Cập Nhật Thành Công');
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
        User::Where('id', $id)->delete();
        return redirect()->route('taikhoan.index')->with('message', 'Xóa Thành Công');
    }
}
