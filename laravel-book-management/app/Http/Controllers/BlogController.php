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

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Blog::select('blog.*', 'ten_the_loai')
            ->leftJoin('the_loai_sach', 'blog.category', 'the_loai_sach.id')
            ->orderByDesc('blog.id')
            ->paginate(Consts::ITEM_PER_PAGE);
        return view('blog.index', [
            'items' => $items
        ])
            ->with('index', Consts::SIDEBAR_BLOG);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $theloais = TheLoaiSach::all();
        return view('blog.create', [
            'theloais' => $theloais
        ])
            ->with('index', Consts::SIDEBAR_BLOG);
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
            'tieu_de' => 'required',
            'the_loai' => 'required',
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mo_ta' => 'required',
        ]);
        $hinh_anh = FileUtils::uploadImage($request->hinh_anh, FileUtils::BLOG_PATH);

        $data = [
            'title' => $request->get('tieu_de'),
            'category' => $request->get('the_loai'),
            'hinh_anh' => $hinh_anh,
            'mo_ta' => $request->get('mo_ta'),
            'mo_ta2' => $request->get('mo_ta2'),

        ];
        Blog::create($data);

        return redirect()->route('blog.index')->with('message', 'Thêm Thành Công');
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
        $theloais = TheLoaiSach::all();
        $item = Blog::find($id);
        return view('blog.edit', [
            'item' => $item,
            'theloais' => $theloais
        ])
            ->with('index', Consts::SIDEBAR_BLOG);
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

        if ($hinh_anh != null) {
            $request->validate([
                'tieu_de' => 'required',
                'the_loai' => 'required',
                'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'mo_ta' => 'required',
            ]);
            $imageName = FileUtils::uploadImage($hinh_anh, FileUtils::SACH_PATH);
        } else {
            $request->validate([
                'tieu_de' => 'required',
                'the_loai' => 'required',
                'mo_ta' => 'required',
            ]);
        }

        $data = [
            'title' => $request->get('tieu_de'),
            'category' => $request->get('the_loai'),
            'hinh_anh' => $imageName,
            'mo_ta' => $request->get('mo_ta'),
            'mo_ta2' => $request->get('mo_ta2'),
        ];
        Blog::where('id', $id)
            ->update($data);
        return redirect()->route('blog.index')->with('message', 'Cập Nhật Thành Công');
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
        Blog::Where('id', $id)->delete();
        return redirect()->route('blog.index')->with('message', 'Xóa THành Công');
    }
}
