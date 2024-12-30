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
        Schema::create('NDT_QUAN_TRI', function (Blueprint $table) {
            $table->id();
            $table -> string('ndtTaiKhoan',255) -> unique();
            $table -> string('ndtMatKhau',255);
            $table -> tinyInteger('ndtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NDT_QUAN_TRI');
    }
};
