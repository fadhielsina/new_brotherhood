<?php

use App\Http\Controllers\CmsController;
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

Route::get("/", [CmsController::class, "index"])->name("cms.index");
Route::get("/about-us", [CmsController::class, "about_us"])->name("cms.about_us");
Route::get("/el-presidente", [CmsController::class, "el_presidente"])->name("cms.el_presidente");
Route::get("/1-program", [CmsController::class, "one_program"])->name("cms.one_program");
Route::get("/for-faith", [CmsController::class, "for_faith"])->name("cms.for_faith");
Route::get("/for-nature", [CmsController::class, "for_nature"])->name("cms.for_nature");
Route::get("/for-indonesia-culture", [CmsController::class, "for_indonesia_culture"])->name("cms.for_indonesia_culture");
Route::get("/for-children-care", [CmsController::class, "for_children_care"])->name("cms.for_children_care");
Route::get("/for-rescue-and-disaster", [CmsController::class, "for_rescue_and_disaster"])->name("cms.for_rescue_and_disaster");
Route::get("/support22", [CmsController::class, "support22"])->name("cms.support22");
Route::get("/our-chapter", [CmsController::class, "our_chapter"])->name("cms.our_chapter");
Route::get("/blog", [CmsController::class, "blog"])->name("cms.blog");
Route::get("/merchant", [MerchantController::class, "index"])->name("merchant.index");
Route::post("/checkout", [MerchantController::class, "checkout"])->name("merchant.checkout");
Route::post("/merchant_submit_form", [MerchantController::class, "submit_form"])->name("merchant.submit_form");

Route::resource('reguser', RegisterUserController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['can:admin']], function () {
    Route::resource('master_member', MasterMemberController::class);
    Route::resource('member_request', MemberRequestController::class);
    Route::resource('master_chapter', MasterChapterController::class);
    Route::resource('master_program', MasterProgramController::class);

    Route::resource('news_activity', NewsActivityController::class);
});
