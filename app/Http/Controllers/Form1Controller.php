<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResourceUser;
use App\Models\Form1Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Form1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(new ResourceUser(Form1Model::all()));
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
    public function store(Request $request)
    {
      /*   return response()->json([$request->all()]); */
        $validator = Validator::make($request->all(), [
            'TenKH' => 'required',
            'DiaChi' => 'required',
            'MaThue' => 'required|max:13',
            'MaBHXH' => 'min:13|max:13',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        return response()->json(['oke' => 'oke']);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
