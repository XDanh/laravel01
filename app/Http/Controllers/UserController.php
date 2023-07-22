<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResourceUser;
use App\Models\count;
use App\Models\Dichvu;
use App\Models\thong_tin_khach_hang;
use App\Models\thong_tin_hop_dong;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(): JsonResponse
    {

        return response()->json(
            new ResourceUser(thong_tin_hop_dong::select('id', 'NGAY_KY_HD', 'NV', 'LOAI_DON_HANG', 'MA_HOP_DONG', 'TEN_KHACH_HANG', 'MA_SO_THUE', 'GIA_SAU_THUE', 'TRANG_THAI_DON_HANG', 'DICH_VU')->get())
        );

        /* return response()->json(new ResourceUser(Form2::all())); */
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): JsonResponse
    {
          return response()->json([$request->all()]);
        $validator = Validator::make($request->all(), [
            /* 'TEN_KHACH_HANG' => 'required',
            'DIA_CHI' => 'required',
            'MA_SO_THUE' => 'required|max:13',
            'MBHXH' => 'max:13',
            'NV' => 'required',
            'NGAY_KY_HD' => 'required',
            'MA_HOP_DONG' => 'required',
            'TRANG_THAI_DON_HANG' => 'required',
            'LOAI_DON_HANG' => 'required',
            'DICH_VU' => 'required',
            'GOI_CUOC' => 'required',
            'THOI_GIAN' => 'required',
            'LOAI_TB' => 'required',
            'GIA_THIET_BI' => 'required',
            'GIA_TRUOC_THUE' => 'required',
            'VAT' => 'required',
            'GIA_SAU_THUE' => 'required',
            'GHI_CHU' => 'required',
            'MA_GD' => 'required',
            'MA_THUE_BAO' => 'required',
            'USERNAME' => 'required',
            'SO_SERI' => 'required',
            'SO_HD' => 'required',
            'MA_TRA_CUU' => 'required',
            'NGAY_XUAT_HOA_DON' => 'required', */
        ]);

        if ($request->hasFile('pdf')) {
            foreach ($request->file('pdf') as $file) {

                $temp = new ResourceUser(count::all());

                $formattedValue = str_pad($temp[0]['count_number'], 3, '0', STR_PAD_LEFT);

                $ext = $file->extension();

                $filename = date("ymd").'-'.$formattedValue.'.'.$ext;

                $file->move(public_path('pdf'),$filename);

                $number = $temp[0]['count_number']+1;


                $currentHour = (int)date('H');

                $currentMinute = (int)date('i');

                if ($currentHour === 23 && $currentMinute === 59) {

                    $number = 1;
                }
                DB::table('count')
                    ->update(['count_number' =>  $number]);

            }

        }


        return response()->json(['oke' => 'oke', 'status' => '200']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        Thong_tin_hop_dong::where('id', $id)->update($request->all());

        return response()->json(['mess' => 'oke', 'status' => '200']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $result = Thong_tin_hop_dong::find($id);

        if (!$result) return response()->json(['mess' => 'something wrong']);

        $result->delete();

        return response()->json(['mess' => 'oke', 'status' => '200']);
    }
}
