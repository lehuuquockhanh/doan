<?php


namespace App\Http\Controllers\User;
use App\Blog;
use App\ChiTietDonHang;
use App\Consts\Consts;
use App\DonHang;
use App\GioHang;
use App\Sach;
use App\TheLoaiSach;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Comparator\Book;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sachMois = Sach::orderByDesc('created_at')->paginate(12);
        $theloais = TheLoaiSach::orderBy('ten_the_loai')->paginate(5);
        $bookByCate = [];
        foreach ($theloais as $item) {
            $bookByCate[$item->id] = Sach::where('the_loai', $item->id)->get();
        }
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        $items = DonHang::where('user_id', Auth::id())->get();
        return view('ecommerce.history', [
            'sachMois' => $sachMois,
            'theloais' => $theloais,
            'cart' => $cart,
            'items' => $items
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function donhang_detail(Request $request)
    {
        //
        $items = ChiTietDonHang::select('chi_tiet_don_hang.*', 'ten_sach')
            ->leftJoin('sach', 'chi_tiet_don_hang.ma_sach', 'sach.id')
            ->where('ma_don_hang', $request->get('id'))
            ->get();
        return view('ecommerce.history_detail', [
            'items' => $items
        ]);
    }

    public function profile(Request $request) {
        //
        $theloais = TheLoaiSach::orderBy('ten_the_loai')->paginate(5);
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        return view('ecommerce.profile', [
            'items' => Auth::user(),
            'theloais' => $theloais,
            'cart' => $cart,
        ]);
    }

    public function cancel($id) {
        //
        DonHang::Where('id', $id)->update([
            'status' => 4
        ]);
//        ChiTietDonHang::Where('id', $id)->delete();
        return redirect()->route('order.history')->with('message', 'Xóa Thành Công');
    }
}
