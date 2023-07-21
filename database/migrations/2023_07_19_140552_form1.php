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
            $table->foreignId('MaKH');
            $table->text('NV');
            $table->date('NGAY_KY_HD');
            $table->text('MaHD');
            $table->text('TRANG_THAI_HP');
            $table->text('LOAI_DH');
            $table->text('GHI_CHU');
            $table->text('MA_GD');
            $table->text('MA_THUE_Bao');
            $table->text('USERNAME');
            $table->text('SO_SERI');
            $table->text('SO_HD');
            $table->text('MA_TRA_CUU');
            $table->text('NGAY_XUAT_HD');
            $table->foreignId('MaGC');
            $table->integer('VAT');
            $table->integer('GIA_SAU_THUE');
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
