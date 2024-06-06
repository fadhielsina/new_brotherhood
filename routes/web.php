<?php

use App\Http\Controllers\CmsController;
use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterChapterController;
use App\Http\Controllers\MasterMemberController;
use App\Http\Controllers\MasterProgramController;
use App\Http\Controllers\MemberRequestController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\NewsActivityController;
use App\Http\Controllers\RegisterUserController;

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

Route::get("/", [FrontController::class, "index"])->name("cms.index");
Route::get("/about-us", [FrontController::class, "about_us"])->name("cms.about_us");
Route::get("/el-presidente", [FrontController::class, "el_presidente"])->name("cms.el_presidente");
Route::get("/1-program", [FrontController::class, "one_program"])->name("cms.one_program");
Route::get("/for-faith", [FrontController::class, "for_faith"])->name("cms.for_faith");
Route::get("/for-nature", [FrontController::class, "for_nature"])->name("cms.for_nature");
Route::get("/for-indonesia-culture", [FrontController::class, "for_indonesia_culture"])->name("cms.for_indonesia_culture");
Route::get("/for-children-care", [FrontController::class, "for_children_care"])->name("cms.for_children_care");
Route::get("/for-rescue-and-disaster", [FrontController::class, "for_rescue_and_disaster"])->name("cms.for_rescue_and_disaster");
Route::get("/support22", [FrontController::class, "support22"])->name("cms.support22");
Route::get("/our-chapter", [FrontController::class, "our_chapter"])->name("cms.our_chapter");
Route::get("/blog", [FrontController::class, "blog"])->name("cms.blog");
Route::get("/merchant", [MerchantController::class, "index"])->name("merchant.index");
Route::post("/checkout", [MerchantController::class, "checkout"])->name("merchant.checkout");
Route::post("/merchant_submit_form", [MerchantController::class, "submit_form"])->name("merchant.submit_form");

Route::resource('reguser', RegisterUserController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home_checkin', [HomeController::class, 'checkin'])->name('home.checkin');
Route::post('/home_checkin_submit', [HomeController::class, 'checkin_submit'])->name('home.checkin_submit');

// CMS
Route::get('/landing_page/home', [CmsController::class, 'index'])->name('landing_page.home');
Route::get('/landing_page/home_form', [CmsController::class, 'home_form'])->name('landing_page.home.create');
Route::post('/landing_page/home_submit', [CmsController::class, 'home_submit'])->name('landing_page.home.submit');
Route::get('/landing_page/home_edit/{id}', [CmsController::class, 'home_edit'])->name('landing_page.home.edit');
Route::put('/landing_page/{id}/home_update', [CmsController::class, 'home_update'])->name('landing_page.home.update');

Route::get('/landing_page/about_us', [CmsController::class, 'about_us'])->name('landing_page.about_us');
Route::get('/landing_page/about_us_form', [CmsController::class, 'about_form'])->name('landing_page.about_us.create');
Route::post('/landing_page/about_us_submit', [CmsController::class, 'about_submit'])->name('landing_page.about_us.submit');
Route::get('/landing_page/about_us_edit/{id}', [CmsController::class, 'about_edit'])->name('landing_page.about_us.edit');
Route::put('/landing_page/{id}/about_us_update', [CmsController::class, 'about_update'])->name('landing_page.about_us.update');

Route::get('/landing_page/el_presidente', [CmsController::class, 'presidente'])->name('landing_page.presidente');
Route::get('/landing_page/el_presidente_form', [CmsController::class, 'presidente_form'])->name('landing_page.presidente.create');
Route::post('/landing_page/el_presidente_submit', [CmsController::class, 'presidente_submit'])->name('landing_page.presidente.submit');
Route::get('/landing_page/el_presidente_edit/{id}', [CmsController::class, 'presidente_edit'])->name('landing_page.presidente.edit');
Route::put('/landing_page/{id}/el_presidente_update', [CmsController::class, 'presidente_update'])->name('landing_page.presidente.update');

Route::group(['middleware' => ['can:admin']], function () {
    Route::delete('/landing_page/{id}/home_destroy', [CmsController::class, 'home_destroy'])->name('landing_page.home.destroy');
    Route::get('/landing_page/home_posting/{id}', [CmsController::class, 'home_posting'])->name('landing_page.home.posting');

    Route::delete('/landing_page/{id}/about_us_destroy', [CmsController::class, 'about_destroy'])->name('landing_page.about_us.destroy');
    Route::get('/landing_page/about_posting/{id}', [CmsController::class, 'about_posting'])->name('landing_page.about_us.posting');

    Route::delete('/landing_page/{id}/presidente_destroy', [CmsController::class, 'presidente_destroy'])->name('landing_page.presidente.destroy');
    Route::get('/landing_page/presidente_posting/{id}', [CmsController::class, 'presidente_posting'])->name('landing_page.presidente.posting');

    Route::resource('master_member', MasterMemberController::class);
    Route::resource('member_request', MemberRequestController::class);
    Route::resource('master_chapter', MasterChapterController::class);
    Route::resource('master_program', MasterProgramController::class);
    Route::resource('news_activity', NewsActivityController::class);
});
