<?php


use App\Http\Controllers\Form1Controller;
use App\Http\Resources\ResourceUser;
use App\Models\Dichvu;
use App\Models\Goicuoc;
use App\Models\Thietbi;
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
Route::resource('form2', Form2Controller::class);
Route::resource('form1', Form1Controller::class);
Route::get('/dichvu', function () {
    return new ResourceUser(Dichvu::all());
});
Route::post('/goicuoc', function (Request $request) {
    return new ResourceUser(Goicuoc::where('MaDV',$request->MaDV)->get());
});
Route::get('/thietbi', function () {
    return new ResourceUser(Thietbi::all());
});
