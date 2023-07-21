<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResourceUser;
use App\Models\Form2;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(new ResourceUser(Form2::all()));
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
      /*   return response()->json([$request->all()]); */
        $validator = Validator::make($request->all(), [
            'TenKH' => 'required',
            'DiaChi' => 'required',
            'MaThue' => 'required|max:13',
            'MaBHXH' => 'min:13|max:13',
            'NV' => 'required',
            'NgayKyHD' => 'required',
            'MaHD' => 'required',
            'TrangThaiDH' => 'required',
            'LoaiDH' => 'required',
            'DichVu' => 'required',
            'GoiCuoc' => 'required',
            'ThoiGian' => 'required',
            'LoaiThietBi' => 'required',
            'GhiChu' => 'required',
            'MaGD' => 'required',
            'MaThueBao' => 'required',
            'Username' => 'required',
            'SoSeri' => 'required',
            'SoHD' => 'required',
            'MaTraCuuHD' => 'required',
            'NgayXuatDH' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors());

        }
        Form2::create($request->all());

        return response()->json(['oke' => 'oke','status' => '200']);
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
        Form2::where('id',$id)->update($request->all());

        return response()->json(['mess'=>'oke','status' => '200']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $result = Form2::find($id);

        if(!$result) return response()->json(['mess' => 'something wrong']);

        $result->delete();

        return response()->json(['mess' => 'oke', 'status' => '200']);

    }
}
