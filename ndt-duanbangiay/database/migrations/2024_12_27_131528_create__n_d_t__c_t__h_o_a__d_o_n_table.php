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
        Schema::create('NDT_CT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table -> bigInteger('ndtHoaDonID') -> references('id') -> on('NDT_HOA_DON');
            $table -> bigInteger('ndtSanPhamID') -> references('id') -> on('NDT_SAN_PHAM');
            $table -> integer('ndtSLMua');
            $table -> float('ndtDonGiaMua');
            $table -> float('ndtThanhTien');
            $table -> tinyInteger('ndtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NDT_CT_HOA_DON');
    }
};
