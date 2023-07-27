<?php


use App\Http\Controllers\UserController;
use App\Http\Resources\ResourceUser;
use App\Models\count;
use App\Models\Dichvu;
use App\Models\Goicuoc;
use App\Models\Loaigoi;
use App\Models\Nhanvien;
use App\Models\PDF;
use App\Models\Thietbi;
use App\Models\thoihan;
use App\Models\Thong_tin_hop_dong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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

    return new ResourceUser([
        'thongtinhopdong' => Thong_tin_hop_dong::where('id', $request->input('id'))->get(),
        'PDF' => PDF::where('id', $request->input('id'))->get('PDF')
    ]);
});
Route::get('/pdf/{filename}', function ($filename) {
    $pdfPath = public_path('pdf') . '/' . $filename;

    return response()->file($pdfPath);
})->name('pdf.show');
Route::get('nhanvien', function () {
    return new ResourceUser(Nhanvien::all());
});

Route::post('/upload', function (Request $request) {

/*     return response()->json($request->all());
 */
    $id = $request->input('id');

    $oldPdfs = PDF::where('id', $id)->get();
    foreach ($oldPdfs as $oldPdf) {
        if (file_exists($oldPdf->PATH)) {
            unlink($oldPdf->PATH);
        }
        $oldPdf->delete();
    }

    $files = $request->file('pdf');
    $count = count($files);
    $splitStrings = explode(';', $request->input('SO_HD'));
    if (count($files) !== count($splitStrings)) {
        return response()->json(['mess' => 'Số lượng tệp tin và số lượng tên không tương ứng.', 'status' => '202']);
    }
    $pdfPaths = [];
    if ($request->hasFile('pdf')) {
        for ($i = 0; $i < $count; $i++) {
            $file = $files[$i];
            $ext = $file->extension();
            $filename = $splitStrings[$i] . '.' . $ext;
            $pdfPath = public_path('pdf') . '/' . $filename;
            $file->move(public_path('pdf'), $filename);
            $pdfPaths[] = $pdfPath;
            /* return response()->json([
                $request->input('id'),
                $filename,
                $pdfPath
            ]); */
            PDF::create(['id' => $request->input('id'), 'PDF' => $filename, 'PATH' => $pdfPath]);
        }
    }
    Thong_tin_hop_dong::where('id', $request->input('id'))
        ->update([
            'MA_GD' => $request->input('MA_GD'),
            'MA_THUE_BAO' => $request->input('MA_THUE_BAO'),
            'USERNAME' => $request->input('USERNAME'),
            'SO_SERI' => $request->input('SO_SERI'),
            'SO_HD' => $request->input('SO_HD'),
            'MA_TRA_CUU' => $request->input('MA_TRA_CUU'),
            'NGAY_XUAT_HOA_DON' => $request->input('NGAY_XUAT_HOA_DON'),
            'PDF' => $request->input('NGAY_XUAT_HOA_DON'),
        ]);

    return response()->json(['oke' => 'oke', 'status' => '200']);
});
