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
    Schema::table('loaitb', function (Blueprint $table) {
      $table->unsignedBigInteger('MaGC');

      $table->foreign('MaGC')->references('MaGC')->on('goicuoc');

      $table->unsignedBigInteger('MaLoai');

      $table->foreign('MaLoai')->references('MaLoai')->on('loaigoi');

      $table->unsignedBigInteger('MaTH');

      $table->foreign('MaTH')->references('MaTH')->on('thoihan');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('loaitb');
  }
};
