<?php

use App\Http\Controllers\Form1Controller;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

// Route::get('/', function () {
//     return view('Home');
// });
// Route::get('/form1', function () {
//     return view('Form1');
// });
// Route::get('/formPDF', function () {
//     return view('formPDF');
// });
// /* Route::post('/customer', [Form1Controller::class,'store']); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('showcontract');
    })->name('dashboard');
    Route::get('/taohopdong', function () {
        return view('createcontract');
    })->name('createcontract');
    Route::get('/danhsachhopdong', function () {
        return view('showcontract');
    })->name('showcontract');
});
