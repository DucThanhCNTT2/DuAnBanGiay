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
        Schema::create('NDT_LOAI_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('ndtMaLoai',255)->unique();
            $table->string('ndtTenLoai',255);
            $table->tinyInteger('ndtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NDT_LOAI_SAN_PHAM');
    }
};