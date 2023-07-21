<?php


use App\Http\Controllers\UserController;
use App\Http\Resources\ResourceUser;
use App\Models\Dichvu;
use App\Models\Goicuoc;
use App\Models\Loaigoi;
use App\Models\Thietbi;
use App\Models\thoihan;
use App\Models\Thong_tin_hop_dong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* Route::resource('customer', Form1Controller::class); */
Route::resource('contracts', UserController::class);
Route::get('/dichvu', function () {
    return new ResourceUser(Dichvu::all());
});
Route::post('/goicuoc', function (Request $request) {
    return new ResourceUser(Goicuoc::where('MaDV', $request->MaDV)->get());
});
Route::post('/thietbi', function (Request $request) {
    return new ResourceUser(Thietbi::where('MaGC', $request->MaGC)->get());
});
Route::post('/loaigoi', function (Request $request) {
    return new ResourceUser(Loaigoi::where('MaGC', $request->MaGC)->get());
});
Route::post('/thoihan', function (Request $request) {
    return new ResourceUser(thoihan::where('MaLoai', $request->MaLoai)->get());
});
Route::post('/contract', function (Request $request) {
    return new ResourceUser(Thong_tin_hop_dong::where('id', $request->id)->get());
});
