        <?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return redirect()->route('home.admin');
});
Route::get('/', function () {
    return redirect()->route('home.User');
});

Auth::routes();

// Admin
Route::middleware(['can:isAdmin'])->group(function () {
    Route::get('/admin/home', 'HomeController@index')->name('home.admin');
    Route::resources(['taikhoan' => 'TaiKhoanController']);
    Route::resources(['khachhang' => 'KhachHangController']);
    Route::resources(['nhaxuatban' => 'NhaXuatBanController']);
    Route::resources(['tacgia' => 'TacGiaController']);
    Route::resources(['theloaisach' => 'TheLoaiSachController']);
    Route::resources(['sach' => 'SachController']);
    Route::resources(['blog' => 'BlogController']);
    Route::resources(['donhang' => 'DonHangController']);
    Route::get('/thongke1', 'ThongKeController@index')->name('thongke.index');
    Route::get('/thongke2', 'ThongKeController@index2')->name('thongke.index2');
});
// User
Route::get('/home', 'User\HomeController@index')->name('home.User');
Route::get('/contact', 'User\HomeController@contact')->name('home.contact');
Route::get('/about', 'User\HomeController@about')->name('home.about');
Route::get('/products', 'User\HomeController@products')->name('home.products');
Route::get('/products/{id}', 'User\HomeController@productDetail')->name('home.product_detail');
Route::get('/blogs', 'User\HomeController@blogs')->name('home.blogs');
Route::get('/signin', 'User\HomeController@signin')->name('home.signin');
Route::get('/regis', 'User\HomeController@register')->name('home.register');
Route::get('/checkout', 'User\CartController@checkout')->name('home.checkout');
Route::get('/success', 'User\CartController@success')->name('home.success');
Route::post('/checkout', 'User\CartController@checkoutStore')->middleware('auth.user')->name('home.checkout.store');
// Cart
Route::middleware(['auth.user'])->group(function () {
    Route::get('/cart', 'User\CartController@index')->name('cart.index');
    Route::post('/add', 'User\CartController@store')->name('cart.store');
    Route::post('/update', 'User\CartController@update')->name('cart.update');
    Route::get('/remove', 'User\CartController@remove')->name('cart.remove');
    Route::post('/clear', 'User\CartController@clear')->name('cart.clear');
    Route::post('/updateCart', 'User\CartController@updateCart')->name('cart.updateCart');
    Route::get('/history', 'User\UserController@index')->name('order.history');
    Route::get('/history/donhang', 'User\UserController@donhang_detail')->name('order.history.detail');
    Route::get('/profile', 'User\UserController@profile')->name('user.profile');
    Route::delete('/cancel/{id}', 'User\UserController@cancel')->name('donhang_user.destroy');
});

