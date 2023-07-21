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
        Schema::create('chitiet',function(Blueprint $table){
            $table->id('MaCT');
            $table->foreignId('MaTB');
            $table->foreignId('MaGC');
            $table->integer('GiaTB');
            $table->integer('GiaTruocThue');
            $table->integer('VAT');
            $table->integer('GiaSauThue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitiet');
    }
};
