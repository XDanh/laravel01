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
        Schema::create('form1',function(Blueprint $table){
            $table->id();
            $table->text('TenKH');
            $table->text('DiaChi');
            $table->text('MaThue');
            $table->text('MaBHXH');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form1');
    }
};