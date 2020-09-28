<?php


namespace App\Http\Controllers\User;
use App\Blog;
use App\ChiTietDonHang;
use App\Consts\Consts;
use App\GioHang;
use App\Sach;
use App\TheLoaiSach;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Comparator\Book;

class HomeController extends Controller
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
        $allBook = Sach::all();
        $bestSeller = Sach::all();
        $bookByCate = [];
        foreach ($theloais as $item) {
            $bookByCate[$item->id] = Sach::where('the_loai', $item->id)->get();
        }
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();

//        dd($bookByCate);
        return view('ecommerce.home', [
            'sachMois' => $sachMois,
            'theloais' => $theloais,
            'blogs' => Blog::all(),
            'allBook' => $allBook,
            'bestSeller' => $bestSeller,
            'bookByCate' => $bookByCate,
            'cart' => $cart,
        ]);
    }

    public function contact()
    {
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        return view('ecommerce.contact', [
            'cart' => $cart,
            'theloais' => TheLoaiSach::all()
        ]);
    }

    public function about()
    {
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        return view('ecommerce.about', [
            'cart' => $cart,
            'theloais' => TheLoaiSach::all()
        ]);
    }

    public function products(Request $request)
    {
        $categoryId = $request->get('categoryId');
        $keySearch = $request->get('keySearch');

        $theloais = TheLoaiSach::select('the_loai_sach.id', 'ten_the_loai', DB::raw('COUNT(sach.id) as total_book'))
                    ->leftJoin('sach', 'the_loai_sach.id', 'sach.the_loai')
                    ->groupBy('the_loai_sach.id', 'ten_the_loai')
                    ->orderBy('ten_the_loai')->get();

        $books = Sach::paginate(Consts::ITEM_PER_PAGE_USER);
        if($categoryId != null){
            $books = Sach::where('the_loai', $categoryId)->orderBy('ten_sach')->paginate(Consts::ITEM_PER_PAGE_USER);
        }
        if($keySearch) {
            $books = Sach::where('ten_sach', 'like','%'.$keySearch.'%')->orderBy('ten_sach')->paginate(Consts::ITEM_PER_PAGE_USER);
        }
        if($request->has('price')){
            $prices  = explode('-' ,$request->get('price'));
            $from = substr(trim($prices[0]),1);
            $to = substr(trim($prices[1]),1);
            $books = Sach::whereBetween('gia_ban', [$from, $to])->orderBy('ten_sach')->paginate(Consts::ITEM_PER_PAGE_USER);
        }
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->get();
        return view('ecommerce.products',[
            'books' => $books,
            'theloais' => $theloais,
            'cart' => $cart,
        ]);
    }

    public function productDetail($id)
    {
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        $book = Sach::find($id);
        $category = $book->the_loai;
        $categoryDetail = TheLoaiSach::find($category);
        $theloais = TheLoaiSach::select('the_loai_sach.id', 'ten_the_loai', DB::raw('COUNT(sach.id) as total_book'))
            ->leftJoin('sach', 'the_loai_sach.id', 'sach.the_loai')
            ->groupBy('the_loai_sach.id', 'ten_the_loai')
            ->orderBy('ten_the_loai')->get();
        $booksRelate = Sach::where('the_loai', $category)->get();
        $upsellBooks = Sach::where('ghim', true)->get();

        //
        $tonKho = ChiTietDonHang::select('ten_sach', DB::raw('sach.so_luong - sum(chi_tiet_don_hang.so_luong) as bookLeft'))
            ->leftJoin('sach', 'chi_tiet_don_hang.ma_sach', 'sach.id')
            ->leftJoin('don_hang', 'chi_tiet_don_hang.ma_don_hang', 'don_hang.id')
            ->where('don_hang.status', '<>', 4)
            ->where('sach.id', $id)
            ->groupBy('ma_sach', 'ten_sach', 'sach.so_luong')
            ->first();

        return view('ecommerce.product_detail', [
            'book' => $book,
            'booksRelate' => $booksRelate,
            'categoryDetail' => $categoryDetail,
            'categories' => $theloais,
            'upsellBooks' => $upsellBooks,
            'cart' => $cart,
            'theloais' => TheLoaiSach::all(),
            'soLuongTonKho' => $tonKho->bookLeft ?? $book->so_luong
        ]);
    }

    public function blogs()
    {
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        return view('ecommerce.blogs', [
            'blogs' => Blog::paginate(Consts::ITEM_PER_PAGE_USER),
            'cart' => $cart,
            'theloais' => TheLoaiSach::all()
        ]);
    }

    public function signin()
    {
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        return view('ecommerce.signin', [
            'cart' => $cart,
            'theloais' => TheLoaiSach::all()
        ]);
    }

    public function register()
    {
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        return view('ecommerce.register', [
            'cart' => $cart,
            'theloais' => TheLoaiSach::all()
        ]);
    }
}
