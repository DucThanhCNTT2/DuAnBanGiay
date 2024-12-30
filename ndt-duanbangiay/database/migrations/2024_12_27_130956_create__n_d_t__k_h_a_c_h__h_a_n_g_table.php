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
        Schema::create('NDT_KHACH_HANG', function (Blueprint $table) {
            $table->id();
            $table -> string('ndtMaKH',255)->unique();
            $table -> string('ndtTenKH',255);
            $table -> string('ndtEmail',255);
            $table -> string('ndtMatKhau',255);
            $table -> string('ndtDienThoai',255);
            $table -> string('ndtDiaChi',255);
            $table -> date('ndtNgayDK');
            $table -> tinyInteger('ndtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NDT_KHACH_HANG');
    }
};
