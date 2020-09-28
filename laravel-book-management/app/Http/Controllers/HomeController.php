<?php

namespace App\Http\Controllers;

use App\Sach;
use App\TheLoaiSach;
use Illuminate\Http\Request;

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
        return view('home')->with('index', 0);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexUser()
    {
        $sachMois = Sach::orderByDesc('created_at')->paginate(10);
        $theloais = TheLoaiSach::orderBy('ten_the_loai')->paginate(5);
        $allBook = Sach::all();
        $bestSeller = Sach::all();
        $bookByCate = [];
        foreach ($theloais as $item) {
            $bookByCate[$item->id] = Sach::where('the_loai', $item->id)->get();
        }
//        dd($bookByCate);
        return view('ecommerce.home', [
            'sachMois' => $sachMois,
            'theloais' => $theloais,
            'allBook' => $allBook,
            'bestSeller' => $bestSeller,
            'bookByCate' => $bookByCate
        ]);
    }
}
