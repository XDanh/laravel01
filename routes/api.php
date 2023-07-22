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
Route::get('mahopdong',function(){
    $temp = new ResourceUser(count::all());

                $formattedValue = str_pad($temp[0]['count_number'], 3, '0', STR_PAD_LEFT);

                $name = date("ymd").'-'.$formattedValue;

                $number = $temp[0]['count_number']+1;


                $currentHour = (int)date('H');

                $currentMinute = (int)date('i');

                if ($currentHour === 23 && $currentMinute === 59) {

                    $number = 1;
                }
                DB::table('count')
                    ->update(['count_number' =>  $number]);
    return response()->json($name);
});
