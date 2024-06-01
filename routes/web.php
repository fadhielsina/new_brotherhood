<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front/index');
});
Route::get('/about-us', function () {
    return view('front/about-us');
});
Route::get('/el-presidente', function () {
    return view('front/el-presidente');
});
Route::get('/1-program', function () {
    return view('front/1-program');
});
Route::get('/for-faith', function () {
    return view('front/for-faith');
});
Route::get('/for-nature', function () {
    return view('front/for-nature');
});
Route::get('/for-indonesia-culture', function () {
    return view('front/for-indonesia-culture');
});
Route::get('/for-children-care', function () {
    return view('front/for-children-care');
});
Route::get('/for-rescue-and-disaster', function () {
    return view('front/for-rescue-and-disaster');
});
Route::get('/support22', function () {
    return view('front/support22');
});
Route::get('/our-chapter', function () {
    return view('front/our-chapter');
});
Route::get('/blog', function () {
    return view('front/blog');
});
Route::get('/merchant', function () {
    $products = [
        [
            'id' => 1,
            'name' => 'jakcet',
            'image' => url('front/merchant/jacket.jpg'),
            'price' => 500000,
            'description' => 'Jaket berbahan kulit. <br> Tersedia ukuran XXL,XL,L,M,S'
        ],
        [
            'id' => 2,
            'name' => 'stiker',
            'image' => url('front/merchant/stiker.jpg'),
            'price' => 10000,
            'description' => 'Stiker anti air'
        ],
    ];
    $product = json_encode($products);
    return view('front/merchant', compact('product'));
});
Route::post('/checkout', function (Request $request) {
    dd($request);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['can:admin']], function () {
    Route::get('/master_member', [HomeController::class, 'master_member'])->name('master_member');
});
