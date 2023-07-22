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
        Schema::create('thoihan',function(Blueprint $table){
            $table->id('MaTH');
            $table->foreignId('MaLoai');
            $table->foreignId('MaGC');
            $table->integer('THOI_HAN');
            $table->text('GIA_TRUOC_THUE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
