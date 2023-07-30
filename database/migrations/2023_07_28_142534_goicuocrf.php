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
    Schema::table('goicuoc', function (Blueprint $table) {
      $table->unsignedBigInteger('MaDV');
      $table->foreign('MaDV')->references('MaDV')->on('dichvu');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('goicuoc');
  }
};
