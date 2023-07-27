<?php


use App\Http\Controllers\UserController;
use App\Http\Resources\ResourceUser;
use App\Models\count;
use App\Models\Dichvu;
use App\Models\Goicuoc;
use App\Models\Loaigoi;
use App\Models\Nhanvien;
use App\Models\Thietbi;
use App\Models\thoihan;
use App\Models\Thong_tin_hop_dong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
Route::get('/goicuoc/{id}', function ($id) {
    return new ResourceUser(Goicuoc::where('MaDV', $id)->get());
});
Route::get('/thietbi', function (Request $request) {
    return new ResourceUser(Thietbi::where('MaGC', $request->input('MaGC'))
        ->where('MaLoai', $request->input('MaLoai'))
        ->where('MaTH', $request->input('MaTH'))
        ->get());
});
Route::get('/loaigoi', function (Request $request) {
    return new ResourceUser(Loaigoi::where('MaGC', $request->input('MaGC'))->get());
});
Route::get('/thoihan', function (Request $request) {
    return new ResourceUser(thoihan::where('MaLoai', $request->input('MaLoai'))->get());
});
Route::get('/contract', function (Request $request) {
    return new ResourceUser(Thong_tin_hop_dong::where('id', $request->input('id'))->get());
});
Route::get('nhanvien', function () {
    return new ResourceUser(Nhanvien::all());
});

Route::post('upload', function (Request $request) {
    if ($request->hasFile('pdf')) {
        foreach ($request->file('pdf') as $file) {

            $ext = $file->extension();

            $filename = $request->input('SO_HOA_DO') . '.' . $ext;

            $file->move(public_path('pdf'), $filename);
        }
    }
});
