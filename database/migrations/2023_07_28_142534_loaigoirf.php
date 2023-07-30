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

    Schema::table('loaigoi', function (Blueprint $table) {
      $table->unsignedBigInteger('MaGC');

      $table->foreign('MaGC')->references('MaGC')->on('goicuoc');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('loaigoi');
  }
};
