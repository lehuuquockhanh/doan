<?php


namespace App\Http\Controllers\User;

use App\ChiTietDonHang;
use App\DonHang;
use App\GioHang;
use App\Sach;
use App\TheLoaiSach;

use App\Http\Controllers\Controller;
use App\Utils\FileUtils;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
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
//        dd(Cart::content());
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        foreach ($cart as $key => $item) {
            $item->bookLeft = $tonKho = ChiTietDonHang::select('ten_sach', DB::raw('sach.so_luong - sum(chi_tiet_don_hang.so_luong) as bookLeft'))
                    ->leftJoin('sach', 'chi_tiet_don_hang.ma_sach', 'sach.id')
                     ->leftJoin('don_hang', 'chi_tiet_don_hang.ma_don_hang', 'don_hang.id')
                    ->where('don_hang.status', '<>', 4)
                    ->where('sach.id', $item->ma_sach)
                    ->groupBy('ma_sach', 'ten_sach', 'sach.so_luong')
                    ->first()->bookLeft ?? Sach::find($item->ma_sach)->so_luong;
        }

        return view('ecommerce.cart', [
            'cart' => $cart,
            'theloais' => TheLoaiSach::all()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $productId = $request->get('id');
        $sachInGioHang = GioHang::where('user_id', Auth::id())
            ->where('ma_sach', $productId)
            ->first();

        if ($sachInGioHang) {
            $quantity = $request->get('quantity');
            if (!$quantity) {
                $quantity = 1;
            }
            GioHang::where('user_id', Auth::id()) //lấy về id user
                ->where('ma_sach', $productId)
                ->update([
                    'quantity' => $sachInGioHang->quantity + $quantity
                ]);

//            Cart::update($item->rowId, $item->qty + $quantity);
            return redirect()->route('cart.index')->with('success_msg', 'Mặt hàng được thêm vào giỏ hàng!');
        }

        $quantity = $request->get('quantity');
        if (!$quantity) {
            $quantity = 1;
        }

        $book = Sach::find($request->get('id'));
        $price = $book->gia_khuyen_mai ? $book->gia_khuyen_mai : $book->gia_ban;
        GioHang::create([
            'hinh_anh' => $book->hinh_anh,
            'ma_sach' => $request->get('id'),
            'price' => $price,
            'quantity' => $quantity,
            'sub_total' => $price * $quantity,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('cart.index')->with('success_msg', 'Mặt hàng được thêm vào giỏ hàng!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        Cart::update($request->id, $request->quantity);
        return redirect()->route('cart.index')->with('success_msg', 'Giỏ hàng được cập nhật!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {

        GioHang::find($request->id)->delete();

        return redirect()->route('cart.index')->with('success_msg', 'Sản phẩm đã được xóa!');
    }

    public function clear(Request $request)
    {
        GioHang::where('user_id', Auth::id())->delete();
        return redirect()->route('cart')->with('success_msg', 'Giỏ hàng đã được xóa!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkout()
    {
        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->where('user_id', Auth::id())
            ->get();
        return view('ecommerce.checkout', [
            'theloais' => TheLoaiSach::all(),
            'cart' => $cart,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkoutStore(Request $request)
    {

        $request->validate([
            'ten_khach_hang' => 'required',
            'dia_chi' => 'required',
            'so_dien_thoai' => 'required',
            'email' => 'required',
            'mo_ta' => 'required',
        ]);

        $data = [
            'ten_khach_hang' => $request->get('ten_khach_hang'),
            'dia_chi' => $request->get('dia_chi'),
            'dia_chi_2' => $request->get('dia_chi_2'),
            'so_dien_thoai' => $request->get('so_dien_thoai'),
            'email' => $request->get('email'),
            'note' => $request->get('mo_ta'),
            'note_2' => '',
            'customer_id' => Auth::check() ? Auth::id() : 0,
            'user_id' => Auth::check() ? Auth::id() : 0,
        ];
        $donHang = DonHang::create($data);
        $total = 0;
        foreach (GioHang::where('user_id', Auth::id())->get() as $key => $item) {
            $total += $item->sub_total;
            ChiTietDonHang::create([
                'ma_don_hang' => $donHang->id,
                'ma_sach' => $item->ma_sach,
                'so_luong' => $item->quantity,
                'tong_tien' => $item->sub_total
            ]);
        }
        GioHang::where('user_id', Auth::id())->delete();
        if($request->get('payment_method') == 'cod') {
            $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
                ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
                ->get();
            return view('ecommerce.checkout_success', [
                'theloais' => TheLoaiSach::all(),
                'cart' => $cart,
            ]);
        }

        session(['cost_id' => $request->id]);
        session('ma_don_hang', $donHang->id);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/success?id=" . $donHang->id;
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';

        $vnp_Amount = $total * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        $inputData['vnp_BankCode'] = 'NCB';
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {

        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function success(Request $request)
    {

        $cart = GioHang::select('gio_hang.*', 'sach.ten_sach')
            ->leftJoin('sach', 'gio_hang.ma_sach', 'sach.id')
            ->get();
        DonHang::where('id', $request->get('id'))->update([
            'status' => 2
        ]);
        return view('ecommerce.checkout_success', [
            'theloais' => TheLoaiSach::all(),
            'cart' => $cart,
        ]);
    }

    public function create(Request $request)
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateCart(Request $request)
    {

        foreach ($request->get('product') as $key => $item) {
            $gioHang = GioHang::find($item['rowId']);
            GioHang::find($item['rowId'])->update([
                'quantity' => $item['quantity'],
                'sub_total' => $gioHang->price * $item['quantity']
            ]);

        }

        return redirect()->route('cart.index')->with('success_msg', 'Giỏ hàng đã được cập nhật!');
    }

}
