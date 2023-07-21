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
        Schema::create('form2',function(Blueprint $table){
            $table->id();
            $table->foreignId('MaCT');
            $table->foreignId('MaKH');
            $table->text('NV');
            $table->date('NgayKyHD');
            $table->text('MaHD');
            $table->text('TrangThaiDH');
            $table->text('LoaiDH');
            $table->text('GhiChu');
            $table->text('MaGD');
            $table->text('MaThueBao');
            $table->text('Username');
            $table->text('SoSeri');
            $table->text('SoHD');
            $table->text('MaTraCuuHD');
            $table->text('NgayXuatDH');
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
