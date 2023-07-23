<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thong_tin_hop_dong', function (Blueprint $table) {
            $table->id();
            $table->string('TEN_KHACH_HANG');
            $table->string('TINH_TP');
            $table->string('QUAN_HUYEN');
            $table->string('XA_PHUONG');
            $table->string('SO_NHA');
            $table->string('MA_SO_THUE');
            $table->string('MBHXH');
            $table->string('NV');
            $table->string('NGAY_KY_HD');
            $table->string('MA_HOP_DONG');
            $table->string('TRANG_THAI_DON_HANG');
            $table->string('LOAI_DON_HANG');
            $table->string('DICH_VU');
            $table->string('GOI_CUOC');
            $table->string('THOI_GIAN');
            $table->string('LOAI_TB');
            $table->string('GIA_THIET_BI');
            $table->string('GIA_TRUOC_THUE');
            $table->string('GIA_SAU_THUE');
            $table->string('GHI_CHU');
            $table->string('MA_GD');
            $table->string('MA_THUE_BAO');
            $table->string('USERNAME');
            $table->string('SO_SERI');
            $table->string('SO_HD');
            $table->string('MA_TRA_CUU');
            $table->string('NGAY_XUAT_HOA_DON');
            $table->integer('SO_LUONG');
            $table->string('LOAI_GOI_CUOC');
            $table->string('PDF');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form2');
    }
};
