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
            $table->id('MaKH');
            $table->text('TEN_KH');
            $table->text('DIA_CHI');
            $table->text('MA_THUE');
            $table->text('MaBHXH');
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
