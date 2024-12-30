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
        Schema::create('NDT_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('ndtMaSanPham',255);
            $table->string('ndtTenSanPham',255);
            $table->string('ndtHinhAnh',255);
            $table->integer('ndtSoLuong');
            $table->float('ndtDonGia');
            $table->bigInteger('ndtMaLoai')->references('id')->on('NDT_LOAI_SAN_PHAM');
            $table->tinyInteger('ndtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NDT_SAN_PHAM');
    }
};
