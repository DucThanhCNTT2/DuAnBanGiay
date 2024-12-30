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
        Schema::create('NDT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table -> string('ndtMaHD',255)->unique();
            $table -> bigInteger('ndtMaKH') -> references('id') -> on('NDT_KHACH_HANG');
            $table -> date('ndtNgayHD');
            $table -> string('ndtHoTenKH');
            $table -> string('ndtEmail');
            $table -> string('ndtDienThoai');
            $table -> string('ndtDiaChi');
            $table -> float('ndtTongTriGia');
            $table -> tinyInteger('ndtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NDT_HOA_DON');
    }
};
